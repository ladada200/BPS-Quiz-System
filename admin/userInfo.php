<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$projectRoot = filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . '/BPS-Quiz-System';
require_once ($projectRoot . '/utils/ChromePhp.php');
require_once ($projectRoot . '/lib/accessor.php');  //output
require_once ($projectRoot . '/entity/user.php');   //cats

$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

if ($method === "getAllUsers") {
    $body = file_get_contents('php://input');
    $contents = json_decode($body, true);
    $temp = new accessor();
    $output = $temp->showAll();
    $users = [];
    foreach($output as $key => $value) {
        $username = $output->username;
        $password = $output->password;
        $email = $output->email;
        $permission = $output->permission;
        $accountCreationTime = "";
        $accountStatus = "active";
        array_push($users, new User($username, $password, $email, $permission, $accountCreationTime, $accountStatus));
    }
    echo json_encode($users, true);
} else {
    echo "*** ERROR";
}