<?php

$projectRoot = filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . '/BPS-Quiz-System';
require_once ($projectRoot . '/utils/ChromePhp.php');
require_once ($projectRoot . '/lib/accessor.php');

$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

if ($method == "login") {
    
    $body = file_get_contents('php://input');
    $contents = json_decode($body, true);
    $temp = new userMethod($contents['username'], $contents['password'], NULL);
    echo $temp->login() ? true : false;
    
} else if ($method == "createUser") {
    
    $body = file_get_contents('php://input');
    $contents = json_decode($body, true);
    $temp = new userMethod($contents['username'], $contents['password'], $contents['email']);
    echo $temp->createUser();
    
} else if ($method == "deactivateUser") {
    
    $body = file_get_contents('php://input');
    $contents = json_decode($body, true);
    $temp = new userMethod($contents['username'], $contents['password'], null);
    echo $temp->userActivation(false);
    
} else if ($method == "activateUser") {
    
    $body = file_get_contents('php://input');
    $contents = json_decode($body, true);
    $temp = new userMethod($contents['username'], $contents['password'], null);
    echo $temp->userActivation(true);
    
} else if ($method === "tempUser") {
    
    $user = new \stdClass();
    $user->userID = 12227;
    $user->userName = "122227user";
    $user->password = "test";
    $user->email = "do-not-reply@fake.com";
    $user->permission = "user";
    echo json_encode($user, true);

} else {
    echo "***ERROR***" . $method . " not available!";
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
