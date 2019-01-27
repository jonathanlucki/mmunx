<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: index.php
 * Purpose:
 * Created: 08/07/18
 * Last Modified: 16/09/18
 */

//Includes initialization file (init.php)
include_once('resources/init.php');

//Includes login file (login.php)
include_once(PATHS['login.php']);

include(PATHS['header.php']);
?>

<div class="container" id="login-container">

    <div class="text-center">

    <h1 class="display-2">MMUNx</h1>
    <p>Please enter your access code</p>

    <form id="login" action="" method="post">

        <div class="form-group">
            <small id="loginError" class="form-text text-danger"><?php echo $error;?></small>
            <input type="password" class="form-control" id="accessCodeInput" placeholder="Access Code" name="accessCode">
            <small id="accessCodeHelp" class="form-text text-muted">Please see Tech Desk if you forgot your access code</small>
        </div>

        <button type="submit" name="loginButton" class="btn btn-dark btn-lg">Log in</button>

    </form>

    <br>
        <small><a href="http://www.jonathanlucki.ca">Created by Jonathan Lucki</a></small>

    </div>

</div>

<?php
include(PATHS['footer.php']);
