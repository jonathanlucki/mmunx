<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: paths.php
 * Purpose:
 * Created: 27/01/19
 * Last Modified: 27/01/19
 */

define("PATHS",array(

    // css folder
    'main.css' => $_SERVER['DOCUMENT_ROOT'].'/css/main.css',

    // img folder
    'background.jpeg' => $_SERVER['DOCUMENT_ROOT'].'/img/background.jpeg',

    // pages/elements folder
    'country-table.php' => $_SERVER['DOCUMENT_ROOT'].'/pages/elements/country-table.php',
    'create-country-button.php' => $_SERVER['DOCUMENT_ROOT'].'/pages/elements/create-country-button.php',
    'delegates-table.php' => $_SERVER['DOCUMENT_ROOT'].'/pages/elements/delegates-table.php',
    'resolution-box-class.php' => $_SERVER['DOCUMENT_ROOT'].'/pages/elements/resolution-box-class.php',
    'resolutions-table.php' => $_SERVER['DOCUMENT_ROOT'].'/pages/elements/resolutions-table.php',
    'welcome-message.php' => $_SERVER['DOCUMENT_ROOT'].'/pages/elements/welcome-message.php',

    // pages/layouts folder
    'content-pane-end.php' => $_SERVER['DOCUMENT_ROOT'].'/pages/layouts/content-pane-end.php',
    'content-pane-start.php' => $_SERVER['DOCUMENT_ROOT'].'/pages/layouts/content-pane-start.php',
    'footer.php' => $_SERVER['DOCUMENT_ROOT'].'/pages/layouts/footer.php',
    'header.php' => $_SERVER['DOCUMENT_ROOT'].'/pages/layouts/header.php',

    // pages/views/admin folder
    'create-country-submission.php' => $_SERVER['DOCUMENT_ROOT'].'/pages/views/admin/create-country-submission.php',
    'settings.php' => $_SERVER['DOCUMENT_ROOT'].'/pages/views/admin/settings.php',

    // pages/views folder
    'countries.php' => $_SERVER['DOCUMENT_ROOT'].'/pages/views/countries.php',
    'country-overview.php' => $_SERVER['DOCUMENT_ROOT'].'/pages/views/country-overview.php',
    'delete-amendment.php' => $_SERVER['DOCUMENT_ROOT'].'/pages/views/delete-amendment.php',
    'home.php' => $_SERVER['DOCUMENT_ROOT'].'/pages/views/home.php',
    'resolution-overview.php' => $_SERVER['DOCUMENT_ROOT'].'/pages/views/resolution-overview.php',
    'resolutions.php' => $_SERVER['DOCUMENT_ROOT'].'/pages/views/resolutions.php',
    'submit-amendment.php' => $_SERVER['DOCUMENT_ROOT'].'/pages/views/submit-amendment.php',

    // resources folder
    'login.php' => $_SERVER['DOCUMENT_ROOT'].'/resources/login.php',
    'logout.php' => $_SERVER['DOCUMENT_ROOT'].'/resources/logout.php',

    // server root
    'index.php' => $_SERVER['DOCUMENT_ROOT'].'/index.php',

));