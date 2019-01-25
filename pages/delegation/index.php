<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: index.php
 * Purpose:
 * Created: 9/16/18
 * Last Modified: 24/01/19
 */

//Includes initialization file (init.php)
include_once('../resources/init.php');

include('layouts/header.php');
include('layouts/delegation-navbar.php');

//Sets country row
$countryRow = getCountryRow($_SESSION['countryID']);

?>

<h1 class="display-4 text-center">Welcome, <?php echo $countryRow['name']?>.</h1>

<br>

<p class="lead text-center">To get started, navigate to <em>Country Overview</em> to submit an amendment.</p>

<?php
include('layouts/footer.php');
