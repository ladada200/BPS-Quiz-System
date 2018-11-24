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

class accessor {
    private $conn = "";
    private $salt = "4d494e497469676572";
    
    private $loginStatementString = "SELECT Password, Permission FROM USER WHERE UserName = :username";
    private $addUserStatementString = "INSERT INTO USER (UserName, Password) VALUES (:username, :password)";
    private $removeUserStatementString =  "DELETE FROM USER WHERE UserName = :username";
    private $deactivateUserStatementString = "UPDATE USER SET active = false WHERE UserName=:username AND password=:password";
    private $activateUserStatementString = "UPDATE USER SET active = true WHERE UserName=:username AND password=:password";
    private $updatePasswordStatementString = "UPDATE USER SET Password = :password WHERE UserName=:username";
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
    }   //Regular constructor
    
    public function searchQuiz($input) {
        switch($input) {
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
    }   //Search quiz by id, tags, etc.
    
    public function searchQuestion($input) {
        switch($input) {
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
    }   //search quiz by question id, tags, words in title, etc.
    
    public function login($username, $password) {
        $output = NULL;
        $tempOut = NULL;
        try {
            $temp = $this->conn->prepare($this->loginStatementString);
            $temp->bindParam(":username", $username);
            $temp->execute();
        } catch (Exception $ex) {
            $tempOut = $ex->getMessage();
        } finally {
            $temp->closeCursor();
            $output = $temp->fetchAll(PDO::FETCH_ASSOC);
        }

        try {
            $tempOut = password_verify($password, $output->Password) ? $output->Permission : "guest";
        } catch (Exception $ex) {
            $tempOut = "ERROR: Could not verify User";
        } finally {
            $tempOut = $output;
        }

        return $tempOut;
    }   //Log in user
    
    public function addUser($username, $password) {
        $output = false;
        try {
            $temp = $this->conn->prepare($this->addUserStatementString);
            $temp->bindParam(":username", $username);
            $temp->bindParam(":password", password_hash($password, $salt));
            $temp->execute();
        } catch (Exception $ex) {
            $output = false;
        } finally {
            $temp->closeCursor();
            $output = true;
        }
        return $output;
    }   //Create new user
    
    public function showAll() {
        try {
            $showAllUsersStatement = $this->showAllUsersStatementString;
            $showAllUsersStatement->execute();
            $res = $showAllUsersStatement->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            $res = $ex->getMessage();
        } finally {
            $showAllUsersStatement->closeCursor();
            return $res;
        }
    }   //read all users from database
    
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
    }   //remove user from database
    
    public function updateUser($username, $password) {
        $res = false;
        try {
            $temp = $this->conn->prepare($this->updatePasswordStatementString);
            $temp->bindParam(":username",$username);
            $temp->bindParam(":password",$password);
            $temp->execute();
            $res = true;
        } catch (Exception $ex) {
            $res = false;
        } finally {
            $temp->closeCursor();       
        }
        return $res;
    }   //update user password
    
    public function userAccountStatus($username, $password, $tf) {
        $res = false;
        try {
            $temp = $this->conn->prepare($tf ? $this->activateUserStatementString : $this->deactivateUserStatementString);
            $temp->bindParam(":username",$username);
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