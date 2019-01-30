<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: utils.php
 * Purpose: Defines common helper functions
 * Created: 08/07/18
 * Last Modified: 29/01/19
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
 * @param string  $page  The type of page, either 'admin', 'user', or 'other'
 */
function redirect($page) {

    //check page type
    switch ($page) {

        case 'admin':
            if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
                if (!(isset($_SESSION['admin']) || !$_SESSION['admin'])) {
                    //redirect to home page
                    header("Location: ".CONFIG['base_URL']."/pages/views/index.php");
                }
            } else {
                //redirect to login page
                header("Location: ".CONFIG['base_URL']);
            }
            break;

        case 'user':
            if (!(isset($_SESSION['loggedIn'])) || !$_SESSION['loggedIn']) {
                //redirect to login page
                header("Location: ".CONFIG['base_URL']);
            }
            break;

        case 'other':
            if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
                //redirect to home page
                header("Location: ".CONFIG['base_URL']."/pages/views/index.php");
            }
            break;

    }

}


/**
 * Returns current URL of the active page
 * @return string
 */
function getCurrentURL() {
    return "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}


/**
 * Returns the username for the current session
 * @return string
 */
function getSessionUsername() {
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
        if (isset($_SESSION['admin']) && $_SESSION['admin']) {
            echo 'ADMIN';
        } else {
            echo getCountryRow($_SESSION['countryID'])['name'];
        }
    }
}


/**
 * Returns the Local path of $fileName
 * For use in HTML
 * @param string  $fileName  The file name of the desired file
 * @return string
 */
function getLocalFilePath($fileName) {
    return PATHS[$fileName];
}


/**
 * Returns the Server path of $fileName
 * For use in PHP
 * @param string  $fileName  The file name of the desired file
 * @return string
 */
function getServerFilePath($fileName) {
    return $_SERVER['DOCUMENT_ROOT'].PATHS[$fileName];
}