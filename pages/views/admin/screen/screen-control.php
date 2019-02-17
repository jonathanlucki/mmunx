<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: screen-control.php
 * Purpose:
 * Created: 09/02/19
 * Last Modified: 16/02/19
 */

//Requires initialization file (init.php)
require_once($_SERVER['DOCUMENT_ROOT'].'/resources/init.php');

//redirect users
redirect('admin');

require(getServerFilePath('header.php'));
require(getServerFilePath('content-pane-start.php'));

//get screen data
$screenData = getCurrentScreenData();

//get resolution row
if ($screenData['active_resolution'] != null) {
    $resolutionRow = getResolutionRow($screenData['active_resolution']);
}
?>

    <a class="btn btn-primary btn-lg btn-block" href="<?php echo getLocalFilePath('screen.php') ?>" target="_blank" role="button">Launch Screen</a>

<form id="screen-control-form" action="<?php echo getLocalFilePath('submit-screen.php')?>" method="post">

    <?php  echo '<input type="hidden" value="'.getCurrentURL().'" name="lastURL" />' ?>

    <hr>

    <?php require(getServerFilePath('active-screen-options.php')) ?>

    <hr>

    <?php

    if ($screenData['vote_result'] != null) {
        require(getServerFilePath('vote-result-options.php'));
    } else if ($screenData['active_resolution'] == null) {
        if ($screenData['voting']) {
            require(getServerFilePath('vote-open-resolution-options.php'));
        } else {
            require(getServerFilePath('open-resolution-options.php'));
        }
    } else if ($screenData['active_amendment'] == null) {
        if ($screenData['voting']) {
            require(getServerFilePath('vote-active-resolution-options.php'));
        } else {
            require(getServerFilePath('active-resolution-options.php'));
        }
    } else {
        if ($screenData['voting']) {
            require(getServerFilePath('vote-amendment-resolution-options.php'));
        } else {
            require(getServerFilePath('amendment-resolution-options.php'));
        }
    }

    ?>

    <hr>

    <?php require(getServerFilePath('temp-speakers-options.php')) ?>

    <hr>

    <?php require(getServerFilePath('speakers-list-limit-options.php')) ?>

    <hr>

    <?php require(getServerFilePath('paging-system-options.php')) ?>

    <hr>

    <?php require(getServerFilePath('message-options.php')) ?>





</form>



<?php
require(getServerFilePath('content-pane-end.php'));
require(getServerFilePath('footer.php'));
