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

        <div class="h-100 col-4 pt-3 pr-2 pb-2 pl-3 screen-pane" id="speakers-list"></div>

        <div class="h-100 col-8 align-middle pt-3 pr-3 pb-2 pl-2 screen-pane">
            <div id="main-view" style="width: 100%;height: 100%;display: flex;"></div>
        </div>

    </div>

    <div class="row" style="height: 15%;">

        <div class="h-100 col-4 align-middle pt-2 pr-2 pb-3 pl-3 screen-pane">
            <div style="width: 100%;height: 100%;display: flex;">
                <div style="display: block; margin: auto; text-align: left; word-wrap: break-word;">
                    <h2>Time: <span id="clock">00:00</span></h2>
                </div>
            </div>
        </div>

        <div class="h-100 col-8 align-middle pt-2 pr-3 pb-3 pl-2 screen-pane">
            <div id="paging-system" style="width: 100%;height: 100%;display: flex;"></div>
        </div>

    </div>

    <script>
        setInterval(function () {
            ajaxScreen('<?php echo getLocalFilePath('get-main-view.php') ?>','main-view');
            ajaxScreen('<?php echo getLocalFilePath('get-speakers-list.php') ?>','speakers-list');
            ajaxScreen('<?php echo getLocalFilePath('get-paging-system.php') ?>','paging-system');
        }, 1000)
        setInterval(function () {
            getClock('clock');
        }, 10000)
    </script>

<?php
require(getServerFilePath('footer.php'));