<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: overview.php
 * Purpose:
 * Created: 9/16/18
 * Last Modified: 9/16/18
 */

//Includes initialization file (init.php)
include_once('../../resources/init.php');

include('../layouts/header.php');
include('../layouts/delegation-content-pane-start.php');

//Sets country row
$countryRow = getCountryRow($_GET['countryID']);

?>

    <p class="lead">Country: <?php echo $countryRow['name']?></p>
    <p class="lead">Speaker Points: <?php echo $countryRow['points']?></p>
    <br>
    <?php include('../elements/delegates-table.php')?>
    <br>
    <p class="lead">Amendments:</p>
    <?php include('../elements/resolution-box.php')?>


<?php
include('../layouts/footer.php');
include('../layouts/delegation-content-pane-end.php');
