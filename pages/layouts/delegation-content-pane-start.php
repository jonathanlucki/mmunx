<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: delegation-content-pane-start.php
 * Purpose:
 * Created: 9/15/18
 * Last Modified: 9/15/18
 */

//Includes redirect file (redirect.php)
include_once('../../resources/redirect.php');

?>

<div class="container" id="content-pane">

    <nav class="navbar navbar-expand-md navbar-fixed-top navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/pages/delegation/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pages/delegation/resolutions.php">Resolutions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pages/delegation/countries.php">Countries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo '/pages/delegation/overview.php?countryID='.$_SESSION['countryID']?>">Country Overview</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <span class="navbar-text" style="margin-right:5px;">Logged in as: <?php echo getCountryRow($_SESSION['countryID'])['name']?></span>
                <button class="btn btn-outline-danger" type="button">Log out</button>
            </ul>

        </div>

    </nav>

    <div class="container" id="content-container">
