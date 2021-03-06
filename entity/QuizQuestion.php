<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class QuizQuestion {
    private $questionID = 0;
    private $questionText = "";
    private $choices = [];
    private $answer = 0;

    public function __construct($questionID, $questionText, $choices, $answer) {
        $this->questionID = $questionID;
        $this->questionText = $questionText;
        foreach($choices as $value) {
            array_push($this->choices, $value);
        }
        $this->answer = $answer;
    }

    function getQuestionID() {
        return $this->questionID;
    }

    function getQuestionText() {
        return $this->questionText;
    }

    function getChoices() {
        return $this->choices;
    }

    function getAnswer() {
        return $this->answer;
    }

    function insertIntoDB($input) {
        try {
          $temp = $input;
          $temp->bindParam(":questionText", $this->qusetionText);
          $temp->bindParam(":choices", $choicOptions);
          $temp->bindParam(":answer", $this->answer);
          $temp->execute();

        } catch (Exception $ex) {
          $temp = $ex->getMessage();
        }
        return $temp;
    }

}
