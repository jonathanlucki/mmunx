<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: connection.php
 * Purpose:
 * Created: 9/16/18
 * Last Modified: 9/16/18
 */

//Includes initialization file (init.php)
include_once('../resources/init.php');

//Establish Connection
$conn = new mysqli(CONFIG['db_host'], CONFIG['db_username'], CONFIG['db_password'], CONFIG['db_name']);

// Check connection
if ($conn->connect_error) {
    echo "<script> alert('Database Connection Failed: " . $conn->connect_error . "'); </script>";
    die();
}