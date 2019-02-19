<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: get-main-view.php
 * Purpose:
 * Created: 17/02/19
 * Last Modified: 17/02/19
 */

//Requires initialization file (init.php)
require_once($_SERVER['DOCUMENT_ROOT'].'/resources/init.php');

//get screen data
$screenData = getCurrentScreenData();

//get resolution row
if ($screenData['active_resolution'] != null) {
    $resolutionRow = getResolutionRow($screenData['active_resolution']);
}

//get amendment row
if ($screenData['active_amendment'] != null) {
    $amendmentRow = getAmendmentRowByID($screenData['active_amendment']);
}


function echoResolutionList() {

    //get resolution count
    $resolutionCount = getResolutionCount();

    //echo list
    for ($num=1; $num <= $resolutionCount; $num++) {
        echo '<h2>'.getResolutionTag($num).' - '.convertResolutionStatus(getResolutionRow($num)['status']).'</h2>';
    }

}

/**
 * Echos the contents of an amendment from $amendmentRow
 * @param array  $amendmentRow  Amendment row for amendment
 * @param bool  $voting  Is amendment vote in progress
 */
function echoAmendment($amendmentRow,$voting) {

    //if voting
    if ($voting) {
        $preHeader = "Voting on ";
    } else {
        $preHeader = "";
    }

    //echo amendment header
    switch($amendmentRow['type']) {
        case 'add':
            echo '<h1>'.$preHeader.getCountryRow($amendmentRow['country_id'])['name'].'\'s amendment to add clause</h1>';
            break;
        case 'amend':
            echo '<h1>'.$preHeader.getCountryRow($amendmentRow['country_id'])['name'].'\'s amendment to amend clause ' . $amendmentRow['clause'] . '</h1>';
            break;
        case 'strike':
            echo '<h1>'.$preHeader.getCountryRow($amendmentRow['country_id'])['name'].'\'s amendment to strike clause ' . $amendmentRow['clause'] . '</h1>';
            break;
    }

    //echo amendment body
    echo '<br>';
    echo '<h2>' . $amendmentRow['details'] . '</h2>';

}
?>

<div class="main-view-box" style="display: block; margin: auto; text-align: left; word-wrap: break-word;">

<?php
if ($screenData['active_screen'] == 'title') {

    echo '<h1>MMUN</h1>';

} else if ($screenData['active_screen'] == 'message') {

    echo '<h2>'.$screenData['message'].'</h2>';

} else {

    if ($screenData['vote_result'] != null) {

        //return according to vote result
        if ($screenData['vote_result'] == 'passed') {
            echo '<h1>Vote Passes</h1>';
        } else if ($screenData['vote_result'] == 'failed') {
            echo '<h1>Vote Fails</h1>';
        }

    } else if ($screenData['active_resolution'] == null) {
        if ($screenData['voting']) {

            echo '<h1>Voting to open debate on Resolution ' . getResolutionTag($screenData['voting']) . ': ' . getResolutionRow($screenData['voting'])['title'] . '</h1>';

        } else {

            echoResolutionList();

        }
    } else if ($screenData['active_amendment'] == null) {
        if ($screenData['voting']) {

            echo '<h1>Voting on Resolution ' . getResolutionTag($screenData['voting']) . ': ' . getResolutionRow($screenData['voting'])['title'] . '</h1>';

        } else {

            echoResolutionList();

        }
    } else {
        if ($screenData['voting']) {

            echoAmendment($amendmentRow, true);

        } else {

            echoAmendment($amendmentRow, false);

        }
    }
}
?>

</div>