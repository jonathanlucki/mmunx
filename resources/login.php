<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: login.php
 * Purpose:
 * Created: 9/16/18
 * Last Modified: 9/16/18
 */

//Includes database connection
include('connection.php');

//Sets up error variable
$error = "";

//Login script
//Check if login form submitted
if(isset($_POST['loginButton'])){

    //Get access code
    $code = $_POST['accessCode'];

    //Check if access code is admin code
    //If so, redirect to admin index
    if($code == getSettingsRow()['admin_code']) {

        //set up logged in admin session
        $_SESSION['loggedIn'] = true;
        $_SESSION['admin'] = true;
        header("Location: http://mmun.jonathanlucki.ca/pages/admin");

    }

    //try and get country row corresponding to given access code
    $countryRow = getCountryRowByCode($code);

    //Check if row exists
    if($countryRow != null) {

        //set up logged in session
        $_SESSION['loggedIn'] = true;
        $_SESSION['countryID'] = $countryRow['id'];
        $_SESSION['admin'] = false;
        header("Location: http://mmun.jonathanlucki.ca/pages/delegation");

    } else {

    $error = "Invalid Login";

    }
}