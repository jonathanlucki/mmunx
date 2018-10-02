<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: logout.php
 * Purpose:
 * Created: 10/1/18
 * Last Modified: 10/1/18
 */

//Check if login form submitted
if(isset($_POST['logoutButton'])){
    $_SESSION['loggedIn'] = false;
    header("Location: http://mmun.jonathanlucki.ca/");
}