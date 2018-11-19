<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ConnectionManager {

    public function connect_db() {
        $db = new PDO("mysql:host=localhost;dbname=restaurantDB", "temp1234", "Haha1Win");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

}
