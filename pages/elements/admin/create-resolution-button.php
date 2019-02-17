<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: create-resolution-button.php
 * Purpose:
 * Created: 29/01/19
 * Last Modified: 29/01/19
 */
?>

<form id="create-resolution" action="<?php echo getLocalFilePath('create-resolution.php')?>" method="post">
    <input type="hidden" value="<?php echo getCurrentURL() ?>" name="lastURL" />
    <button type="submit" name="createResolutionButton" class="btn btn-success">+ Create New Resolution</button>
</form>