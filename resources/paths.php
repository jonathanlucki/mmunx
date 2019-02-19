<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: paths.php
 * Purpose:
 * Created: 27/01/19
 * Last Modified: 17/02/19
 */

define("PATHS",array(

    // css folder
    'main.css' => '/css/main.css',
    'screen.css' => '/css/screen.css',

    // img folder
    'background.jpeg' => '/img/background.jpeg',
    'favicon.ico' => '/img/favicon.ico',

    //js folder
    'util.js' => '/js/util.js',

    // pages/elements folder
    'country-table.php' => '/pages/elements/country-table.php',
    'delegates-table.php' => '/pages/elements/delegates-table.php',
    'get-resolution-pdf-button.php' => '/pages/elements/get-resolution-pdf-button.php',
    'resolution-box-class.php' => '/pages/elements/resolution-box-class.php',
    'resolutions-table.php' => '/pages/elements/resolutions-table.php',
    'welcome-message.php' => '/pages/elements/welcome-message.php',

    // pages/elements/admin folder
    'create-country-button.php' => '/pages/elements/admin/create-country-button.php',
    'create-resolution-button.php' => '/pages/elements/admin/create-resolution-button.php',
    'delete-country-button.php' => '/pages/elements/admin/delete-country-button.php',
    'delete-resolution-button.php' => '/pages/elements/admin/delete-resolution-button.php',
    'edit-country-button.php' => '/pages/elements/admin/edit-country-button.php',
    'edit-resolution-button.php' => '/pages/elements/admin/edit-resolution-button.php',

    // pages/elements/admin/screen folder
    'active-resolution-options.php' => '/pages/elements/admin/screen/active-resolution-options.php',
    'active-screen-options.php' => '/pages/elements/admin/screen/active-screen-options.php',
    'amendment-resolution-options.php' => '/pages/elements/admin/screen/amendment-resolution-options.php',
    'message-options.php' => '/pages/elements/admin/screen/message-options.php',
    'open-resolution-options.php' => '/pages/elements/admin/screen/open-resolution-options.php',
    'paging-system-options.php' => '/pages/elements/admin/screen/paging-system-options.php',
    'speakers-list-limit-options.php' => '/pages/elements/admin/screen/speakers-list-limit-options.php',
    'temp-speakers-options.php' => '/pages/elements/admin/screen/temp-speakers-options.php',
    'vote-active-resolution-options.php' => '/pages/elements/admin/screen/vote-active-resolution-options.php',
    'vote-amendment-resolution-options.php' => '/pages/elements/admin/screen/vote-amendment-resolution-options.php',
    'vote-open-resolution-options.php' => '/pages/elements/admin/screen/vote-open-resolution-options.php',
    'vote-result-options.php' => '/pages/elements/admin/screen/vote-result-options.php',

    // pages/layouts folder
    'content-pane-end.php' => '/pages/layouts/content-pane-end.php',
    'content-pane-start.php' => '/pages/layouts/content-pane-start.php',
    'footer.php' => '/pages/layouts/footer.php',
    'header.php' => '/pages/layouts/header.php',

    // pages/views/admin/screen folder
    'get-main-view.php' => '/pages/views/admin/screen/get-main-view.php',
    'get-paging-system.php' => '/pages/views/admin/screen/get-paging-system.php',
    'get-speakers-list.php' => '/pages/views/admin/screen/get-speakers-list.php',
    'screen.php' => '/pages/views/admin/screen/screen.php',
    'screen-control.php' => '/pages/views/admin/screen/screen-control.php',
    'submit-screen.php' => '/pages/views/admin/screen/submit-screen.php',

    // pages/views/admin folder
    'advanced.php' => '/pages/views/admin/advanced.php',
    'create-country.php' => '/pages/views/admin/create-country.php',
    'create-resolution.php' => '/pages/views/admin/create-resolution.php',
    'delete-country.php' => '/pages/views/admin/delete-country.php',
    'delete-resolution.php' => '/pages/views/admin/delete-resolution.php',
    'edit-country.php' => '/pages/views/admin/edit-country.php',
    'edit-resolution.php' => '/pages/views/admin/edit-resolution.php',
    'email.php' => '/pages/views/admin/email.php',
    'review.php' => '/pages/views/admin/review.php',
    'save-country.php' => '/pages/views/admin/save-country.php',
    'save-resolution.php' => '/pages/views/admin/save-resolution.php',
    'submit-review.php' => '/pages/views/admin/submit-review.php',

    // pages/views folder
    'countries.php' => '/pages/views/countries.php',
    'country-overview.php' => '/pages/views/country-overview.php',
    'delete-amendment.php' => '/pages/views/delete-amendment.php',
    'get-resolution-pdf.php' => '/pages/views/get-resolution-pdf.php',
    'home.php' => '/pages/views/home.php',
    'resolution-overview.php' => '/pages/views/resolution-overview.php',
    'resolutions.php' => '/pages/views/resolutions.php',
    'submit-amendment.php' => '/pages/views/submit-amendment.php',

    // resources folder
    'init.php' => '/resources/init.php',
    'login.php' => '/resources/login.php',
    'logout.php' => '/resources/logout.php',
    //other resources not included as they should only be included/required from init.php

    // server root
    'index.php' => '/index.php',

));