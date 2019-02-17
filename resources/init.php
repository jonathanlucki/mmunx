<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: init.php
 * Purpose: Requires all resource files at once
 * Created: 08/07/18
 * Last Modified: 10/02/19
 */

//Start session
session_start();

//Requires all resources
require_once('config.php');
require_once('paths.php');
require_once('utils.php');

//Requires all db resources
require_once('db/sql-amendments.php');
require_once('db/sql-conn.php');
require_once('db/sql-countries.php');
require_once('db/sql-resolutions.php');
require_once('db/sql-screen.php');