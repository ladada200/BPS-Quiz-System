<?php

$projectRoot = filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . '/BPS-Quiz-System'; //test
require($projectRoot . '/lib/accessor.php');
require($projectRoot . '/entity/Quiz.php');
require($projectRoot . '/entity/QuizQuestion.php');
require($projectRoot . '/entity/QuizQuestions.php');

$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

if ($method == "POST") {

} else {
  return "*** ERROR: Unable to process request";
}

class handleQuiz {
  private $quizTitle;
  private $quizQuestions;
  private $quiztags;

}
