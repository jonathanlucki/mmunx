<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: open-resolution-options.php
 * Purpose:
 * Created: 14/02/19
 * Last Modified: 14/02/19
 */
?>

<h5>Vote to open resolution:</h5>
<div class="form-group row">
    <label for="vote-open-resolution-num" class="col-md-3">Resolution Number</label>
    <select name="vote-open-resolution-num" class="form-control col-md-2" id="vote-open-resolution-num">
        <?php
        $resolutionCount = getResolutionCount();
        for ($i=1;$i<=$resolutionCount;$i++) {
            if (getResolutionRow($i)['status'] == 'pending')
            echo '<option value="'.$i.'">'.$i.'</option>';
        }
        ?>
    </select>
</div>

<button type="submit" name="vote-open-resolution-button" class="btn btn-secondary">Submit</button>