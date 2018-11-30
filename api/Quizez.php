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
$tempX4 = [
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

//shakespeare
$tempX5 = [
    new QuizQuestions(15, new QuizQuestion(1, "”How achievements mock me” is a quote from which Shakespeare play? ", ["Julius Caesar", "Troilus and Cressida", "Coriolanus", "Timon of Athens"], 2), ["poems", "literature"]),
    new QuizQuestions(15, new QuizQuestion(2, "”How use doth breed a habit in man” comes from which Shakespeare play? ", ["The Two Gentlemen of Verona", "Hamlet", "Romeo and Juliet", "Midsummer’s Nights Dreams"], 1), ["verona", "hamlet", "romeo"]),
    new QuizQuestions(15, new QuizQuestion(3, "”If music be the food of love then play on” comes from which Shakespeare play?", ["Coriolanus", "All’s Well That Ends Well", "Twelfth Night", "Timon of Athens"], 3), ["night", "coriolanus"]),
    new QuizQuestions(15, new QuizQuestion(4, "”In time we hate that which we often fear” comes from which Shakespeare play?", ["As You Like It", "Hamlet", " Antony and Cleopatra"], 3), ["cleopatra", "hamlet"]),
    new QuizQuestions(15, new QuizQuestion(5, "”Our remedies oft in ourselves lie” is a quote from which play? ", ["All’s Well That Ends Well", "Two Gentlemen of Verona", "As You Like It", "Hamlet"], 1), ["gentelman", "poem", "verona"]),
    new QuizQuestions(15, new QuizQuestion(6, "Aegeon plays the Merchant of where? ", ["Verona", "Syracuse", "Windsor", "Venice"], 2), ["syracuse", "windsor", "venice"]),
    new QuizQuestions(15, new QuizQuestion(7, "All’s Well That Ends Well is set in France and which other country?", ["England", "Spain", "Italy", "Scotland"], 3), ["italy", "spain"]),
    new QuizQuestions(15, new QuizQuestion(8, "Bassanio and which other character are a couple in the Merchant of Venice?", ["Isabella", "Portia", "Jessica", "Juliet"], 2), ["portia", "juliet"]),
    new QuizQuestions(15, new QuizQuestion(9, "Beatirce and Benedict are lovers in which Shakespeare play?", ["King Lear", "Midsummer’s Nights Dream", "Measure for Measure", "Much Ado About Nothing"], 4), ["measure", "dream"]),
    new QuizQuestions(15, new QuizQuestion(10, "Beatirce and which other character are loves in Much Ado About Nothing?", ["Antonio", "Hero", "Benedict", "Claudio"], 3), ["hero", "benedict"])
];  //example code


//golf
$tempX6 = [
    new QuizQuestions(16, new QuizQuestion(1, "What is the surname of double US Open winner Andy?", ["North", "South", "East", "West"], 1), ["golf", "east"]),
    new QuizQuestions(16, new QuizQuestion(2, "What was awarded to the winners of the Open Championship between 1860-1870?", ["Red Belt", "Yellow Tie", "Green Hat", "Blue Jacket"], 1), ["hat", "blue", "belt"]),
    new QuizQuestions(16, new QuizQuestion(3, "At which course do the World Matchplay Championships take place? ", ["St Andrews", "Wentworth", "Muirfield", "The Belfry"], 2), ["belfry", "andrews"]),
    new QuizQuestions(16, new QuizQuestion(4, "How many times did Spaniard Seve Ballesteros win The Open?", ["3", "1", "4"], 3), ["open", "win"]),
    new QuizQuestions(16, new QuizQuestion(5, "The Claret Jug is famously awarded to the winner of which golf major?", ["US Open", "US Masters", "US PGA", "The Open"], 4), ["open", "us masters", "us open"]),
    new QuizQuestions(16, new QuizQuestion(6, "Which course has hosted The Open more times than any other?", ["St Andrews", "Muirfield", "Prestwick", "Royal Troon"], 1), ["st andrews", "prestwick", "royal troon"]),
    new QuizQuestions(16, new QuizQuestion(7, "First given in 1949, who is given a Silver Medal at The Open?", ["Leading Amateur", "Last Place", "Leading British Player", "Runner Up"], 1), ["place", "amateur"]),
    new QuizQuestions(16, new QuizQuestion(8, "How many years were there between Gary Player’s first and final triumphs at The Open?", ["15", "5", "10", "20"], 1), ["open", "gary players"]),
    new QuizQuestions(16, new QuizQuestion(9, "How many points are available in each Ryder Cup tournament?", ["26", "24", "20", "28"], 4), ["tournament", "ryder cup"]),
    new QuizQuestions(16, new QuizQuestion(10, "Who was the first player from outside the British Isles to captain a European Ryder Cup Team?", ["Sergo Garcia","Bernhard Langer", "Jose Maria Olazabal", "Benedict", "Seve Ballesteros"], 4), ["sergo", "maria"])
];  //example code

//50s music
$tempX7 = [
    new QuizQuestions(17, new QuizQuestion(1, "The Big O was the nickname given to which star?", ["Ritchie Valens", "Roy Orbison", "Bobby Darin", "Huey Smith"], 2), ["smith", "valens"]),
    new QuizQuestions(17, new QuizQuestion(2, "The Chicken and The Hawk and Flip, Flop and Fly were hits for which singer?", ["Bo Diddley", "Sam Cooke", "Hank Ballad", "Big Joe Turner"], 4), ["turner", "diddley", "cooke"]),
    new QuizQuestions(17, new QuizQuestion(3, "The film Beyond The Sea was about which 1950s singer?", ["Elvis Presley", "Duane Eddy", "Buddy Holly", "Bobby Darin"], 4), ["eddy", "buddy holly"]),
    new QuizQuestions(17, new QuizQuestion(4, "The Forces Sweetheart was a nickname given to which 1950s female star?", ["Rosemary Clooney", "Vera Lynn", "Kay Starr"], 2), ["lynn", "starr"]),
    new QuizQuestions(17, new QuizQuestion(5, "The Girl Cant Help it and Catalina Caper starred which music star?", ["Little Richard", "Buddy Holly", "Chuck Berry", "Bobby Darin"], 1), ["chuck berry", "st andrews", "bobby darin"]),
    new QuizQuestions(17, new QuizQuestion(6, "The Glory of Love was the first major hit for whom?", ["The Coasters", "The Moonglows", "The Flamingos", "The Five Keys"], 4), ["coasters", "flamingos", "keys"]),
    new QuizQuestions(17, new QuizQuestion(7, "The Killer was the nickname of which 1950s star? ", ["Buddy Holly", "Bill Haley", "Billy Ward", "Jerry Lee Lewis"], 4), ["lewis", "ward"]),
    new QuizQuestions(17, new QuizQuestion(8, "The King of Rockabilly was a nickname given to whom?", ["Johnny Cash", "Jerry Lee Lewis", "Carl Perkins", "Eddie Cochran"], 3), ["jerry", "carl perkins"]),
    new QuizQuestions(17, new QuizQuestion(9, "The Originator is a nickname often given to whom?", ["Bo Diddley", "Johnny Cash", "Gene Vincent", "Carl Perkins"], 1), ["jonny cash", "bo diddley"]),
    new QuizQuestions(17, new QuizQuestion(10, "The Shrine of St Cecilia was a major hit for whom?", ["The Penguins","The Harp Tones", "The Clowns", " The Del Vikings"], 2), ["vikings", "harp tones"])
];  //example code

//90s music
$tempX8 = [
    new QuizQuestions(18, new QuizQuestion(1, "In what year did Bryan Adams hit the top of the charts with “Everything I Do”? ", ["1991", "1994", "1996", "1998"], 1), ["top charts", "bryan adams"]),
    new QuizQuestions(18, new QuizQuestion(2, "In what year did Hanson achieve fame with the song “Mmmbop”?", [" 1997", "1990", "1995", "1992"], 1), ["fame", "song", "hanson"]),
    new QuizQuestions(18, new QuizQuestion(3, "In what year did Madonna release Vouge? ", ["1999", "1993", "1996", "1990"], 4), ["madonna", "vouge"]),
    new QuizQuestions(18, new QuizQuestion(4, "In what year did Michael Bolton have a No. 1 hit with “Tell me How am I Supposed to Live Without You”?", ["1990", "1996", "1994,"], 1), ["bolton", "number 1 hit"]),
    new QuizQuestions(18, new QuizQuestion(5, "In what year did R Kelly have a worldwide hit with “I Believe I Can Fly”?", ["1990", "1997", "1999", "1993"], 2), ["worldwide", "i can fly", "glory"]),
    new QuizQuestions(18, new QuizQuestion(6, "In what year did Shawn Colvin win the Grammy for Record of the Year? ", ["1995", "1997", "1991", "1993"], 4), ["shawn colvin", "record of the year", "grammy"]),
    new QuizQuestions(18, new QuizQuestion(7, "In what year did Toni Braxton hit the top of the charts with “You’re Making Me High”?", ["1992", "1998", "1994", "1996"], 4), ["top charts", "toni braxton"]),
    new QuizQuestions(18, new QuizQuestion(8, "In what year did Toni Braxton release Unbreak My Heart?", ["1999", "1993", "1997", "1995"], 3), ["toni braxton", "unbreak my heart"]),
    new QuizQuestions(18, new QuizQuestion(9, "In what year did Vanilla Ice release Ice Ice Baby?", ["1997", "1995", "1990", "1993"], 2), ["ice ice baby", "vanilla"]),
    new QuizQuestions(18, new QuizQuestion(10, "In which year did “Smooth” by Santana win the Grammy for Record of The Year?", ["1996","1999", "1990", "1993"], 2), ["grammys", "smooth"])
];  //example code

// art 20-21stC 
$tempX9 = [
    new QuizQuestions(19, new QuizQuestion(1, "Nighthawks was the most famous work by which artist?", ["Manet", "Hopper", "Monet", "Beckman"], 2), ["manet", "hopper"]),
    new QuizQuestions(19, new QuizQuestion(2, "Nightime, Enigma and Nostalgia was a 1930’s series by whom?", ["Yves Klein", "Jeff Koons", "Roy Lichtenstein", "Asrhile Gorky"], 4), ["gorky", "roy", "jeff"]),
    new QuizQuestions(19, new QuizQuestion(3, "NKV (New Artists Association of Munich founded)?", ["1909", "1990", "1939", "1959"], 4), ["1909", "nkv"]),
    new QuizQuestions(19, new QuizQuestion(4, "No 61 (Rust and Blue) is a work by whom?", ["Paul Klee", "Jackson Pollock", "Mark Rothko"], 3), ["mark rothko", "paul klee"]),
    new QuizQuestions(19, new QuizQuestion(5, "Noah Carneys Novel “The Art Thief” concerns works by which artist?", ["Kazimir Malevich", "Robert Rauschenberg", "Constantin Brancusi", "Francis Bacon"], 1), ["malevich", "brancusi", "francis bacon"]),
    new QuizQuestions(19, new QuizQuestion(6, "Nude Sitting on a Diva is a key work by whom?", ["Yves Klein", "Asrhile Gorky", "Amedeo Modigliani", "Jeff Koons"], 3), ["amedeo", "gorky", "koons"]),
    new QuizQuestions(19, new QuizQuestion(7, "Ocean Grayness is a major work by which 20th Century Artist?", ["Jackson Pollock", "Andy Warhol", "Man Ray", "Marcel Duchamp"], 1), ["andy", "duchamp"]),
    new QuizQuestions(19, new QuizQuestion(8, "Of whom did Picasso state “He will be the only painter left who understands what colour is”?", ["Hopper", "Chagall", "Monet", "Manet"], 2), ["hopper", "chagall"]),
    new QuizQuestions(19, new QuizQuestion(9, "Orange, Red and Yellow is a 1961 work by whom?", ["Jackson Pollock", "Martin Kippenberger", "Paul Klee", "Mark Rothko"], 4), ["1961", "martin"]),
    new QuizQuestions(19, new QuizQuestion(10, "Pablo Picasso belonged to which school of Art?", ["Cubist","Mannerist", "Action Painting", "Impressionist"], 1), ["cubis", "action"])
];  //example code

// art 20-21stC 
$tempX10 = [
    new QuizQuestions(20, new QuizQuestion(1, "PVG is the airport code for the main airport in which Asian City?", ["Seoul", "Tokyo", "Beijing", "Shanghai"], 4), ["seoul", "tokyo"]),
    new QuizQuestions(20, new QuizQuestion(2, "Richard Branson founded which major airline? Southwest", ["Quantas", "Airlines", "Virgin", "Emirates"], 3), ["airlines", "emirates", "virgin"]),
    new QuizQuestions(20, new QuizQuestion(3, "Rollin King is the founder of which major airline?", ["Quantas", "Virgin", "Southwest Airlines", "Emirates"], 3), ["quantas", "virgin"]),
    new QuizQuestions(20, new QuizQuestion(4, "Royal Air Maroc is the national Airline of which African country? ", ["Morocco", " Nigeria", "South Africa"], 1), ["south africa", "tunica"]),
    new QuizQuestions(20, new QuizQuestion(5, "RyanAir is an airline from which nation?", ["Wales", "Scotland", "England", "Ireland"], 4), ["wales", "scotland", "ireland"]),
    new QuizQuestions(20, new QuizQuestion(6, "Sabena is an airline from which nation?", ["France", "Belgium", "Netherlands", "Germany"], 2), ["belgium", "germany", "belgium"]),
    new QuizQuestions(20, new QuizQuestion(7, "Sansa is an airline from which nation?", ["Spain", "England", "France", "Costa Rica"], 4), ["england", "france"]),
    new QuizQuestions(20, new QuizQuestion(8, "Saudi Arabian Airlines has their base at an airport in which city?", ["Beddah", "Jeddah", "Teddah", "Feddah"], 2), ["jeddah", "feddah"]),
    new QuizQuestions(20, new QuizQuestion(9, "Schiphol Airport lies in which European Capital?", ["Berne", "Paris", "Brussels", "Amsterdam"], 4), ["amsterdam", "berne"]),
    new QuizQuestions(20, new QuizQuestion(10, "SHA is the airport code for an airport in which city?", ["Amsterdam","Shanghai", "Chicago", "Hanover"], 2), ["amsterdam", "chicago"])
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
