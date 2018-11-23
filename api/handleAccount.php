<?php

$projectRoot = filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . '/BPS-Quiz-System';
require_once ($projectRoot . '/utils/ChromePhp.php');
require_once ($projectRoot . '/lib/accessor.php');

$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

if ($method === "POST") {
    //method to check if user can be authenticated
    $body = file_get_contents('php://input');
    $contents = json_decode($body, true);
    //echo var_dump(checkUser($_POST['username'], $_POST['password']));
    //echo var_dump($contents);
    if ($contents['login'] == true) {
        $temp = new userMethod($contents['username'], $contents['password'], NULL);
        echo $temp->login();
    } else if ($contents['createUser'] == true) {
        $temp = new userMethod($contents['username'], $contents['password'], $contents['email']);
        echo $temp->createUser();
    } else if ($contents['deactivateUser'] == true) {
        $temp = new userMethod($contents['username'], $contents['password'], null);
        echo $temp->userActivation(false);
    } else if ($contents['activateUser'] == true) {
        $temp = new userMethod($contents['username'], $contents['password'], null);
        echo $temp->userActivation(true);
    } else {
        echo $temp = "***ERROR***";
    }
    
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
        $temp = new accessor();
        return $temp->login($this->username, $this->password);
    }    
    
    public function createUser() {
        $temp = new accessor();
        return $temp->addUser($this->username, $this->password) ? "User Added to Database" : "Unable to add user";
    }
    
    public function updateUser() {
        $temp = new accessor();
        return $temp->updateUser($this->username, $this->password) ? "Updated User" : "Unable to update user";
    }
    
    public function userActivation($input) {
        $temp = new accessor();
        return $temp->userAccountStatus($this->username, $this->password, $input) ? "User schema changed" : "Could not alter user schema";
    }
}
