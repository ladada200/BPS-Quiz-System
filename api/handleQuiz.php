<?php

$projectRoot = filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . '/BPS-Quiz-System'; //test
require($projectRoot . '/lib/accessor.php');


$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

if ($method == "POST") {

  $body = file_get_contents('php://input');
  $output = json_decode($body, true);
  $temp = new handleQuiz($output['author'], $output['title'], $output['questions'], $output['tags']);
  return $temp->insertQuiz();

} else {
  return "*** ERROR: Unable to process request";
}

class handleQuiz {
  private $author = "";
  private $quizTitle = "";
  private $quizQuestions = [];
  private $quizTags = [];
  private $conn = "";


  function __construct($author, $quizTitle, $quizQuestions, $quizTags) {
      $this->quizTitle = $quizTitle;
      $this->quizQuestions = $quizQuestions;
      $this->quizTags = $quizTags;
  }

  public function insertQuiz() {
    $response = "";
    $numsArr = [];
    $tempQuizTags = "";

    try {
      $temp = new accessor();
      $this->conn = $temp->getConn();

      $query = $this->conn->query("SELECT MAX(quizID) FROM QUIZ");
      $test = $query->fetch(PDO::FETCH_ASSOC);
      $result = (int)$test["MAX(quizID)"];
      $query->closeCursor();
      $result++;
      $QuizID = STR_PAD($result, 3, "0", STR_PAD_LEFT);

      //Quiz Tags
      for($i = 0; $i < count($this->quizTags); $i++) {
        $tempQuizTags .= $this->quizTags[$i];
        if ($i != (count($this->quizTags) -1)) {
          $tempQuizTags .= ",";
        }
      } //end loop

      foreach($this->quizQuestions as $value) {

        $tempRes = "";
        //Question choices
        for($i = 0; $i < count($value['choices']); $i++) {
          $tempRes .= "\"" . $value['choices'][$i] . "\"";
          if ($i != (count($value['choices']) -1)) {
            $tempRes .= ",";
          }
        } //end loop

        $Questiontags = "";
        //Question Tags
        for($i = 0; $i < count($value['tags']); $i++) {
          $Questiontags .= "\"" . $value['tags'][$i] . "\"";
          if ($i != (count($value['tags']) -1)) {
            $Questiontags .= ",";
          }
        } //end loop

        //get max block
        $query = $this->conn->query("SELECT MAX(questionID) FROM question");
        $test = $query->fetch(PDO::FETCH_ASSOC);
        $result = (int)$test["MAX(questionID)"];
        $query->closeCursor();
        $result++;
        $questionID = STR_PAD($result, 3, "0", STR_PAD_LEFT);

        //insert block
        $res = $this->conn->prepare("INSERT INTO `question` (`questionID`,`choices`,`answer`) VALUES (:questionID, :choices, :answer)");
        $res->bindParam(":questionID", $questionID);
        $res->bindParam(":choices", $tempRes);
        $res->bindParam(":answer", $value['answer']);
        $res->execute();
        $res->closeCursor();

        array_push($numsArr, $questionID);

        $rest = $this->conn->prepare("INSERT INTO `quizQuestions` (`question`, `questionID`, `quizID`, `tags`) VALUES (:question, :questionID, :quizID, :tags)");
        $rest->bindParam(":question", $value['questionText']);
        $rest->bindParam(":questionID", $questionID);
        $rest->bindParam(":quizID", $quizID);
        $rest->bindParam(":tags", $Questiontags);

        $rest->closeCursor();


      } //end loop

      $resp = $this->conn->prepare("INSERT INTO `quiz` (`author`, `quizID`, `quizTitle`, `tags`) VALUES (:author, :quizID, :quizTitle, :quizTags)");
      $resp->bindParam(":author", $this->author);
      $resp->bindParam(":quizID", $quizID);
      $resp->bindParam(":quizTitle", $this->quizTitle);
      $resp->bindParam(":quizTags", $tempQuizTags);
      $resp->execute();
      $resp->closeCursor();

    } catch (Exception $ex) {
      $response = $ex->getMessage();
    }

    return $response;
  } //end


}
