<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: sql-conn.php
 * Purpose:
 * Created: 09/02/19
 * Last Modified: 09/02/19
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