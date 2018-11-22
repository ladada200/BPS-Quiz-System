<?php

// put your code here
$projectRoot = filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . '/BPS-Quiz-System';
 require($projectRoot . '/lib/accessor.php');
 require($projectRoot . '/entity/Quiz.php');
 require($projectRoot . '/entity/QuizQuestion.php');
 require($projectRoot . '/entity/QuizQuestions.php');

 $tempX = [
     new QuizQuestions(12,new QuizQuestion(0, "Who is phone?", ["HOUSE", "DOG", "FART", "WHISTLE"], 3), ["tag1","tag2","tag3","tag4"]),
     new QuizQuestions(12,new QuizQuestion(0, "Who is phone?", ["HOUSE", "SHIT", "FART"], 3), ["tag5","tag6","tag7","tag8"]),
     new QuizQuestions(12,new QuizQuestion(0, "Who is phone?", ["HOUSE", "PAWS", "CRAP"], 3), ["tag9","tag10"]),
     new QuizQuestions(12,new QuizQuestion(0, "Who is phone?", ["HOUSE", "DOG"], 3), ["tag11","tag12","tag13","tag14"])
 ];  //example code

 $var5 = new Quiz("testy", $tempX);  //example output
echo json_encode($var5, JSON_PRETTY_PRINT) . "\n"; //example output

 header("Content-Type: text/plain");