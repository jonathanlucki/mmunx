<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: init.php
 * Purpose: Requires all resource files at once
 * Created: 08/07/18
 * Last Modified: 29/01/19
 */

//Start session
session_start();

//Requires all resources
require_once('config.php');
require_once('paths.php');
require_once('utils.php');
require_once('sql.php');
