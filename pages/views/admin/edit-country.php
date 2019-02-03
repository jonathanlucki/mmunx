<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: edit-country.php
 * Purpose:
 * Created: 31/01/19
 * Last Modified: 01/02/19
 */

//Requires initialization file (init.php)
require_once($_SERVER['DOCUMENT_ROOT'].'/resources/init.php');

//redirect users
redirect('admin');

require(getServerFilePath('header.php'));
require(getServerFilePath('content-pane-start.php'));

//Sets country row
$countryRow = getCountryRow($_GET['countryID']);
?>

<h3>Edit Country</h3>

<hr>

<form id="country-edit-form" action="<?php echo getLocalFilePath('save-country.php')?>" method="post">

    <input type="hidden" value="<?php echo $_GET['countryID'] ?>" name="countryID" />

    <div class="form-group row">
        <label for="country-name">Country Name</label>
        <input type="text" class="form-control" id="country-name" name="country-name" value="<?php echo $countryRow['name']?>">
    </div>

    <hr>

    <div class="form-group row">
        <label for="access-code" class="col-md-2">Access Code</label>
        <input type="text" class="form-control col-md-2" id="access-code" name="access-code" value="<?php echo $countryRow['code']?>">
        <label for="speaker-points" class="col-md-2">Speaker Points</label>
        <input type="number" min="0" max="1000" class="form-control col-md-2" id="speaker-points" name="speaker-points" value="<?php echo $countryRow['points']?>">
        <label for="order-num" class="col-md-2">Order Number</label>
        <input type="number" min="1" max="1000" class="form-control col-md-2" id="order-num" name="order-num" value="<?php echo $countryRow['order_num']?>">
    </div>

    <hr>

    <div class="form-group row">
        <label for="person-one-name" class="col-md-2">Delegate 1 Name</label>
        <input type="text" class="form-control col-md-4" id="person-one-name" name="person-one-name" value="<?php echo $countryRow['person1']?>">
        <label for="person-one-email" class="col-md-2">Delegate 1 Email</label>
        <input type="email" class="form-control col-md-4" id="person-one-email" name="person-one-email" value="<?php echo $countryRow['email1']?>">
    </div>

    <div class="form-group row">
        <label for="person-two-name" class="col-md-2">Delegate 2 Name</label>
        <input type="text" class="form-control col-md-4" id="person-two-name" name="person-two-name" value="<?php echo $countryRow['person2']?>">
        <label for="person-two-email" class="col-md-2">Delegate 2 Email</label>
        <input type="email" class="form-control col-md-4" id="person-two-email" name="person-two-email" value="<?php echo $countryRow['email2']?>">
    </div>

    <div class="form-group row">
        <label for="person-three-name" class="col-md-2">Delegate 3 Name</label>
        <input type="text" class="form-control col-md-4" id="person-three-name" name="person-three-name" value="<?php echo $countryRow['person3']?>">
        <label for="person-three-email" class="col-md-2">Delegate 3 Email</label>
        <input type="email" class="form-control col-md-4" id="person-three-email" name="person-three-email" value="<?php echo $countryRow['email3']?>">
    </div>

    <div class="form-group row">
        <label for="person-four-name" class="col-md-2">Delegate 4 Name</label>
        <input type="text" class="form-control col-md-4" id="person-four-name" name="person-four-name" value="<?php echo $countryRow['person4']?>">
        <label for="person-four-email" class="col-md-2">Delegate 4 Email</label>
        <input type="email" class="form-control col-md-4" id="person-four-email" name="person-four-email" value="<?php echo $countryRow['email4']?>">
    </div>

    <p><i>If less than 4 delegates, leave one or more delegate fields blank.</i></p>

    <hr>

    <a class="btn btn-secondary" href="<?php echo $_POST['lastURL']?>" role="button">Cancel</a>
    <button type="submit" name="saveCountryChangesButton" class="btn btn-primary">Save Changes</button>

</form>


<?php
require(getServerFilePath('content-pane-end.php'));
require(getServerFilePath('footer.php'));