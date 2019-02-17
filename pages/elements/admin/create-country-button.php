<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: create-country-button.php
 * Purpose:
 * Created: 28/01/19
 * Last Modified: 29/01/19
 */
?>

<form id="create-country" action="<?php echo getLocalFilePath('create-country.php')?>" method="post">
    <input type="hidden" value="<?php echo getCurrentURL() ?>" name="lastURL" />
    <button type="submit" name="createCountryButton" class="btn btn-success">+ Create New Country</button>
</form>