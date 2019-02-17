<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: edit-country-button.php
 * Purpose:
 * Created: 29/01/19
 * Last Modified: 31/01/19
 */
?>

<form id="edit-country" action="<?php echo getLocalFilePath('edit-country.php')."?countryID=".$_GET['countryID']?>" method="post">
    <input type="hidden" value="<?php echo getCurrentURL() ?>" name="lastURL" />
    <button type="submit" name="editCountryButton" class="btn btn-warning">Edit Country</button>
</form>
