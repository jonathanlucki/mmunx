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
    <input name="speakers-list-limit" type="number" min="1" class="form-control" id="speakers-list-limit" value="<?php echo $screenData['speakers_list_limit']?>">
    <button type="submit" name="speakers-list-limit-button" class="btn btn-secondary">Save</button>
    <a data-toggle="collapse" href="#speakers-list-limit-collapse" aria-expanded="false" aria-controls="speakers-list-limit-collapse">
        Toggle more information
    </a>
    <div class="collapse" id="speakers-list-limit-collapse">
        <div class="card card-body">
            <h6>More Information on the Speakers List Limit Field</h6>
            <ul>
             <li><i>This field is for a limit on amendment speakers - it is not a way to specify that there should be x number of speakers always on the screen.</i></li>
              <li><i>Instead it is a way to limit the number of speakers that can speak on a resolution, so if the value is x, only x amendments will appear on the speakers list and as amendments are debated the speakers list will shrink until x amendments have been debated, after which the list will be empty.</i></li>
              <li><i>This number does not includes the submitter, seconder, and negator - it is for # of total amendments we should limit to for a resolution.</i></li>
              <li><i>As this is for total # of amendments, if asked to change check how many amendments have already been debated (ie. if the remaining speakers should be limited to x speakers, this value should be x + # of amendments already debated, the latter of which can be found above). </i></li>
              <li><i>This should only be used if the chair orders a limit be put on the speakers list. If no limit has been ordered please leave as a large number such as 30 - the speakers list will automatically limit itself in size on the screen to not be too big, then replenish itself until it is out of amendments.</i></li>
           </ul>
        </div>
    </div>
</div>