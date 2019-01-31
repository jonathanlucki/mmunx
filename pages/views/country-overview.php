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

//redirect users
redirect('user');

require(getServerFilePath('header.php'));
require(getServerFilePath('content-pane-start.php'));

//Sets country row
$countryRow = getCountryRow($_GET['countryID']);


//RESOLUTION BOXES
//Requires resolution-box-class.php
require(getServerFilePath('resolution-box-class.php'));

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
    <?php
        if ($_SESSION['admin']) {
            require(getServerFilePath('delete-country-button.php'));
        }
        require(getServerFilePath('delegates-table.php'))
    ?>
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

require(getServerFilePath('content-pane-end.php'));

//modals for resolution box
for ($i=0; $i < getResolutionCount(); $i++) {
    $resolutionBox[$i]->echoModals();
}

require(getServerFilePath('footer.php'));
