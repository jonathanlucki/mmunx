<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: message-options.php
 * Purpose:
 * Created: 10/02/19
 * Last Modified: 10/02/19
 */
?>

 <h5>Message: </h5>
    <div class="form-group">
        <textarea name="message" class="form-control" id="message" rows="3" maxlength="600" aria-describedby="messageMaxLength">
            <?php echo $screenData['message'] ?>
        </textarea>
        <small id="messageMaxLength" class="form-text">Max characters: 600</small>
        <button type="submit" name="message-button" class="btn btn-secondary">Save</button>
    </div>