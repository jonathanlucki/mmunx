<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: sql-countries.php
 * Purpose:
 * Created: 09/02/19
 * Last Modified: 16/02/19
 */


/**
 * Returns the country row from the country database corresponding to its access code
 * @param string  $code  Access code of country
 * @return array
 */
function getCountryRowByCode($code) {
    return fetchRow("SELECT * FROM countries WHERE code=?",array("s",$code));
}


/**
 * Returns the country row from the country database corresponding to id
 * @param int  $id  ID number of country
 * @return array
 */
function getCountryRow($id) {
    return fetchRow("SELECT * FROM countries WHERE id=?",array("i",$id));
}


/**
 * Returns the number of countries in the database
 * @return int
 */
function getCountryCount() {
    return fetchRowCount("SELECT id FROM countries",null);
}


/**
 * Returns an array of all country rows
 * @return array
 */
function getCountryArray() {
    return fetchDataArray("SELECT * FROM countries ORDER BY name",null);
}


/**
 * Returns the next country ID number
 * @return int
 */
function getNextCountryID() {
    return 1 + fetchRow("SELECT id FROM countries WHERE id=(SELECT MAX(id) FROM countries)",null)['id'];
}


/**
 * Inserts a new country into the country table based on default settings
 * @return int or false  country id if successful, false if not successful
 */
function insertNewCountry() {
    $newID = getNextCountryID();
    $newName = "Country".$newID;
    $newCode = strval(rand(10000,99999));
    $newPoints = 0;
    $newOrderNum = rand(1,1000);
    if (makeQuery("INSERT INTO countries (id,name,code,points,order_num) VALUES (?,?,?,?,?)",array("issii",$newID,$newName,$newCode,$newPoints,$newOrderNum))) {
        return $newID;
    } else {
        return false;
    }
}


/**
 * Deletes the country row for $countryID from the countries table and all associated amendments from the amendments table
 * Returns true if successful, otherwise returns false
 * @param int  $countryID  ID of country
 * @return bool
 */
function deleteCountry($countryID) {
    return (makeQuery("DELETE FROM amendments WHERE country_id=?",array("i",$countryID)) &&
        makeQuery("DELETE FROM countries WHERE id=?",array("i",$countryID)));
}


/**
 * Updates country row corresponding to $countryID
 * Returns true if successful, otherwise returns false
 * @param int  $countryID  country id
 * @param string  $name  country name
 * @param string  $code  country access code
 * @param int  $points  country speaker points
 * @param int  $orderNum  country order num
 * @param string  $person1  person1's name
 * @param string  $email1  person1's email
 * @param string  $person2  person2's name
 * @param string  $email2  person2's email
 * @param string  $person3  person3's name
 * @param string  $email3  person3's email
 * @param string  $person4  person4's name
 * @param string  $email4  person4's email
 * @return bool
 */
function updateCountryRow($countryID,$name,$code,$points,$orderNum,$person1,$email1,$person2,$email2,$person3,$email3,$person4,$email4) {
    return makeQuery("UPDATE countries SET name=?, code=?, points=?, order_num=?, person1=?, email1=?, person2=?, email2=?, person3=?, email3=?, person4=?, email4=? WHERE id=?",
        array("ssiissssssssi",$name,$code,$points,$orderNum,$person1,$email1,$person2,$email2,$person3,$email3,$person4,$email4,$countryID));
}


/**
 * Returns array of all country id's in order of the speakers list
 * @return array
 */
function getSpeakersListOrder() {
    return fetchDataArray("SELECT id FROM countries ORDER BY points ASC, order_num ASC",null);
}


/**
 * Adds a speaker point to country with $countryID
 * Returns true if successful, otherwise returns false
 * @param int  $countryID  Country ID
 * @return bool
 */
function addSpeakerPoint($countryID) {
    return makeQuery("UPDATE countries SET points=points+1 WHERE id=?",array("i",$countryID));
}