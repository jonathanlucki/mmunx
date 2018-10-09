<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: helpers.php
 * Purpose: Defines common helper functions
 * Created: 08/07/18
 * Last Modified: 08/10/18
 */


/**
 * Echos the contents of an amendment accoridng to $amendmentID
 * @param int  $amendmentID  ID number of the amendment
 */
function echoAmendmentText($amendmentID) {
    $amendmentRow = getAmendmentRowByID($amendmentID);
    switch($amendmentRow['type']) {
        case 'add':
            echo '<h4>Amendment to add clause</h4>';
            break;
        case 'amend':
            echo '<h4>Amendment to amend clause ' . $amendmentRow['clause'] . '</h4>';
            break;
        case 'strike':
            echo '<h4>Amendment to strike clause ' . $amendmentRow['clause'] . '</h4>';
            break;
    }

    echo '<br>';
    echo '<h6>Details:</h6>';
    echo '<p>' . $amendmentRow['details'] . '</p>';

}