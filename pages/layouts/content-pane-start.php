<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: content-pane-start.php
 * Purpose:
 * Created: 24/01/19
 * Last Modified: 04/02/19
 */

//Requires logout file (logout.php)
require(getServerFilePath('logout.php'));

function echoNavBarItem($href,$text,$notifications) {
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="'.$href.'">'.$text;
    if ($notifications > 0) {
        echo ' <span class="badge badge-danger">'.$notifications.'</span>';
    }
    echo '</a>';
    echo '</li>';
}

?>

<div class="container" id="content-pane">

<nav class="navbar navbar-expand-md navbar-fixed-top navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
            echoNavBarItem(getLocalFilePath('home.php'),"Home",0);
            echoNavBarItem(getLocalFilePath('resolutions.php'),"Resolutions",0);
            echoNavBarItem(getLocalFilePath('countries.php'),"Countries",0);
            if ($_SESSION['admin']) {
                echoNavBarItem(getLocalFilePath('review.php'),"Review",getPendingAmendmentsCount());
            } else {
                echoNavBarItem(getLocalFilePath('country-overview.php')."?countryID=".$_SESSION['countryID'],"Country Overview",0);
            }
            ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <span class="navbar-text" style="margin-right:5px;">Logged in as: <?php echo getSessionUsername()?></span>
            <form id="logout" action="" method="post">
                <button type="submit" class="btn btn-outline-danger" name="logoutButton">Log out</button>
            </form>
        </ul>

    </div>

</nav>

<div class="container" id="content-container">
