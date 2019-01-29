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

require(PATHS['header.php']);
require(PATHS['content-pane-start.php']);


require(PATHS['country-table.php']);

if($_SESSION['admin']) {
    require(PATHS['create-country-button.php']);
}


require(PATHS['content-pane-end.php']);
require(PATHS['footer.php']);