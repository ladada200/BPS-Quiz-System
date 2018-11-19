<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('setup.php');

class ConnectionManager {
    private $host = "";
    private $dbName = "";
    private $UserName = "";
    private $Password = "";
    

    public function connect_db() {
        $db = new PDO("mysql:host=".setup::host.";dbname=" . setup::dbName , setup::UName, setup::PWord);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

}
