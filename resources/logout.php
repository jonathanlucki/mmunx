<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: logout.php
 * Purpose:
 * Created: 01/10/18
 * Last Modified: 01/10/18
 */

//Check if login form submitted
if(isset($_POST['logoutButton'])){
    $_SESSION['loggedIn'] = false;
    header("Location: ".CONFIG['base_URL']);
}