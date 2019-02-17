<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: sql-screen.php
 * Purpose:
 * Created: 10/02/19
 * Last Modified: 17/02/19
 */


/**
 * Returns current data row from the screen table
 * If no row exists, one is created with the default values
 * @return array
 */
function getCurrentScreenData() {
    $data = fetchRow("SELECT * FROM screen",null);
    if ($data == null) {
        if (makeQuery("INSERT INTO screen VALUES ()",null)) {
            return fetchRow("SELECT * FROM screen", null);
        }
    } else {
        return $data;
    }
}


/**
 * Inserts $value into specified $field of the screen data row
 * Returns true if successful, otherwise returns false
 * @param string  $field  screen data row field
 * @param int or string  $value  new value for $field
 * @return bool
 */
function updateScreenData($field,$value) {
    if (is_string($value)) {
        return makeQuery("UPDATE screen SET " . $field ." = ? WHERE id=?", array("si",$value,0));
    } else {
        return makeQuery("UPDATE screen SET " . $field ." = ? WHERE id=?", array("ii",$value,0));
    }
}