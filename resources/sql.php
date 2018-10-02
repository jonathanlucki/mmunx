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
 * Returns an array of data corresponding to the $sql SQL query
 * @param string  $sql  SQL query
 * @return  array
 */
function fetchData($sql) {

    //Includes database connection
    include('connection.php');

    //Retrieve row matching given code
    $result = $conn->query($sql);
    $conn->close();
    $data = $result->fetch_assoc();

    //Check if data exists
    if($result->num_rows > 0) {
        return $data;
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
 * Returns the settings row from the settings database (newest version)
 * @return array
 */
function getSettingsRow() {
    return fetchRow("SELECT * FROM settings WHERE version=(SELECT MAX(version) FROM settings)");
}


/**
 * Returns the amendment row from the amendments database for country id and resolution number
 * @param int  $id  Country ID number
 * @param int  $resolution  Resolution ID number
 * @return array
 */
function getAmendmentRow($id,$resolution) {
    return fetchRow("SELECT * FROM amendments WHERE country_id='$id' AND resolution='$resolution'");
}


/**
 * Returns the number of amendments for country with id in the database
 * @param int  $id  Country ID number
 * @return int
 */
function getAmendmentCountByCountryID($id) {
    return fetchRowCount("SELECT * FROM amendments WHERE country_id='$id'");
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