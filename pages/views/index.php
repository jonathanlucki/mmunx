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

require(PATHS['header.php']);
require(PATHS['content-pane-start.php']);

require(PATHS['welcome-message.php']);

require(PATHS['content-pane-end.php']);
require(PATHS['footer.php']);
