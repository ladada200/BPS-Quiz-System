<?php

$projectRoot = filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . '/BPS-Quiz-System';
require_once ($projectRoot . '/utils/ChromePhp.php');
require_once ($projectRoot . '/lib/ConnectionManager.php');

class accessor {
    private $conn = "";
    private $loginStatementString = "SELECT UserName, Password, Permission FROM USER WHERE UserName = :username AND Password = :Password";
    private $searchQuizByIdStatementString = "SELECT * FROM Quiz WHERE ID=:bindParam";
    private $searchQuizByTagStatementString = "SELECT * FROM Quiz WHERE tags LIKE \"%:bindParam%\"";
    private $searchQuizByWITStatementString = "SELECT * FROM Quiz WHERE QuizTitle LIKE \"%:bindParam%\" ";

    private $searchQuestionByIdStatementString = "SELECT * FROM QuizQuestions WHERE QuizID=:bindParam";
    private $searchQuestionByWIQTStatementString = "SELECT * FROM QuizQuestions WHERE Question LIKE \"%:bindParam%\"";
    private $searchQuestionByWITCStatementString = "SELECT * FROM QuizQuestions WHERE QuestionID = (SELECT QuestionID FROM Question WHERE choices LIKE \"%:bindParam%\")";
    private $searchQuestionByTagStatementString = "SELECT * FROM QuizQuestions WHERE tags LIKE \%:bindParam%\"";
    
    //log into system
    private $loginStatement = NULL;
    private $searchQuiz = NULL;
    private $searchQuestion = NULL;
    
    
    
    public function __construct() {
        $cm = new ConnectionManager();
        $this->conn = $cm->connect_db();
        if (is_null($this->conn)) {
            throw new Exception("no connection");
        }
        $this->loginStatement = $this->conn->prepare($this->loginStatementString);
        if (is_null($this->loginStatement)) {
            throw new Exception("bad statement: '" . $this->loginStatementString . "'");
        }
        //search quiz
        $this->searchQuiz = $this->conn->prepare($this->searchQuizByIdStatementString);
        if (is_null($this->searchQuiz)) {
            throw new Exception("bad statement: '" . $this->searchQuiz . "'");
        }
        $this->searchQuiz = $this->conn->prepare($this->searchQuizByTagStatementString);
        if (is_null($this->searchQuiz)) {
            throw new Exception("bad statement: '" . $this->searchQuiz . "'");
        }
        $this->searchQuiz = $this->conn->prepare($this->searchQuizByWITStatementString);
        if (is_null($this->searchQuiz)) {
            throw new Exception("bad statement: '" . $this->searchQuiz . "'");
        }
        //search Question.
        $this->searchQuestion = $this->conn->prepare($this->searchQuestionByIdStatementString);
        if (is_null($this->searchQuiz)) {
            throw new Exception("bad statement: '" . $this->searchQuiz . "'");
        }
        $this->searchQuestion = $this->conn->prepare($this->searchQuestionByTagStatementString);
        if (is_null($this->searchQuiz)) {
            throw new Exception("bad statement: '" . $this->searchQuiz . "'");
        }
        $this->searchQuestion = $this->conn->prepare($this->searchQuestionByWIQTStatementString);
        if (is_null($this->searchQuiz)) {
            throw new Exception("bad statement: '" . $this->searchQuiz . "'");
        }
        $this->searchQuestion = $this->conn->prepare($this->searchQuestionByWITCStatementString);
        if (is_null($this->searchQuiz)) {
            throw new Exception("bad statement: '" . $this->searchQuiz . "'");
        }
    }

      
}