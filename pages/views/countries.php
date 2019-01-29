<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: countries.php
 * Purpose:
 * Created: 9/25/18
 * Last Modified: 26/01/19
 */

//Requires initialization file (init.php)
require_once($_SERVER['DOCUMENT_ROOT'].'/resources/init.php');

//redirect users
redirect('user');

require(getServerFilePath('header.php'));
require(getServerFilePath('content-pane-start.php'));


require(getServerFilePath('country-table.php'));

if($_SESSION['admin']) {
    require(getServerFilePath('create-country-button.php'));
}


require(getServerFilePath('content-pane-end.php'));
require(getServerFilePath('footer.php'));