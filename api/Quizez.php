<?php

// put your code here
$projectRoot = filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . '/BPS-Quiz-System'; //test
require($projectRoot . '/lib/accessor.php');
require($projectRoot . '/entity/Quiz.php');
require($projectRoot . '/entity/QuizQuestion.php');
require($projectRoot . '/entity/QuizQuestions.php');

$tempX = [
    new QuizQuestions(12, new QuizQuestion(1, "Which of these is a real variety of Yam?", ["Sandra", "Amy", "Jessica", "Lucy"], 4), ["fruit", "veg", "watermelon", "tasty"]),
    new QuizQuestions(12, new QuizQuestion(2, "Which of these is not a variety of Avocado?", ["Bonny Lad", "Bacon", "Hass"], 1), ["vegetable", "veg", "food", "garden"]),
    new QuizQuestions(12, new QuizQuestion(3, "Which of these is not a variety of Tomato?", ["Early Girl", "Herald", "Albert", "Eurocross"], 3), ["tomato", "fruits"]),
    new QuizQuestions(12, new QuizQuestion(4, "Which of these is the correct name for a type of Lettuce?", ["Kos", "Close", "Cause"], 1), ["lettuce", "veggies"]),
    new QuizQuestions(12, new QuizQuestion(5, "Which of these is actually a Vegetable?", ["Watermelon", "Pear", "Banana", "Apple"], 1), ["watermelon", "pear", "banana"]),
    new QuizQuestions(12, new QuizQuestion(6, "Which of these is toxic if eaten raw? ", ["Ugli Fruit", "Watercress", "Watermelon", "Yam"], 4), ["yam", "watercress", "ugli fruit"]),
    new QuizQuestions(12, new QuizQuestion(7, "Which one of these is not a variety of Swede? ", ["Bora", "Baron Solemacher", "Magres", "Marian"], 2), ["bora", "marian"]),
    new QuizQuestions(12, new QuizQuestion(8, "Which one of the following vegetables has the highest Potassium content? ", ["Turnip", "Potato", "Broccoli", "Carrot"], 3), ["turnip", "potato"]),
    new QuizQuestions(12, new QuizQuestion(9, "Which of these is the correct name for a type of peach?", ["Ulberta", "Ilberta", "Elberta", "Alberta "], 3), ["elberta", "peach"]),
    new QuizQuestions(12, new QuizQuestion(10, "Which one of these berries is said to be good for women incurring uterine difficulties after a number of births?", [" Elderberry", "Gooseberry", "Blackberry", "Raspberry"], 2), ["elberta", "peach"]),
];  //example code

$var5 = new Quiz("testy", $tempX, ["CAT", "PUSSY", "HOT VAGINA", "STEVE'S ASSHOLE"]);  //example input
/*
 * array_of_questions = [
 *   new QuizQuestions(quiz_number, new QuizQuestion(question_id, question_text, array_of_choices, answer), array_of_question_tags);
 * ];
 * 
 * new Quiz(Quiz Title, array_of_questions, array_of_tags);
 */
echo json_encode($var5, JSON_PRETTY_PRINT) . "\n"; //example output

header("Content-Type: text/plain");
