<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: speakers-list-limit-options.php
 * Purpose:
 * Created: 12/02/19
 * Last Modified: 17/02/19
 */
?>

<h5>Speakers List Limit: (Currently <?php echo $screenData['speakers_list_limit']?>)</h5>
<div class="form-group">
    <input name="speakers-list-limit" type="number" min="3" class="form-control" id="speakers-list-limit" value="<?php echo $screenData['speakers_list_limit']?>">
    <button type="submit" name="speakers-list-limit-button" class="btn btn-secondary">Save</button>
    <h6><i>Note: This number includes the submitter, seconder, and negator</i></h6>
    <h6><i>Note: This number is for total speakers of a resolution, so if asked to change check how many have already spoken</i></h6>
</div>