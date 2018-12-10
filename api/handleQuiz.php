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
  $temp = new handleQuiz($output['quizTitle'], $output['quizQuestions'], $output['quizTags']);
  echo $temp->createUser();

} else {
  return "*** ERROR: Unable to process request";
}

class handleQuiz {
  private $quizTitle = "";
  private $quizQuestions = [];
  private $quizTags = [];

  function __construct($quizTitle, $quizQuestions, $quizTags) {
      $this->quizTitle = $quizTitle;
      $this->quizQuestions = $quizQuestions;
      $this->quizTags = $quizTags;
  }

  public function insertQuiz() {
    $res = "";
    $numsArr = [];
    try {



      foreach($quizQuestions => $value) {
        $temp = new accessor();

        $tempRes = "";
        for($i = 0; $i < count($value['choices']); $i++) {
          $tempRes .= $value['choices'][$i];
          if ($i != (count($value['choices']) -1)) {
            $tempRes .= ",";
          }
        }

        $query = $temp->conn->query("SELECT MAX(questionID) FROM question");
        $test = $query->fetch(PDO::FETCH_ASSOC);
        $result = (int)$test["MAX(questionID)"];
        $query->closeCursor();
        $result++;
        $ID = STR_PAD($result, 3, "0", STR_PAD_LEFT);

        $res = $temp->conn->prepare("INSERT INTO `question` (`questionID`,`choices`,`answer`) VALUES (:questionID, :choices, :answer)");
        $res->bindParam(":questionID", $ID);
        $res->bindParam(":choices", $tempRes);
        $res->bindParam(":answer", $value['answer']);
        if($res->execute()) {
          array_push($numsArr, $ID);
        } else {
          throw new \Exception("Err");
        }


      }

    } catch (ex) {
      $res = ex;
    }

    return $res;
  } //end


}
