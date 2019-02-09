<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: sql-resolutions.php
 * Purpose:
 * Created: 09/02/19
 * Last Modified: 09/02/19
 */


/**
 * Returns the resolution row for the given resolution number
 * @param int  $num  Country ID number
 * @return array
 */
function getResolutionRow($num) {
    return fetchRow("SELECT num, title, status, clauses, submitter, seconder, negator FROM resolutions WHERE num=?",array("i",$num));
}


/**
 * Returns the number of resolutions in the database
 * @return int
 */
function getResolutionCount() {
    return fetchRowCount("SELECT num FROM resolutions",null);
}


/**
 * Returns an array of all resolution rows
 * @return array
 */
function getResolutionArray() {
    return fetchDataArray("SELECT num, title, status, clauses, submitter, seconder, negator FROM resolutions", null);
}


/**
 * Returns the next resolution number
 * @return int
 */
function getNextResolutionNum() {
    return 1 + fetchRow("SELECT num FROM resolutions WHERE num=(SELECT MAX(num) FROM resolutions)",null)['num'];
}


/**
 * Inserts a new resolution into the resolution table based on default settings
 * @return int or false  resolution num if successful, false if not successful
 */
function insertNewResolution() {
    $newNum = getNextResolutionNum();
    $newTitle = "Resolution".$newNum;
    $newStatus = "pending";
    $newClauses = 1;
    $newSubmitter = 1;
    $newSeconder = 1;
    $newNegator = 1;
    if (makeQuery("INSERT INTO resolutions (num,title,status,clauses,submitter,seconder,negator) VALUES (?,?,?,?,?,?,?)",array("issiiii",$newNum,$newTitle,$newStatus,$newClauses,$newSubmitter,$newSeconder,$newNegator))) {
        return $newNum;
    } else {
        return false;
    }
}


/**
 * Deletes the resolution row for resolution with num $num from the resolutions table and all associated amendments from the amendments table
 * Returns true if successful, otherwise returns false
 * @param int  $num  Resolution num
 * @return bool
 */
function deleteResolution($num) {
    if (makeQuery("DELETE FROM amendments WHERE resolution=?",array("i",$num)) &&
        makeQuery("DELETE FROM resolutions WHERE num=?",array("i",$num))) {
        $resolutionCount = getResolutionCount();
        for ($i = $num+1; $i <= ($resolutionCount+1); $i++) {
            if(!makeQuery("UPDATE resolutions SET num=? WHERE num=?",array("ii",$i-1,$i))) {
                return false;
            }
        }
        return true;
    } else {
        return false;
    }
}


/**
 * Updates resolution row corresponding to $original_num
 * Returns true if successful, otherwise returns false
 * @param int  $original_num  Original resolution num
 * @param int  $num  New resolution num
 * @param string  $title  Resolution title
 * @param string  $status  Resolution status
 * @param int  $clauses  Number of resolution clauses
 * @param int  $submitter  Resolution submitter country id
 * @param int  $seconder  Resolution seconder country id
 * @param int  $negator  Resolution negator country id
 * @return bool
 */
function updateResolutionRow($original_num,$num,$title,$status,$clauses,$submitter,$seconder,$negator) {
    if($original_num == $num) {
        return makeQuery("UPDATE resolutions SET title=?, status=?, clauses=?, submitter=?, seconder=?, negator=? WHERE num=?", array("ssiiiii",$title,$status,$clauses,$submitter,$seconder,$negator,$num));
    } else {
        $temp = getResolutionCount() + 1;
        if (makeQuery("UPDATE resolutions SET num=? WHERE num=?", array("ii",$temp,$num)) &&
            makeQuery("UPDATE resolutions SET title=?, status=?, clauses=?, submitter=?, seconder=?, negator=? WHERE num=?", array("ssiiiii",$title,$status,$clauses,$submitter,$seconder,$negator,$num,$original_num)) &&
            makeQuery("UPDATE resolutions SET num=? WHERE num=?", array("ii",$original_num,$temp))) {
            return true;
        } else {
            return false;
        }
    }
}


/**
 * Inserts resolution pdf into resolutions table
 * Returns true if successful, otherwise returns false
 * @param int  $num  Resolution Number
 * @param string  $data  PDF data (use file_get_contents)
 * @return bool
 */
function insertResolutionPDF($num,$data) {
    return makeQuery("UPDATE resolutions SET pdf=? WHERE num=?",array("si",$data,$num));
}


/**
 * Returns the pdf for resolution $num
 * @param int  $num  Resolution Number
 * @return array
 */
function getResolutionPDF($num) {
    return fetchRow("SELECT pdf FROM resolutions WHERE num=?",array("i",$num));
}