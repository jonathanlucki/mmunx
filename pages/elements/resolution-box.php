<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: resolution-box.php
 * Purpose:
 * Created: 9/17/18
 * Last Modified: 9/17/18
 */

//Includes resolution-box-class.php
include('resolution-box-class.php');

//resotluion-box object array
$resolutionBox = array();

//Constructs resolution boxes
for ($i=0; $i < getResolutionCount(); $i++) {
    $newResolutionBox = new resolution_box($countryRow['id'],($i+1));
    array_push($resolutionBox,$newResolutionBox);
}

?>

<div class="container">

    <?php
    for ($rowNum = 1; $rowNum <= (round(getResolutionCount() / 2)); $rowNum++) {
        echo '<div class="row no-gutters">';
        for ($colNum = 1; $colNum <= 2; $colNum++) {

            $resolutionNum = (($rowNum - 1) * 2) + $colNum;

            echo '<div class="col-lg">';
            if ($resolutionNum <= getResolutionCount()) {
                $resolutionBox[($resolutionNum-1)]->echoBox();
            } else {
                echo '<br>';
            }
            echo '</div>';

        }
        echo '</div>';
    } ?>

</div>
