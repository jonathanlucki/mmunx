<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: config.php
 * Purpose: Defines $config array with all configurable constants
 * Created: 08/07/18
 * Last Modified: 20/02/19
 */

// Config Data Array
// Example: CONFIG['baseURL'] => 'http://mmun.jonathanlucki.ca'
define("CONFIG", array(

    //database config
    'db_host' => getenv('DB_HOST'),
    'db_name' => getenv('DB_DATABASE'),
    'db_username' => getenv('DB_USERNAME'),
    'db_password' => getenv('DB_PASSWORD'),

    //url config
    'base_URL' => getenv('BASE_URL'),

    //admin access code
    'admin_code' => getenv('ADMIN_CODE'),

    //Google analytics gtag id
    'gtag_id' => getenv('GTAG_ID'),

    //maximum displayed speakers
    'max_speakers_displayed' => 10,

    //version and last updated
    'last_updated' => "20/02/19",
    'version' => "v1.1"

));