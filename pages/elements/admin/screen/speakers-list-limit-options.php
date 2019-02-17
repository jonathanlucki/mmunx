<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: speakers-list-limit-options.php
 * Purpose:
 * Created: 12/02/19
 * Last Modified: 12/02/19
 */
?>

<h5>Speakers List Limit: (Currently <?php echo $screenData['speakers_list_limit']?>)</h5>
<div class="form-group">
    <input name="speakers-list-limit" type="number" class="form-control" id="speakers-list-limit" value="<?php echo $screenData['speakers_list_limit']?>">
    <button type="submit" name="speakers-list-limit-button" class="btn btn-secondary">Save</button>
</div>
