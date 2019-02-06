<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: get-resolution-pdf-button.php
 * Purpose:
 * Created: 05/02/19
 * Last Modified: 05/02/19
 */
?>

<form id="get-resolution-pdf" action="<?php echo getLocalFilePath('get-resolution-pdf.php') ?>" method="post">
    <input type="hidden" value="<?php echo $_GET['num'] ?>" name="num" />
    <button type="submit" name="getResolutionPDFButton" class="btn btn-outline-secondary">Download PDF</button>
</form>