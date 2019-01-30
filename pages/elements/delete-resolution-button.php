<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: delete-resolution-button.php
 * Purpose:
 * Created: 29/01/19
 * Last Modified: 29/01/19
 */
?>

<form id="delete-country" action="<?php echo getLocalFilePath('delete-resolution.php')?>" method="post">
    <input type="hidden" value="<?php echo getCurrentURL() ?>" name="lastURL" />
    <input type="hidden" value="<?php echo $_GET['num'] ?>" name="num" />
    <button type="submit" name="deleteResolutionButton" class="btn btn-danger">Delete Resolution</button>
</form>