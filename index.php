<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: index.php
 * Purpose:
 * Created: 08/07/18
 * Last Modified: 16/09/18
 */

//Requires initialization file (init.php)
require_once($_SERVER['DOCUMENT_ROOT'].'/resources/init.php');

//redirect users
redirect('other');

//Requires login file (login.php)
require_once(PATHS['login.php']);

require(PATHS['header.php']);
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
require(PATHS['footer.php']);
