<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class QuizQuestions {
    private $quizID = 0;
    private $question = [];
    
    function __construct($quizID, $question, $tags) {
        $this->quizID = $quizID;
        $obj = new \stdClass();
        $obj->question = $question->getQuestionText();
        $obj->choices = $question->getChoices();
        $obj->answer = $question->getAnswer();
        $obj->tags = $tags;
        array_push($this->question, $obj);

    }

    function getQuizID() {
        return $this->quizID;
    }

    function getTags() {
        return $this->tags;
    }

    function getQuestion() {
        return $this->question;
    }




}

header("location: ../");