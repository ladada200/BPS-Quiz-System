<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Quiz implements JsonSerializable {
    private $quizID = 0;
    private $quizTitle = "";
    private $quizQuestions = [];
    private $tags = [];
    private $author = "";
            
    function __construct($quizTitle, $input, $tags, $author) {
        $this->quizTitle = $quizTitle;
        $this->author = $author;
        foreach($input as $val) {
            $this->quizID = $val->getQuizID();
 
            foreach($val->getQuestion() as $value) {
                array_push($this->quizQuestions, $value);
            }

        }
        foreach($tags as $val) {
            array_push($this->tags, $val);
        }
    }    
    
    public function jsonSerialize() {
        return get_object_vars($this);
    }

    
    
}

header("location: ../");
