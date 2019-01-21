<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: helpers.php
 * Purpose: Defines common helper functions
 * Created: 08/07/18
 * Last Modified: 21/01/19
 */


/**
 * Echos the contents of an amendment according to $amendmentID
 * @param int  $amendmentID  ID number of the amendment
 */
function echoAmendmentText($amendmentID) {

    //get amendment row
    $amendmentRow = getAmendmentRowByID($amendmentID);

    //echo amendment header
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

    //echo amendment body
    echo '<br>';
    echo '<h6>Details:</h6>';
    echo '<p>' . $amendmentRow['details'] . '</p>';

}


/**
 * Redirects page if not logged in or not a admin page
 * @param bool  $admin  Is page for admin only
 */
function redirect($admin) {

    //check if logged in
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {

        //check if admin page but not admin user
        if ($admin && !(isset($_SESSION['admin']) && $_SESSION['admin'])) {

            //redirect to home page
            header("Location: ".CONFIG['base_URL']."/pages");

        }

    } else {

        //redirect to login page
        header("Location: ".CONFIG['base_URL']);

    }

}