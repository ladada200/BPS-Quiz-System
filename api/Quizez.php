<?php

// put your code here
$projectRoot = filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . '/BPS-Quiz-System'; //test
require($projectRoot . '/lib/accessor.php');
require($projectRoot . '/entity/Quiz.php');
require($projectRoot . '/entity/QuizQuestion.php');
require($projectRoot . '/entity/QuizQuestions.php');

//veg
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
    new QuizQuestions(12, new QuizQuestion(10, "Which one of these berries is said to be good for women incurring uterine difficulties after a number of births?", [" Elderberry", "Gooseberry", "Blackberry", "Raspberry"], 2), ["berry", "tastyberry"]),
];  //example code

//art
//more quizez
$tempX2 = [
    new QuizQuestions(11, new QuizQuestion(1, "The Naked Maja was a work produced by which artist?", ["Renoir", "Rembrandt", "Goya", "Delacroix"], 3), ["artist", "goya"]),
    new QuizQuestions(11, new QuizQuestion(2, "The Pitti Palace is located in which European City? ", ["Florence", "Naples", "Rome", "Madrid"], 1), ["florence", "naples", "artsy"]),
    new QuizQuestions(11, new QuizQuestion(3, "The Term “Impressionism” comes from a work by which painter?", ["Degas", "Herald", " Manet", "Pissaro", "Monet"], 4), ["monet", "impressionism"]),
    new QuizQuestions(11, new QuizQuestion(4, "The US WW1 recruitment poster “I Want You” was designed by which artist?", ["Johns", "Degas", "Flagg"], 3), ["war", "painting"]),
    new QuizQuestions(11, new QuizQuestion(5, "Theo Van Doesburg was born which what first name? ", ["Jean", "Henry", "Christian", "Frida"], 3), ["name", "identity", "imagination"]),
    new QuizQuestions(11, new QuizQuestion(6, "Three Flags is a famous work by which artist?", ["El Greco", "Klee", "Johns", "Titian"], 3), ["famous", "work", "artists"]),
    new QuizQuestions(11, new QuizQuestion(7, "Tintoretto had the nickname Little …_ ?", ["Sigher", "Flier", "Dyer", "Cryer"], 3), ["dyer", "nickname"]),
    new QuizQuestions(11, new QuizQuestion(8, "Titian famously said “He will never be anything but a dauber” about whom?", ["Goya", "Courbet", "Tintoretto", "Velazquez"], 3), ["coubert", "tintoretto"]),
    new QuizQuestions(11, new QuizQuestion(9, "To which other famous artist was Frida Kahlo married?", ["Diego Rivera", "Marc Chagall", "Andre Breton", "Yves Tanguay"], 1), ["marriage", "frida"]),
    new QuizQuestions(11, new QuizQuestion(10, "Twittering Machine is a famous work by which artist?", ["Klee", "Johns", "Titian", "El Greco"], 1), ["klee", "famous "])
];  //example code

//anatomy
//more quizez
$tempX3 = [
    new QuizQuestions(10, new QuizQuestion(1, "The illium can be found in what part of the body?", ["Pelvis", "Thorax", "Chest", " Stomach"], 1), ["body", "anatomy"]),
    new QuizQuestions(10, new QuizQuestion(2, "The Internal Oblique Muscle lies in which part of the human body?", ["Back", "Legs", "Skull", "Chest"], 1), ["oblique", "back", "chest"]),
    new QuizQuestions(10, new QuizQuestion(3, "The Intertransversarii muscles are located where?", ["Arm", "Herald", "Legs", "Skull", " Back"], 4), ["legs", "bones"]),
    new QuizQuestions(10, new QuizQuestion(4, "The Islets of Langerhans can be found in which organ?", ["Pancreas", "Intestine", "Stomach"], 1), ["stomach", "intestine"]),
    new QuizQuestions(10, new QuizQuestion(5, "The kidney, ureter, bladder, and urethra form which body system? ", ["Urinary", "Motor", "Reproductive", "Digestive"], 1), ["urinary", "mototr", "digestive"]),
    new QuizQuestions(10, new QuizQuestion(6, "The Kidneys and the Pancreas are found in which part of the human body?", ["Heart", "Abdomen", "Brain", "Chest"], 2), ["abdomen", "chest", "body"]),
    new QuizQuestions(10, new QuizQuestion(7, "The Labrum Cartilage can be found in what part of the human body?", ["Ankle", "Wrist", "Shoulder", "Knee"], 3), ["shoulder", "cartilage"]),
    new QuizQuestions(10, new QuizQuestion(8, "The lingula is part of which organ?", ["Spleen", " Appendix", "Lung", "Liver"], 3), ["lung", "appendix"]),
    new QuizQuestions(10, new QuizQuestion(9, "The Liver and the Spleen are conatined in which part of the body?", ["Chest", "Brain", "Abdomen", "Heart"], 3), ["heart", "abdomen"]),
    new QuizQuestions(10, new QuizQuestion(10, "The Lumbar Vertebrae lies in which part of the human body? ", ["Legs", "Arm", " Back", "Chest"], 3), ["back", "human"])
];  //example code

//solar system
//more quizez
$tempX3 = [
    new QuizQuestions(14, new QuizQuestion(1, "Rosalind is a moon that orbits which planet? ", ["Uranus", "Earth", "Mercury", "Mars"], 1), ["uranus", "mars"]),
    new QuizQuestions(14, new QuizQuestion(2, "Seething Bay is located on which body of the Solar System?", ["Mars", "Earth", "The Moon", "The Sun"], 3), ["moon", "sun", "planets"]),
    new QuizQuestions(14, new QuizQuestion(3, "Skathi is a moon of which planet?", ["Uranus", " Neptune", "Jupiter", "Saturn"], 4), ["jupiter", "uranus"]),
    new QuizQuestions(14, new QuizQuestion(4, "Smyths Sea can be found on which body in the Solar System?", [" The Sun", " The Moon", "The Earth"], 2), ["earth", "moon"]),
    new QuizQuestions(14, new QuizQuestion(5, "Sol is the name given to which body in the solar system? ", ["Sun", "Moon", "Venus", "Earth"], 1), ["sun", "solar system", "venus"]),
    new QuizQuestions(14, new QuizQuestion(6, "Styx is a moon of which body?", ["Pluto", "Saturn", "Ceres", "Jupiter"], 1), ["pluto", "saturn", "planets"]),
    new QuizQuestions(14, new QuizQuestion(7, "Sulphuric Acid forms the basis on which planet? ", ["Venus", "Mars", "Jupiter", "Mercury"], 1), ["venus", "mercury"]),
    new QuizQuestions(14, new QuizQuestion(8, "Tectonic Plates are a major feature of which planet?", ["Venus", "Mercury", "Mars", "Earth"], 3), ["earth", "mars"]),
    new QuizQuestions(14, new QuizQuestion(9, "Telesto is a moon of which planet?", ["Juterpiter", "Saturn", "Neptune", "Uranus"], 2), ["saturn", "moon"]),
    new QuizQuestions(14, new QuizQuestion(10, "Tethys is a moon of which planet? ", ["Saturn", " Neptune", "Uranus", "Jupiter"], 1), ["planet", "tethys"])
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
