<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class QuizQuestion {
    private $questionID = 0;
    private $choices = [];
    private $answer = 0;
    
    public function __construct($questionID, $choices, $answer) {
        $this->questionID = $questionID;
        foreach($choices as $value) {
            array_push($this->choices, $value);
        }
        $this->answer = $answer;
    }

    function getQuestionID() {
        return $this->questionID;
    }

    function getChoices() {
        return $this->choices;
    }

    function getAnswer() {
        return $this->answer;
    }


}