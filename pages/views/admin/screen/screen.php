<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: screen.php
 * Purpose:
 * Created: 17/02/19
 * Last Modified: 17/02/19
 */

//Requires initialization file (init.php)
require_once($_SERVER['DOCUMENT_ROOT'].'/resources/init.php');

//sets screen true
$screen = true;

require(getServerFilePath('header.php'));
?>

    <div class="row" style="height: 85%;">

        <div class="h-100 col-3 text-center align-middle screen-pane" id="speakers-list"></div>

        <div class="h-100 col-9 align-middle screen-pane">
            <div id="main-view" style="width: 100%;height: 100%;display: flex;"></div>
        </div>

    </div>

    <div class="row" style="height: 15%;">

        <div class="h-100 col-3 text-center align-middle screen-pane" id="timer"></div>

        <div class="h-100 col-9 text-center align-middle screen-pane" id="paging-system"></div>

    </div>

    <script>
        setInterval(function () {
            ajaxScreen('<?php echo getLocalFilePath('get-main-view.php') ?>','main-view');
            ajaxScreen('<?php echo getLocalFilePath('get-speakers-list.php') ?>','speakers-list');
            ajaxScreen('<?php echo getLocalFilePath('get-paging-system.php') ?>','paging-system');
        }, 1000)
    </script>

<?php
require(getServerFilePath('footer.php'));