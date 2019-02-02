<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: edit-resolution.php
 * Purpose:
 * Created: 02/02/19
 * Last Modified: 02/02/19
 */

//Requires initialization file (init.php)
require_once($_SERVER['DOCUMENT_ROOT'].'/resources/init.php');

//redirect users
redirect('admin');

require(getServerFilePath('header.php'));
require(getServerFilePath('content-pane-start.php'));

//Sets resolution row
$resolutionRow = getResolutionRow($_GET['num']);
?>




<form id="resolution-edit-form" action="<?php echo getLocalFilePath('save-resolution.php')?>" method="post">

    <input type="hidden" value="<?php echo $_GET['num'] ?>" name="original_num" />

    <div class="form-group row">
        <label for="title" class="col-md-2">Title</label>
        <input type="text" class="form-control col-md-10" id="title" name="title" value="<?php echo $resolutionRow['title']?>">
    </div>

    <div class="form-group row">
        <label for="num" class="col-md-2">Number</label>
        <input type="number" min="1" max="<?php echo getResolutionCount() ?>" class="form-control col-md-4" id="num" name="num" value="<?php echo $resolutionRow['num']?>">
        <label for="status" class="col-md-2">Status</label>
        <select name="status" class="form-control col-md-4" id="status">
            <option value="pending">Pending</option>
            <option value="active">Active</option>
            <option value="passed">Passed</option>
            <option value="failed">Failed</option>
            <option value="shelved">Shelved</option>
        </select>
    </div>

    <p><i>Switching the resolution number will swap the two existing resolutions</i></p>

    <hr>

    <a class="btn btn-secondary" href="<?php echo $_POST['lastURL']?>" role="button">Cancel</a>
    <button type="submit" name="saveResolutionChangesButton" class="btn btn-primary">Save Changes</button>

</form>


<?php
require(getServerFilePath('content-pane-end.php'));
require(getServerFilePath('footer.php'));