<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: utils.php
 * Purpose: Defines common helper functions
 * Created: 08/07/18
 * Last Modified: 17/02/19
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
            echo '<h4>'.getCountryRow($amendmentRow['country_id'])['name'].'\'s amendment to add clause</h4>';
            break;
        case 'amend':
            echo '<h4>'.getCountryRow($amendmentRow['country_id'])['name'].'\'s amendment to amend clause ' . $amendmentRow['clause'] . '</h4>';
            break;
        case 'strike':
            echo '<h4>'.getCountryRow($amendmentRow['country_id'])['name'].'\'s amendment to strike clause ' . $amendmentRow['clause'] . '</h4>';
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
                    header("Location: ".getLocalFilePath("home.php"));
                }
            } else {
                //redirect to login page
                header("Location: ".getLocalFilePath("index.php"));
            }
            break;

        case 'user':
            if (!(isset($_SESSION['loggedIn'])) || !$_SESSION['loggedIn']) {
                //redirect to login page
                header("Location: ".getLocalFilePath("index.php"));
            }
            break;

        case 'other':
            if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
                //redirect to home page
                header("Location: ".getLocalFilePath("home.php"));
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


/**
 * Returns array of all country id's with approved amendments for resolution $num in order of the speakers list
 * @param int  $num  Resolution number
 * @return array
 */
function getSpeakersListForResolution($num) {
    $speakerOrder = getSpeakersListOrder();
    $resSpeakerOrder = array();
    foreach ($speakerOrder as $speaker) {
        $amendmentRow = getAmendmentRow($speaker['id'],$num);
        if ($amendmentRow != null) {
            if ($amendmentRow['status'] == 'approved') {
                array_push($resSpeakerOrder,$amendmentRow['country_id']);
            }
        }
    }
    return $resSpeakerOrder;
}


/**
 * Gets current resolution tag for resolution $num
 * Ex: 3 => "GA003"
 * @param int  $num  Resolution number
 * @return string
 */
function getResolutionTag($num) {
    $digits = strlen($num);
    if ($digits == 1) {
        return "GA00".(string)$num;
    } else if ($digits == 2) {
        return "GA0".(string)$num;
    } else {
        return "GA".(string)$num;
    }
}


/**
 * Converts resolution status to proper format
 * Ex: "in_session => "In Session"
 * @param string  $status  Resolution status
 * @return string
 */
function convertResolutionStatus($status) {
    switch ($status) {
        case 'pending':
            return 'Pending';
            break;
        case 'passed':
            return 'Passed';
            break;
        case 'failed':
            return 'Failed';
            break;
        case 'in_session':
            return 'In Session';
            break;
        case 'shelved':
            return 'Shelved';
            break;
    }
}


/**
 * Returns true if submissions are open for resolution in $resolutionRow, otherwise returns false
 * @param array  $resolutionRow  The resolution DB row for the desired resolution
 * @return boolean
 */
function submissionsOpen($resolutionRow) {
    if ($resolutionRow['status'] == 'pending') {
        return true;
    } else if (($resolutionRow['status'] == 'in_session') && ($resolutionRow['speakers'] < 2)) {
        return true;
    } else {
        return false;
    }
}