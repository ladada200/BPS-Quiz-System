<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ($method=="GET") {
    header("Content-type:application/pdf");
    
    // It will be called downloaded.pdf
    header("Content-Disposition:attachment;filename='".date("d-m-Y").".pdf'");

    readfile("original.pdf");
}