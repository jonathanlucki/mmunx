<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: sql.php
 * Purpose:
 * Created: 9/16/18
 * Last Modified: 9/16/18
 */


/**
 * Calls the SQL query $sql and returns true if successful, otherwise returns fasle
 * @param string  $sql  SQL query
 * @return  bool
 */
function makeQuery($sql) {

    //Includes database connection
    include('connection.php');

    //Make database query
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        return true;
    } else {
        $conn->close();
        echo "<script> alert('Database Query Error: " . $conn->error . "'); </script>";
        return false;
    }

}


/**
 * Returns an array of data corresponding to the $sql SQL query
 * @param string  $sql  SQL query
 * @return  array
 */
function fetchDataArray($sql) {

    //Includes database connection
    include('connection.php');

    //Retrieve row matching given code
    $result = $conn->query($sql);
    $conn->close();

    //Check if data exists
    if($result->num_rows > 0) {
        $dataArray = array();
        for ($i = 0; $i < $result->num_rows; $i++) {
            array_push($dataArray,$result->fetch_assoc());
        }
        return $dataArray;
    } else {
        return null;
    }

}


/**
 * Returns an array of one row of data corresponding to the $sql SQL query
 * @param string  $sql  SQL query
 * @return  array
 */
function fetchRow($sql) {

    //Includes database connection
    include('connection.php');

    //Retrieve row matching given code
    $result = $conn->query($sql." LIMIT 1");
    $conn->close();
    $data = $result->fetch_assoc();

    //Check if data exists
    if($result->num_rows == 1) {
        return $data;
    } else {
        return null;
    }

}


/**
 * Returns the number of rows obtained corresponding to the $sql SQL query
 * @param string  $sql  SQL query
 * @return  int
 */
function fetchRowCount($sql) {

    //Includes database connection
    include('connection.php');

    //Retrieve row matching given code
    $result = $conn->query($sql);
    $conn->close();

    //Return number of rows
    return $result->num_rows;

}


/**
 * Adds entry into the log database
 * @param string  $entry  Log Entry
 */
function addLogEntry($entry) {
    //do later
    return;
}


/**
 * Returns the country row from the country database corresponding to its access code
 * @param int  $code  Access code of country
 * @return array
 */
function getCountryRowByCode($code) {
    return fetchRow("SELECT * FROM countries WHERE code='$code'");
}


/**
 * Returns the country row from the country database corresponding to id
 * @param int  $id  ID number of country
 * @return array
 */
function getCountryRow($id) {
    return fetchRow("SELECT * FROM countries WHERE id='$id'");
}


/**
 * Returns the number of countries in the database
 * @return int
 */
function getCountryCount() {
    return fetchRowCount("SELECT * FROM countries");
}


/**
 * Returns an array of all country rows
 * @return array
 */
function getCountryArray() {
    return fetchDataArray("SELECT * FROM countries");
}


/**
 * Returns the settings row from the settings database (newest version)
 * @return array
 */
function getSettingsRow() {
    return fetchRow("SELECT * FROM settings WHERE version=(SELECT MAX(version))");
}


/**
 * Returns the amendment row from the amendments database for country id and resolution number
 * @param int  $CountryID  Country ID number
 * @param int  $resolution  Resolution ID number
 * @return array
 */
function getAmendmentRow($CountryID,$resolution) {
    return fetchRow("SELECT * FROM amendments WHERE country_id='$CountryID' AND resolution='$resolution'");
}


/**
 * Returns the amendment row from the amendments database for amendmentID
 * @param int  $amendmentID  Amendment ID number
 * @return array
 */
function getAmendmentRowByID($amendmentID) {
    return fetchRow("SELECT * FROM amendments WHERE amendment_id='$amendmentID'");
}


/**
 * Returns the number of amendments for country with id in the database
 * @param int  $CountryID  Country ID number
 * @return int
 */
function getAmendmentCountByCountryID($CountryID) {
    return fetchRowCount("SELECT * FROM amendments WHERE country_id='$CountryID'");
}


/**
 * Returns the number of amendments for country with id in the database
 * @param int  $num  Resolution Number
 * @return int
 */
function getAmendmentCountByResolutionNum($num) {
    return fetchRowCount("SELECT * FROM amendments WHERE resolution='$num'");
}


/**
 * Returns the next amendment ID number
 * @return int
 */
function getNextAmendmentID() {
    return 1 + fetchRow("SELECT amendment_id FROM amendments WHERE amendment_id=(SELECT MAX(amendment_id))")['amendment_id'];
}


/**
 * Deletes amendment with amendment ID number
 * @param int  $amendmentID  Amendment ID number
 * @return bool
 */
function deleteAmendmentByID($amendmentID) {
    return makeQuery("DELETE FROM amentments WHERE amendment_id='$amendmentID'");
}


/**
 * Inserts an amendment with the given parameters into the amendment table
 * @param int  $countryID  Country ID number
 * @param int  $resolutionNum  Resolution number
 * @param string  $type  type of amendment - either 'add', 'strike', or 'amend'
 * @param int or null  $clause
 * @param string  $details  Country ID number
 * @return bool
 */
function insertAmendment($countryID,$resolutionNum,$type,$clause,$details) {
    if (getAmendmentRow($countryID,$resolutionNum) == null) {
        $amendmentID = getNextAmendmentID();
        $status = 'pending';
        if ($type == 'add') {
            return makeQuery("INSERT INTO amendments (amendment_id,country_id,resolution,type,status,details) VALUES ('$amendmentID','$countryID','$resolutionNum','$type','$status','$details')");
        } else if (($type == 'strike') || ($type == 'amend')) {
            return makeQuery("INSERT INTO amendments (amendment_id,country_id,resolution,type,clause,status,details) VALUES ('$amendmentID','$countryID','$resolutionNum','$type','$clause','$status','$details')");
        }
    }
}


/**
 * Returns the resolution row for the given resolution number
 * @param int  $num  Country ID number
 * @return array
 */
function getResolutionRow($num) {
    return fetchRow("SELECT * FROM resolutions WHERE num='$num'");
}


/**
 * Returns the number of resolutions in the database
 * @return int
 */
function getResolutionCount() {
    return fetchRowCount("SELECT * FROM resolutions");
}