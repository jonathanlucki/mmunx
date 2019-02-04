<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: sql.php
 * Purpose:
 * Created: 9/16/18
 * Last Modified: 03/02/19
 */


/**
 * Returns a MySQLi database connection
 * @return  mysqli
 */
function getConnection() {
    //Establish Connection
    $conn = new mysqli(CONFIG['db_host'], CONFIG['db_username'], CONFIG['db_password'], CONFIG['db_name']);

    // Check connection
    if ($conn->connect_error) {
        echo "<script> alert('Database Connection Failed: " . $conn->connect_error . "'); </script>";
        die();
    }

    return $conn;

}


/**
 * Calls the SQL query $sql and returns true if successful, otherwise returns false
 * @param string  $sql  SQL query
 * @param array or null  $params  parameters for SQL statement for bind_param
 * @return  bool
 */
function makeQuery($sql,$params) {

    //gets database connection
    $conn = getConnection();

    //creates prepared statement
    if ($stmt = $conn->prepare($sql)) {

        //binds parameters to statement
        if ($params != null) {
            if ($stmt->bind_param(...$params) === FALSE) {
                echo "<script> alert('Database Connection Failed: Failure binding parameter to statement'); </script>";
                die();
            }
        }

        //Make database query
        if ($stmt->execute() === TRUE) {
            $stmt->close();
            $conn->close();
            return true;
        } else {
            $conn->close();
            echo "<script> alert('Database Query Error: " . $conn->error . "'); </script>";
            return false;
        }

    } else {
        echo "<script> alert('Database Connection Failed: Failure created prepared statement'); </script>";
        die();
    }

}


/**
 * Returns an array of data corresponding to the $sql SQL query
 * @param string  $sql  SQL query
 * @param array or null  $params  parameters for SQL statement for bind_param
 * @return  array
 */
function fetchDataArray($sql,$params) {

    //gets database connection
    $conn = getConnection();

    //creates prepared statement
    if ($stmt = $conn->prepare($sql)) {

        //binds parameters to statement
        if ($params != null) {
            if ($stmt->bind_param(...$params) === FALSE) {
                echo "<script> alert('Database Connection Failed: Failure binding parameter to statement'); </script>";
                die();
            }
        }

        //Make database query
        if ($stmt->execute() === TRUE) {
            $result = $stmt->get_result();
            $stmt->close();
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
        } else {
            $conn->close();
            echo "<script> alert('Database Query Error: " . $conn->error . "'); </script>";
            return null;
        }

    } else {
        echo "<script> alert('Database Connection Failed: Failure created prepared statement'); </script>";
        die();
    }

}


/**
 * Returns an array of one row of data corresponding to the $sql SQL query
 * @param string  $sql  SQL query
 * @param array or null  $params  parameters for SQL statement for bind_param
 * @return  array
 */
function fetchRow($sql,$params) {

    //gets database connection
    $conn = getConnection();

    //creates prepared statement
    if ($stmt = $conn->prepare($sql." LIMIT 1")) {

        //binds parameters to statement
        if ($params != null) {
            if ($stmt->bind_param(...$params) === FALSE) {
                echo "<script> alert('Database Connection Failed: Failure binding parameter to statement'); </script>";
                die();
            }
        }

        //Make database query
        if ($stmt->execute() === TRUE) {
            $result = $stmt->get_result();
            $stmt->close();
            $conn->close();
            $data = $result->fetch_assoc();
            //Check if data exists
            if($result->num_rows == 1) {
                return $data;
            } else {
                return null;
            }
        } else {
            $conn->close();
            echo "<script> alert('Database Query Error: " . $conn->error . "'); </script>";
            return null;
        }

    } else {
        echo "<script> alert('Database Connection Failed: Failure created prepared statement'); </script>";
        die();
    }

}


/**
 * Returns the number of rows obtained corresponding to the $sql SQL query
 * @param string  $sql  SQL query
 * @param array or null  $params  parameters for SQL statement for bind_param
 * @return  int
 */
function fetchRowCount($sql,$params) {

    //gets database connection
    $conn = getConnection();

    //creates prepared statement
    if ($stmt = $conn->prepare($sql)) {

        //binds parameters to statement
        if ($params != null) {
            if ($stmt->bind_param(...$params) === FALSE) {
                echo "<script> alert('Database Connection Failed: Failure binding parameter to statement'); </script>";
                die();
            }
        }

        //Make database query
        if ($stmt->execute() === TRUE) {
            $result = $stmt->get_result();
            $stmt->close();
            $conn->close();
           return $result->num_rows;
        } else {
            $conn->close();
            echo "<script> alert('Database Query Error: " . $conn->error . "'); </script>";
            return null;
        }

    } else {
        echo "<script> alert('Database Connection Failed: Failure created prepared statement'); </script>";
        die();
    }

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
    return fetchRowCount("SELECT * FROM countries",null);
}


/**
 * Returns an array of all country rows
 * @return array
 */
function getCountryArray() {
    return fetchDataArray("SELECT * FROM countries",null);
}


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
    return fetchRowCount("SELECT * FROM amendments WHERE country_id=?",array("i",$countryID));
}


/**
 * Returns the number of amendments for country with id in the database
 * @param int  $num  Resolution Number
 * @return int
 */
function getAmendmentCountByResolutionNum($num) {
    return fetchRowCount("SELECT * FROM amendments WHERE resolution=?",array("i",$num));
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
 * Returns the resolution row for the given resolution number
 * @param int  $num  Country ID number
 * @return array
 */
function getResolutionRow($num) {
    return fetchRow("SELECT * FROM resolutions WHERE num=?",array("i",$num));
}


/**
 * Returns the number of resolutions in the database
 * @return int
 */
function getResolutionCount() {
    return fetchRowCount("SELECT * FROM resolutions",null);
}


/**
 * Returns an array of all resolution rows
 * @return array
 */
function getResolutionArray() {
    return fetchDataArray("SELECT * FROM resolutions", null);
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
    return fetchRowCount("SELECT * FROM amendments WHERE status=?",array("s","pending"));
}