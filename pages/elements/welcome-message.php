<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: welcome-message.php
 * Purpose:
 * Created: 26/01/19
 * Last Modified: 26/01/19
 */


if (!$_SESSION['admin']) {

    //Sets country row
    $countryRow = getCountryRow($_SESSION['countryID']);

    echo '<h1 class="display-4 text-center">Welcome, '.$countryRow['name'].'</h1>';
    echo '<br>';
    echo '<p class="lead text-center">To get started, navigate to <em>Country Overview</em> to submit an amendment.</p>';

} else {

    echo '<p class="lead text-center">Welcome, administrator.</p>';

}