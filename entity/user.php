<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User implements JsonSerializable{
    private $username;
    private $password;
    private $email;
    private $permission;
    private $accountCreationTime;
    private $accountStatus;
    
    //used for returning as object from SQL;
    function __construct($username, $password, $email, $permission, $accountStatus) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->permission = $permission;
        $this->accountStatus = $accountStatus;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function getPermission() {
        return $this->permission;
    }

    function getAccountCreationTime() {
        return $this->accountCreationTime;
    }

    function getAccountStatus() {
        return $this->accountStatus;
    }

        public function jsonSerialize() {
        return get_object_vars($this);
    }

}