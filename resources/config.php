<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: config.php
 * Purpose: Defines $config array with all configurable constants
 * Created: 08/07/18
 * Last Modified: 09/07/18
 */

// Config Data Array
// Example: CONFIG['baseURL'] => 'http://mmun.jonathanlucki.ca'
define("CONFIG", array(

    //database config
    'db_host' => 'localhost',
    'db_name' => 'jonat653_mmunx_test',
    'db_username' => 'jonat653_user1',
    'db_password' => 'mmunx1',

    //url config
    'base_URL' => 'http://mmun.jonathanlucki.ca',

    //path config
    'path_css' => '/css',
    'path_img' => '/img',
    'path_js' => '/js',
    'path_pages' => '/pages',
    'path_layouts' => '/pages/layouts',
    'path_resources' => '/resources',
    'path_admin_pages' => '/pages/admin',
    'path_delegation_pages' => '/pages/delegation',
));