<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: get-paging-system.php
 * Purpose:
 * Created: 17/02/19
 * Last Modified: 17/02/19
 */

//Requires initialization file (init.php)
require_once($_SERVER['DOCUMENT_ROOT'].'/resources/init.php');

//get screen data
$screenData = getCurrentScreenData();

//echo result
if ($screenData['paging_system_open']) {
    echo '<h2>Paging System: Open</h2>';
} else {
    echo '<h2>Paging System: Closed</h2>';
}