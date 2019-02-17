<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: active-screen-options.php
 * Purpose:
 * Created: 10/02/19
 * Last Modified: 12/02/19
 */
?>

<h5>Active Screen: <?php echo $screenData['active_screen'] ?></h5>
<div class="btn-group" role="group">
    <button type="submit" name="screen-title-button" class="btn btn-secondary">Title</button>
    <button type="submit" name="screen-conference-button" class="btn btn-secondary">Conference</button>
    <button type="submit" name="screen-message-button" class="btn btn-secondary">Message</button>
</div>
<h6><i>Please ensure message is saved before activating message screen</i></h6>