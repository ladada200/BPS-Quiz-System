<?php

$projectRoot = filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . '/BPS-Quiz-System';
require_once ($projectRoot . '/utils/ChromePhp.php');
require_once ($projectRoot . '/lib/ConnectionManager.php');

class accessor {
    private $conn = "";
    private $loginStatementString = "SELECT UserName, Password, Permission FROM USER WHERE UserName = :username AND Password = :Password";
    //log into system
    private $loginStatement = NULL;
    
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

    }

      
}