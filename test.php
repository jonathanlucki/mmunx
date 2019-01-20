<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: test.php
 * Purpose:
 * Created: 9/16/18
 * Last Modified: 9/16/18
 */

//Includes initialization file (init.php)
include_once('resources/init.php');

$countryRow = getCountryRowByCode("demo123");

echo $countryRow['name'];

//header("Location: ".CONFIG['base_URL']."/pages/delegation");

//echo getSettingsRow()['admin_code'];

//echo getResolutionCount();

/*
if($countryRow != null) {
    echo "yeah";
    $_SESSION['loggedIn'] = true;
    echo true;
    echo $_SESSION['loggedIn'];
    $_SESSION['countryID'] = $countryRow['id'];
    echo $_SESSION['countryID'];
    $_SESSION['admin'] = false;
    echo "Location: ".CONFIG['base_URL']."/pages/delegation";
    ob_start();
    header("Location: ".CONFIG['base_URL']."/pages/delegation");
    ob_end_flush();
    die();
} else {
    echo "rats";
}*/