<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$mysqli = new mysqli($servername, $username, $password);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}



/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

