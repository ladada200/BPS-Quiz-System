<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="lib/main.css" />
    </head>
    <body>
        <?php
        // put your code here
        require('lib/accessor.php');
        
        require('entity/Quiz.php');
        require('entity/QuizQuestion.php');
        require('entity/QuizQuestions.php');
        
        $tempX = [
            new QuizQuestions(12,new QuizQuestion(0, "Who is phone?", ["HOUSE", "DOG", "FART", "WHISTLE"], 3), ["tag1","tag2","tag3","tag4"]),
            new QuizQuestions(12,new QuizQuestion(0, "Who is phone?", ["HOUSE", "SHIT", "FART"], 3), ["tag5","tag6","tag7","tag8"]),
            new QuizQuestions(12,new QuizQuestion(0, "Who is phone?", ["HOUSE", "PAWS", "CRAP"], 3), ["tag9","tag10"]),
            new QuizQuestions(12,new QuizQuestion(0, "Who is phone?", ["HOUSE", "DOG"], 3), ["tag11","tag12","tag13","tag14"])
        ];  //example code
        
        $var5 = new Quiz("testy", $tempX);  //example output
        echo json_encode($var5, JSON_PRETTY_PRINT) . "\n"; //example output
        
        
        ?>

    </body>
</html>
