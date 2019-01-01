<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: redirect.php
 * Purpose:
 * Created: 9/15/18
 * Last Modified: 9/15/18
 */

//Check if logged in and redirect if not
if (!(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true)) {
    header("Location: ".CONFIG['base_URL']);
}