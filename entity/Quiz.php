<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Quiz implements JsonSerializable {
    private $quizID = 0;
    private $quizTitle = "";
    private $quizTags = [];
    private $quizQuestions = [];
    private $quizAnswers = [];
    
    function __construct($quizTitle, $input) {
        
        $this->quizTitle = $quizTitle;
        foreach($input as $val) {
            $this->quizID = $val->getQuizID();

            foreach($val->getTags() as $value) {
                array_push($this->quizTags, $value);
            }
            foreach($val->getQuestion() as $value) {
                array_push($this->quizQuestions, $value);
            }
            foreach($val->getQuizAnswers() as $value) {
                array_push($this->quizAnswers, $value);
            }
        }
        
    }    
    
    public function jsonSerialize() {
        return get_object_vars($this);
    }

    
    
}