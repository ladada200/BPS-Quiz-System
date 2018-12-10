<?php

/*
 * Author   :   Christopher Rupert
 * Version  :   1.0.2
 * Last     :   11/21/2018
 * Desc     :   Accessability document used for long-hand SQL Queries until SQL
 *               are made and utilized.
 */

$projectRoot = filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . '/BPS-Quiz-System';
require_once ($projectRoot . '/utils/ChromePhp.php');
require_once ($projectRoot . '/lib/ConnectionManager.php');
require_once ($projectRoot . '/entity/user.php');

class accessor {

    private $conn = "";
    private $salt = "4d494e497469676572ab4x";
    private $loginStatementString = "SELECT PermissionLevel, status FROM USERS WHERE UserName = :username AND Password = :password";
    private $addUserStatementString = "INSERT INTO USERS (`userID`, `userName`, `password`, `email`, `permissionLevel`, `status`) VALUES (:ID, :username, :password, :email, :permission, :active)";
    private $removeUserStatementString = "DELETE FROM USERS WHERE UserName = :username";
    private $deactivateUserStatementString = "UPDATE USERS SET active = false WHERE UserName=:username AND password=:password";
    private $activateUserStatementString = "UPDATE USERS SET active = true WHERE UserName=:username AND password=:password";
    private $updatePasswordStatementString = "UPDATE USERS SET Password = :password WHERE UserName=:username";
    private $showAllUsersStatementString = "SELECT UserID, Username, Permission FROM USERS";
    private $searchQuizByIdStatementString = "SELECT * FROM Quiz WHERE ID=:bindParam";
    private $searchQuizByTagStatementString = "SELECT * FROM Quiz WHERE tags LIKE \"%:bindParam%\"";
    private $searchQuizByWITStatementString = "SELECT * FROM Quiz WHERE QuizTitle LIKE \"%:bindParam%\" ";
    private $searchQuestionByIdStatementString = "SELECT * FROM QuizQuestions WHERE QuizID=:bindParam";
    private $searchQuestionByWIQTStatementString = "SELECT * FROM QuizQuestions WHERE Question LIKE \"%:bindParam%\"";
    private $searchQuestionByWITCStatementString = "SELECT * FROM QuizQuestions WHERE QuestionID = (SELECT QuestionID FROM Question WHERE choices LIKE \"%:bindParam%\")";
    private $searchQuestionByTagStatementString = "SELECT * FROM QuizQuestions WHERE tags LIKE \%:bindParam%\"";
    //log into system
    private $loginStatement = NULL;
    private $addUserStatement = NULL;
    private $removeUserStatement = NULL;
    private $updateUserStatement = NULL;
    private $showAllUsersStatement = NULL;
    private $searchQuiz = NULL;
    private $searchQuestion = NULL;

    public function __construct() {
        $cm = new ConnectionManager();
        $this->conn = $cm->connect_db();
        if (is_null($this->conn)) {
            throw new Exception("no connection");
        }
        $this->loginStatement = $this->conn->prepare($this->loginStatementString);
        if (is_null($this->loginStatement)) {
            throw new Exception("bad statement: '" . $this->loginStatementString . "'");
        }
        $this->addUserStatement = $this->conn->prepare($this->addUserStatementString);
        if (is_null($this->addUserStatement)) {
            throw new Exception("bad statement: '" . $this->addUserStatementString . "'");
        }
        //search quiz
        $this->searchQuiz = $this->conn->prepare($this->searchQuizByIdStatementString);
        if (is_null($this->searchQuiz)) {
            throw new Exception("bad statement: '" . $this->searchQuiz . "'");
        }
        $this->searchQuiz = $this->conn->prepare($this->searchQuizByTagStatementString);
        if (is_null($this->searchQuiz)) {
            throw new Exception("bad statement: '" . $this->searchQuiz . "'");
        }
        $this->searchQuiz = $this->conn->prepare($this->searchQuizByWITStatementString);
        if (is_null($this->searchQuiz)) {
            throw new Exception("bad statement: '" . $this->searchQuiz . "'");
        }
        //search Question.
        $this->searchQuestion = $this->conn->prepare($this->searchQuestionByIdStatementString);
        if (is_null($this->searchQuiz)) {
            throw new Exception("bad statement: '" . $this->searchQuiz . "'");
        }
        $this->searchQuestion = $this->conn->prepare($this->searchQuestionByTagStatementString);
        if (is_null($this->searchQuiz)) {
            throw new Exception("bad statement: '" . $this->searchQuiz . "'");
        }
        $this->searchQuestion = $this->conn->prepare($this->searchQuestionByWIQTStatementString);
        if (is_null($this->searchQuiz)) {
            throw new Exception("bad statement: '" . $this->searchQuiz . "'");
        }
        $this->searchQuestion = $this->conn->prepare($this->searchQuestionByWITCStatementString);
        if (is_null($this->searchQuiz)) {
            throw new Exception("bad statement: '" . $this->searchQuiz . "'");
        }
    }

//Regular constructor

    public function searchQuiz($input) {
        switch ($input) {
            case "id":
                $searchQuiz = $this->searchQuizByIdStatementString;
                break;
            case "tag":
                $searchQuiz = $this->searchQuizByTagStatementString;
                break;
            case "wit": //words in title
                $searchQuiz = $this->searchQuizByWITStatementString;
                break;
        }
        return $searchQuiz;
    }

//Search quiz by id, tags, etc.

    public function searchQuestion($input) {
        switch ($input) {
            case "id":
                $searchQuestion = $this->searchQuestionByIdStatementString;
                break;
            case "witc":    //words in the choices
                $searchQuestion = $this->searchQuestionByWITCStatementString;
                break;
            case "wiqt":    //words in question title
                $searchQuestion = $this->searchQuestionByWIQTStatementString;
                break;
            case "tag":
                $searchQuestion = $this->searchQuestionByTagStatementString;
                break;
        }
        return $searchQuestion;
    }

//search quiz by question id, tags, words in title, etc.

    public function login($username, $password) {
        $output = new \stdClass();
        $output->password = "";
        $output->Permission = "";
        $tempOut = false;

        try {
            $temp = $this->conn->prepare($this->loginStatementString);
            $temp->bindParam(":username", $username);
            $temp->bindParam(":password", $password);
            $temp->execute();
            $outTemp = $temp->fetch(PDO::FETCH_ASSOC);

            if ($outTemp != false) { //not false from return
                if ($outTemp["status"] != "0") {  //if we can validate that the user is active
                    session_start();
                    $_SESSION['username'] = $username;  //store UserName
                    $_SESSION['permissionLevel'] = $tempOut;  //store permission level

                    $res = new \stdClass();
                    $res->username = $username;
                    $res->permission = $outTemp["PermissionLevel"];

                    $tempOut = json_encode($res, true);
                } else {
                    throw new Exception("account deactivated");
                } //end if catch for user active status
            } else {
                throw new Exception("user not found in database");
            } //end eval
        } catch (Exception $ex) {
            $tempOut = $ex->getMessage();
        } finally {
            $temp->closeCursor();
        } //end defaults

        return $tempOut;
    }

//Log in user

    public function addUser($username, $password, $email, $permission) {
        $output = "";
        try {

            $tempPer = "guest";
            if ($permission != null) {
                $tempPer = $permission;
            }

            $active = true;
            $result = 0;

            $temporary = $this->conn->query("SELECT MAX(userID) FROM USERS");
            $test = $temporary->fetch(PDO::FETCH_ASSOC);
            $result = (int) $test["MAX(userID)"];
            $temporary->closeCursor();
            $result++;
            $ID = STR_PAD($result, 3, "0", STR_PAD_LEFT);

            //placeholder query to check if user exists

            $checkIfExists = $this->conn->prepare("SELECT `USER_EXISTS`(:username) AS `USER_EXISTS`;");
            $checkIfExists->bindParam(":username", $username);
            $checkIfExists->execute();
            $tfExist = $checkIfExists->fetchAll();

            $checkIfExists->closeCursor();

            if ($tfExist[0]["USER_EXISTS"] != "1") { //placeholder query
                $temp = $this->conn->prepare($this->addUserStatementString);
                $temp->bindParam(":username", $username);
                $temp->bindParam(":email", $email);
                $temp->bindParam(":ID", $ID);
                $temp->bindParam(":permission", $tempPer);
                $temp->bindParam(":active", $active);
                $temp->bindParam(":password", $password);
                $output = $temp->execute();
                $temp->closeCursor();
            } else {
                throw new \Exception("User already exists in database");
            }
        } catch (Exception $ex) {
            $output = $ex->getMessage();
        }
        return $output;
    }

//Create new user

    public function getUsersByQuery($showAllUsersStatementString) {
        $result = [];

        try {
            $stmt = $this->conn->prepare($showAllUsersStatementString);
            $stmt->execute();
            $dbresults = $stmt->fetchAll(PDO::FETCH_ASSOC);

            //var_dump($dbresults);


            foreach ($dbresults as $r) {


                $userID = $r['userID'];
                $username = $r['userName'];
                $password = $r['password'];
                $permission = $r['permissionLevel'];
                $status = $r['status'];
                $email = $r['email'];
                $obj = new User($username, $password, $email, $permission, $status);
                array_push($result, $obj);
            }
        } catch (Exception $e) {
            $result = [];
        } finally {
            if (!is_null($stmt)) {
                $stmt->closeCursor();
            }
        }

        return $result;
    }

    public function getAllUsers() {
        return $this->getUsersByQuery("SELECT * FROM Users");
    }

    public function getQuizzesByQuery($StatementString) {
        $result = [];

        try {
            $stmt = $this->conn->prepare($StatementString);
            $stmt->execute();
            $dbresults = $stmt->fetchAll(PDO::FETCH_ASSOC);

            var_dump($dbresults);


            foreach ($dbresults as $r) {

                $quizTitle = $r['userID'];
                $input = $r['userName'];
                $tags = $r['password'];
                $obj = new Quiz($quizTitle, $input, $tags);
                array_push($result, $obj);
            }
        } catch (Exception $e) {
            $result = [];
        } finally {
            if (!is_null($stmt)) {
                $stmt->closeCursor();
            }
        }

        return $result;
    }

    /**
     * Gets all menu items.
     * 
     * @return array MenuItem objects, possibly empty
     */
    public function getAllQuizzess() {
        return $this->getQuizzesByQuery("SELECT * FROM Quiz");
    }

    public function showAll() {
        try {
            $showAllUsersStatement = $this->conn->query($this->showAllUsersStatementString);
            $showAllUsersStatement->execute();
            $res = $showAllUsersStatement->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            $res = $ex->getMessage();
        } finally {
            $showAllUsersStatement->closeCursor();
            return $res;
        }
    }

//read all users from database

    public function removeUser($username) {
        $res = false;
        try {
            $temp = $this->conn->prepare($this->removeUserStatementString);
            $temp->bindParam(":username", $username);
            $temp->execute();
            $res = true;
        } catch (Exception $ex) {
            $res = false;
        } finally {
            $temp->closeCursor();
        }
        return $res;
    }

//remove user from database

    public function updateUser($username, $password) {
        $res = false;
        try {
            $temp = $this->conn->prepare($this->updatePasswordStatementString);
            $temp->bindParam(":username", $username);
            $temp->bindParam(":password", $password);
            $temp->execute();
            $res = true;
        } catch (Exception $ex) {
            $res = false;
        } finally {
            $temp->closeCursor();
        }
        return $res;
    }

//update user password

    public function userAccountStatus($username, $password, $tf) {
        $res = false;
        try {
            $temp = $this->conn->prepare($tf ? $this->activateUserStatementString : $this->deactivateUserStatementString);
            $temp->bindParam(":username", $username);
            $temp->bindParam(":password", password_hash($password, $this->salt));
            $temp->execute();
            $res = true;
        } catch (Exception $ex) {
            $res = false;
        } finally {
            $temp->closeCursor();
        }
        return $res;
    }

}
