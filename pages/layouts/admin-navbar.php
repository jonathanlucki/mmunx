<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: admin-navbar.php
 * Purpose:
 * Created: 24/01/19
 * Last Modified: 26/01/19
 */

//redirect if not logged in
redirect(true);

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
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="resolutions.php">Resolutions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="countries.php">Countries</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <span class="navbar-text" style="margin-right:5px;">Logged in as: ADMIN</span>
            <form id="logout" action="" method="post">
                <button type="submit" class="btn btn-outline-danger" name="logoutButton">Log out</button>
            </form>
        </ul>

    </div>

</nav>

<div class="container" id="content-container">
