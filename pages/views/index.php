<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: index.php
 * Purpose:
 * Created: 9/16/18
 * Last Modified: 26/01/19
 */

//Requires initialization file (init.php)
require_once($_SERVER['DOCUMENT_ROOT'].'/resources/init.php');

//redirect users
redirect('user');

require(getServerFilePath('header.php'));
require(getServerFilePath('content-pane-start.php'));

require(getServerFilePath('welcome-message.php'));

require(getServerFilePath('content-pane-end.php'));
require(getServerFilePath('footer.php'));
