<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: vote-amendment-resolution-options.php
 * Purpose:
 * Created: 16/02/19
 * Last Modified: 16/02/19
 */
?>

<h5>Voting on amendment ID <?php echo $screenData['voting'] ?></h5>
<div class="btn-group" role="group">
    <button type="submit" name="pass-vote-amendment-resolution-button" class="btn btn-secondary">Vote Passes</button>
    <button type="submit" name="fail-vote-amendment-resolution-button" class="btn btn-secondary">Vote Fails</button>
    <button type="submit" name="cancel-vote-amendment-resolution-button" class="btn btn-secondary">Cancel Vote</button>
</div>