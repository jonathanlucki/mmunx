<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: content-pane-start.php
 * Purpose:
 * Created: 9/15/18
 * Last Modified: 9/15/18
 */

//redirect if not logged in
redirect(false);

//Includes logout file (logout.php)
include('../../resources/logout.php');

?>

<div class="container" id="content-pane">

    <nav class="navbar navbar-expand-md navbar-fixed-top navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/pages/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pages/resolutions.php">Resolutions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pages/countries.php">Countries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo '/pages/delegation/overview.php?countryID='.$_SESSION['countryID']?>">Country Overview</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <span class="navbar-text" style="margin-right:5px;">Logged in as: <?php echo getCountryRow($_SESSION['countryID'])['name']?></span>
                <form id="logout" action="" method="post">
                <button type="submit" class="btn btn-outline-danger" name="logoutButton">Log out</button>
                </form>
            </ul>

        </div>

    </nav>

    <div class="container" id="content-container">
