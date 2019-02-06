<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: get-resolution-pdf.php
 * Purpose:
 * Created: 05/02/19
 * Last Modified: 05/02/19
 */

//Requires initialization file (init.php)
require_once($_SERVER['DOCUMENT_ROOT'].'/resources/init.php');

$pdf = getResolutionPDF($_POST['num'])['pdf'];

if ($pdf != null) {
    header("Content-Type:"."application/pdf");
    echo $pdf;
} else {
    echo "Error: No pdf uploaded for resolution " . $_POST['num'] . ". Please inform Tech Desk if you see this message. Thanks! :)";
}