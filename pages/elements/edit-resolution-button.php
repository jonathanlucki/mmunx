<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: edit-resolution-button.php
 * Purpose:
 * Created: 29/01/19
 * Last Modified: 29/01/19
 */
?>

<form id="edit-resolution" action="<?php echo getLocalFilePath('edit-resolution.php')?>" method="post">
    <input type="hidden" value="<?php echo getCurrentURL() ?>" name="lastURL" />
    <button type="submit" name="editResolutionButton" class="btn btn-warning">Edit Resolution</button>
</form>
