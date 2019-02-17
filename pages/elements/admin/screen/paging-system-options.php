<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: paging-system-options.php
 * Purpose:
 * Created: 11/02/19
 * Last Modified: 16/02/19
 */
?>

<h5>Paging System: <?php if ($screenData['paging_system_open']) { echo 'OPEN'; } else { echo 'CLOSED'; } ?></h5>
<div class="btn-group" role="group">
    <button type="submit" name="open-paging-system-button" class="btn btn-secondary">Open</button>
    <button type="submit" name="close-paging-system-button" class="btn btn-secondary">Close</button>
</div>