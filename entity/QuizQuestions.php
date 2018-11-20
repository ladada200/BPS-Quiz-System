<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class QuizQuestions {
    private $quizID = 0;
    private $tags = [];
    private $question = [];
    private $quizAnswers = [];
    
    function __construct($quizID, $question, $tags) {
        $this->quizID = $quizID;
        array_push($this->question, $question->getChoices());
        foreach($tags as $value) {
            array_push($this->tags, $value);
        }
        array_push($this->quizAnswers, $question->getAnswer());
    }
    function getQuizAnswers() {
        return $this->quizAnswers;
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