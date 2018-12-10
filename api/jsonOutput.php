<?php

// put your code here
$projectRoot = filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . '/BPS-Quiz-System'; //test
require($projectRoot . '/lib/accessor.php');
require($projectRoot . '/entity/Quiz.php');
require($projectRoot . '/entity/QuizQuestion.php');
require($projectRoot . '/entity/QuizQuestions.php');

 $tempX = [
     new QuizQuestions(12,new QuizQuestion(0, "Who is phone?", ["HOUSE", "SHoot", "FART"], 3), ["tag5","tag6","tag7","tag8"]),
     new QuizQuestions(12,new QuizQuestion(0, "How many cups of sugar does it take to get to the moon?", ["HOUSE", "PAWS", "CArP"], 3), ["tag9","tag10"]),
     new QuizQuestions(12,new QuizQuestion(0, "Who is phone?", ["HOUSE", "DOG"], 3), ["tag11","tag12","tag13","tag14"])
 ];  //example code

$var5 = new Quiz("testy", $tempX, ["CAT", "kitten", "blueberry", "cheese"]);  //example input
/*
 * array_of_questions = [
 *   new QuizQuestions(quiz_number, new QuizQuestion(question_id, question_text, array_of_choices, answer), array_of_question_tags);
 * ];
 * 
 * new Quiz(Quiz Title, array_of_questions, array_of_tags);
 */

echo json_encode($var5, JSON_PRETTY_PRINT) . "\n"; //example output

header("Content-Type: text/plain");