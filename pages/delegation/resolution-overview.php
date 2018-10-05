<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: resolution-overview.php
 * Purpose:
 * Created: 10/1/18
 * Last Modified: 10/05/18
 */

//Includes initialization file (init.php)
include_once('../../resources/init.php');

include('../layouts/header.php');
include('../layouts/delegation-content-pane-start.php');

//Sets resolution row
$resolutionRow = getResolutionRow($_GET['num']);

?>

    <p class="lead">Resolution <?php echo $resolutionRow['num']?></p>
    <p class="lead"><?php echo $resolutionRow['title']?></p>
    <br>
<?php include('../elements/delegates-table.php')?>
    <br>
    <p class="lead">Amendments:</p>
<?php include('../elements/resolution-box.php')?>


<?php
include('../layouts/delegation-content-pane-end.php');
include('../layouts/footer.php');