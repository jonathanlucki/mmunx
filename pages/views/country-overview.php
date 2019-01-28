<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: country-overview.php
 * Purpose:
 * Created: 9/16/18
 * Last Modified: 26/01/19
 */

//Requires initialization file (init.php)
require_once($_SERVER['DOCUMENT_ROOT'].'/resources/init.php');

require(PATHS['header.php']);
require(PATHS['content-pane-start.php']);

//Sets country row
$countryRow = getCountryRow($_GET['countryID']);


//RESOLUTION BOXES
//Requires resolution-box-class.php
require(PATHS['resolution-box-class.php']);

//resolution-box object array
$resolutionBox = array();

//Constructs resolution boxes
for ($i=0; $i < getResolutionCount(); $i++) {
    $newResolutionBox = new resolution_box($countryRow['id'],($i+1));
    array_push($resolutionBox,$newResolutionBox);
}

?>

    <p class="lead">Country: <?php echo $countryRow['name']?></p>
    <p class="lead">Speaker Points: <?php echo $countryRow['points']?></p>
    <br>
    <?php require(PATHS['delegates-table.php']) ?>
    <br>
    <p class="lead">Amendments:</p>

    <div class="container">

        <?php
        for ($rowNum = 1; $rowNum <= (round(getResolutionCount() / 2)); $rowNum++) {
            echo '<div class="row no-gutters">';
            for ($colNum = 1; $colNum <= 2; $colNum++) {

                $resolutionNum = (($rowNum - 1) * 2) + $colNum;

                echo '<div class="col-lg">';
                if ($resolutionNum <= getResolutionCount()) {
                    $resolutionBox[($resolutionNum-1)]->echoBox(false);
                } else {
                    echo '<br>';
                }
                echo '</div>';

            }
            echo '</div>';
        } ?>

    </div>


<?php

require(PATHS['content-pane-end.php']);

//modals for resolution box
for ($i=0; $i < getResolutionCount(); $i++) {
    $resolutionBox[$i]->echoModals();
}

require(PATHS['footer.php']);
