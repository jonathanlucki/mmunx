<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: content-pane-start.php
 * Purpose:
 * Created: 24/01/19
 * Last Modified: 26/01/19
 */

//redirect if not logged in
redirect(false);

//Includes logout file (logout.php)
include('../../resources/logout.php');

function echoNavBarItem($href,$text) {
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="'.$href.'">'.$text.'</a>';
    echo '</li>';
}

function echoSessionUsername() {
    if ($_SESSION['loggedIn']) {
        if ($_SESSION['admin']) {
            echo 'ADMIN';
        } else {
            echo getCountryRow($_SESSION['countryID'])['name'];
        }
    }
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
            echoNavBarItem("index.php","Home");
            echoNavBarItem("resolutions.php","Resolutions");
            echoNavBarItem("countries.php","Countries");
            if (!$_SESSION['admin']) {
                echoNavBarItem('country-overview.php?countryID='.$_SESSION['countryID'],"Country Overview");
            }
            ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <span class="navbar-text" style="margin-right:5px;">Logged in as: <?php echoSessionUsername()?></span>
            <form id="logout" action="" method="post">
                <button type="submit" class="btn btn-outline-danger" name="logoutButton">Log out</button>
            </form>
        </ul>

    </div>

</nav>

<div class="container" id="content-container">
