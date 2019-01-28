<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: resolution-overview.php
 * Purpose:
 * Created: 10/1/18
 * Last Modified: 26/01/19
 */

//Requires initialization file (init.php)
require_once($_SERVER['DOCUMENT_ROOT'].'/resources/init.php');

require(PATHS['header.php']);
require(PATHS['content-pane-start.php']);

//Sets resolution row
$resolutionRow = getResolutionRow($_GET['num']);


//RESOLUTION BOXES
//Requires resolution-box-class.php
require_once(PATHS['resolution-box-class.php']);

//resolution-box object array
$resolutionBox = array();

//Constructs resolution boxes
for ($i=0; $i < count(getCountryArray()); $i++) {
    $newResolutionBox = new resolution_box(getCountryArray()[$i]['id'],$resolutionRow['num']);
    array_push($resolutionBox,$newResolutionBox);
}

?>

    <p class="lead">Resolution <?php echo $resolutionRow['num'] . ': ' . $resolutionRow['title']?></p>
    <br>
    <p class="lead">Amendments:</p>

    <div class="container">

<?php
for ($rowNum = 1; $rowNum <= (round(count($resolutionBox) / 2)); $rowNum++) {
    echo '<div class="row no-gutters">';
    for ($colNum = 1; $colNum <= 2; $colNum++) {

        $resolutionNum = (($rowNum - 1) * 2) + $colNum;

        echo '<div class="col-lg">';
        if ($resolutionNum <= getResolutionCount()) {
            $resolutionBox[($resolutionNum-1)]->echoBox(true);
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
for ($i=0; $i < count($resolutionBox); $i++) {
    $resolutionBox[$i]->echoModals();
}

require(PATHS['footer.php']);