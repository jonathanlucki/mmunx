<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: resolutions.php
 * Purpose:
 * Created: 10/1/18
 * Last Modified: 26/01/19
 */

//Requires initialization file (init.php)
require_once($_SERVER['DOCUMENT_ROOT'].'/resources/init.php');

//redirect users
redirect('user');

require(getServerFilePath('header.php'));
require(getServerFilePath('content-pane-start.php'));


require(getServerFilePath('resolutions-table.php'));

if($_SESSION['admin']) {
    require(getServerFilePath('create-resolution-button.php'));
}


require(getServerFilePath('content-pane-end.php'));
require(getServerFilePath('footer.php'));