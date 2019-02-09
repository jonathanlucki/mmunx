<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: sql-amendments.php
 * Purpose:
 * Created: 09/02/19
 * Last Modified: 09/02/19
 */


/**
 * Returns the amendment row from the amendments database for country id and resolution number
 * @param int  $CountryID  Country ID number
 * @param int  $resolution  Resolution ID number
 * @return array
 */
function getAmendmentRow($CountryID,$resolution) {
    return fetchRow("SELECT * FROM amendments WHERE country_id=? AND resolution=?",array("ii",$CountryID,$resolution));
}


/**
 * Returns the amendment row from the amendments database for amendmentID
 * @param int  $amendmentID  Amendment ID number
 * @return array
 */
function getAmendmentRowByID($amendmentID) {
    return fetchRow("SELECT * FROM amendments WHERE amendment_id=?",array("i",$amendmentID));
}


/**
 * Returns the number of amendments for country with id in the database
 * @param int  $countryID  Country ID number
 * @return int
 */
function getAmendmentCountByCountryID($countryID) {
    return fetchRowCount("SELECT amendment_id FROM amendments WHERE country_id=?",array("i",$countryID));
}


/**
 * Returns the number of amendments for country with id in the database
 * @param int  $num  Resolution Number
 * @return int
 */
function getAmendmentCountByResolutionNum($num) {
    return fetchRowCount("SELECT amendment_id FROM amendments WHERE resolution=?",array("i",$num));
}


/**
 * Returns the next amendment ID number
 * @return int
 */
function getNextAmendmentID() {
    return 1 + fetchRow("SELECT amendment_id FROM amendments WHERE amendment_id=(SELECT MAX(amendment_id) FROM amendments)",null)['amendment_id'];
}


/**
 * Deletes amendment with amendment ID number
 * @param int  $amendmentID  Amendment ID number
 * @return bool
 */
function deleteAmendmentByID($amendmentID) {
    return makeQuery("DELETE FROM amendments WHERE amendment_id=?",array("i",$amendmentID));
}


/**
 * Inserts an amendment with the given parameters into the amendment table
 * @param int  $countryID  Country ID number
 * @param int  $resolutionNum  Resolution number
 * @param string  $type  type of amendment - either 'add', 'strike', or 'amend'
 * @param int or null  $clause Clause number for amendment
 * @param string  $details  Amendment details
 * @return bool
 */
function insertAmendment($countryID,$resolutionNum,$type,$clause,$details) {
    if (getAmendmentRow($countryID,$resolutionNum) == null) {
        $amendmentID = getNextAmendmentID();
        $status = 'pending';
        if ($type == 'add') {
            return makeQuery("INSERT INTO amendments (amendment_id,country_id,resolution,type,status,details) VALUES (?,?,?,?,?,?)",array("iiisss",$amendmentID,$countryID,$resolutionNum,$type,$status,$details));
        } else if (($type == 'strike') || ($type == 'amend')) {
            return makeQuery("INSERT INTO amendments (amendment_id,country_id,resolution,type,clause,status,details) VALUES (?,?,?,?,?,?,?)",array("iiisiss",$amendmentID,$countryID,$resolutionNum,$type,$clause,$status,$details));
        } else {
            return false;
        }
    }
}


/**
 * Returns next pending amendment row, if no pending amendment row returns null
 * @return array or bool
 */
function getNextPendingAmendmentRow() {
    return fetchRow("SELECT * FROM amendments WHERE status=?",array("s","pending"));
}


/**
 * Sets the amendment with id $amendmentID's status to $status
 * @param int  $amendmentID  Amendment ID
 * @param string  $status  new amendment status
 * @return bool
 */
function updateAmendmentStatus($amendmentID,$status) {
    $newStatus = null;
    switch ($status) {
        case 'pending':
            $newStatus = 'pending';
            break;
        case 'approved':
            $newStatus = 'approved';
            break;
        case 'denied':
            $newStatus = 'denied';
            break;
        case 'passed':
            $newStatus = 'passed';
            break;
        case 'failed':
            $newStatus = 'failed';
            break;
        default:
            return false;
            break;
    }
    if ($newStatus != null) {
        return makeQuery("UPDATE amendments SET status=? WHERE amendment_id=?", array("si", $newStatus, $amendmentID));
    } else {
        return false;
    }
}


/**
 * Returns the number of pending amendments in the amendments table
 * @return int
 */
function getPendingAmendmentsCount() {
    return fetchRowCount("SELECT amendment_id FROM amendments WHERE status=?",array("s","pending"));
}