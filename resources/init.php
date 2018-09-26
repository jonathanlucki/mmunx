<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: init.php
 * Purpose: Includes all resource files at once
 * Created: 08/07/18
 * Last Modified: 08/07/18
 */

//Start session
session_start();

//Includes all resources
include_once('config.php');
include_once('helpers.php');
include_once('sql.php');
