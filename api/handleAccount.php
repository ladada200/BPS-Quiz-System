<?php

$projectRoot = filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . '/BPS-Quiz-System';
require_once ($projectRoot . '/utils/ChromePhp.php');
require_once ($projectRoot . '/lib/accessor.php');

$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

if ($method === "POST") {
    //method to check if user can be authenticated
    $body = file_get_contents('php://input');
    $contents = json_decode($body, true);
        echo var_dump(checkUser($_POST['username'], $_POST['password']));
}

class userMethod {
    private $username;
    private $password;
    private $email;
    
    function __construct($username, $password, $email) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }
    
    function getUsername() {
        return $this->username;
    }
    function getPassword() {
        return $this->password;
    }

    public function confirmEmail() {
        return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $this->email) ? true : false;
    }

    public function confirmPassword() {
        
    }    
    public function createUser() {
        $temp = new accessor();
        return $temp->addUser($this->username, $this->password) ? "User Added to Database" : "Unable to add user!";
    }
    public function updateUser() {
        
    }
}

function checkUser($uName, $pWord) {
    $tempOut = NULL;
    try {
        $temp = new accessor();
        $tempOut = $temp->login($uName, $pWord);
    } catch (Exception $ex) {
        ChromePHP::log($uName . " DOES NOT EXIST IN DATABASE");
    }
    return $tempOut;
}
