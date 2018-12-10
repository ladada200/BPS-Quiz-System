<?php

$projectRoot = filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . '/BPS-Quiz-System'; //test
require($projectRoot . '/lib/accessor.php');
require($projectRoot . '/entity/Quiz.php');
require($projectRoot . '/entity/QuizQuestion.php');
require($projectRoot . '/entity/QuizQuestions.php');

$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

if ($method == "POST") {

    $body = file_get_contents('php://input');
    $output = json_decode($body, true);
    $temp = new handleQuiz($output['author'], $output['quizTitle'], $output['quizQuestions'], $output['quizTags']);
    return $temp->createUser();
} else if ($method == "GET") {

    $qa = new accessor();
    $results = $qa->getAllQuizzess();
    $results = json_encode($results, true);
    echo $results;
} else {
    return "*** ERROR: Unable to process request";
}

class handleQuiz {

    private $author = "";
    private $quizTitle = "";
    private $quizQuestions = [];
    private $quizTags = [];

    function __construct($author, $quizTitle, $quizQuestions, $quizTags) {
        $this->quizTitle = $quizTitle;
        $this->quizQuestions = $quizQuestions;
        $this->quizTags = $quizTags;
    }

    public function insertQuiz() {
        $response = "";
        $numsArr = [];
        try {

            $query = $temp->conn->query("SELECT MAX(quizID) FROM QUIZ");
            $test = $query->fetch(PDO::FETCH_ASSOC);
            $result = (int) $test["MAX(quizID)"];
            $query->closeCursor();
            $result++;
            $QuizID = STR_PAD($result, 3, "0", STR_PAD_LEFT);

            //Quiz Tags
            for ($i = 0; $i < count($this->quizTags); $i++) {
                $tempQuizTags .= $this->quizTags[$i];
                if ($i != (count($this->quizTags) - 1)) {
                    $tempQuizTags .= ",";
                }
            } //end loop

            foreach ($this->quizQuestions as $value) {
                $temp = new accessor();

                $tempRes = "";

                //Question choices
                for ($i = 0; $i < count($value['choices']); $i++) {
                    $tempRes .= $value['choices'][$i];
                    if ($i != (count($value['choices']) - 1)) {
                        $tempRes .= ",";
                    }
                } //end loop
                //Question Tags
                for ($i = 0; $i < count($value['tags']); $i++) {
                    $Questiontags .= $value['tags'][$i];
                    if ($i != (count($value['tags']) - 1)) {
                        $Questiontags .= ",";
                    }
                } //end loop
                //get max block
                $query = $temp->conn->query("SELECT MAX(questionID) FROM question");
                $test = $query->fetch(PDO::FETCH_ASSOC);
                $result = (int) $test["MAX(questionID)"];
                $query->closeCursor();
                $result++;
                $ID = STR_PAD($result, 3, "0", STR_PAD_LEFT);



                //insert block
                $res = $temp->conn->prepare("INSERT INTO `question` (`questionID`,`choices`,`answer`) VALUES (:questionID, :choices, :answer)");
                $res->bindParam(":questionID", $ID);
                $res->bindParam(":choices", $tempRes);
                $res->bindParam(":answer", $value['answer']);

                if ($res->execute()) {
                    $res->closeCursor();

                    array_push($numsArr, $ID);



                    $res = $temp->conn->prepare("INSERT INTO `quizQuestions` (`question`, `questionID`, `quizID`, `tags`) VALUES (:question, :questionID, :quizID, :tags)");
                    $res->bindParam(":question", $value['questionText']);
                    $res->bindParam(":questionID", $ID);
                    $res->bindParam(":quizID", $quizID);
                    $res->bindParam(":tags", $Questiontags);

                    if ($res->execute()) {
                        $res->closeCursor();

                        $res = $temp->conn->prepare("INSERT INTO `quiz` (`author`, `quizID`, `quizTitle`, `tags`) VALUES (:author, :quizID, :quizTitle, :quizTags)");
                        $res->bindParam(":author", $this->username);
                        $res->bindParam(":quizID", $quizID);
                        $res->bindParam(":quizTitle", $this->quizTitle);
                        $res->bindParam(":quizTags", $tempQuizTags);
                        $response = $res->execute() ? "Quiz successfully added" : "Could not add quiz";
                    };
                } else {
                    throw new \Exception("Err");
                } //end if
            } //end loop
        } catch (Exception $ex) {
            $response = $ex;
        }

        return $response;
    }

//end
}
