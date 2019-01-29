<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: delete-country-button.php
 * Purpose:
 * Created: 29/01/19
 * Last Modified: 29/01/19
 */
?>

<form id="delete-country" action="<?php echo getLocalFilePath('delete-country.php')?>" method="post">
    <input type="hidden" value="<?php echo getCurrentURL() ?>" name="lastURL" />
    <input type="hidden" value="<?php echo $_GET['countryID'] ?>" name="countryID" />
    <button type="submit" name="deleteCountryButton" class="btn btn-danger">Delete Country</button>
</form>