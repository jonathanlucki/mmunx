<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: edit-resolution.php
 * Purpose:
 * Created: 02/02/19
 * Last Modified: 05/02/19
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

    <h3>Edit Resolution</h3>

    <hr>

<form id="resolution-edit-form" action="<?php echo getLocalFilePath('save-resolution.php')?>" method="post" enctype="multipart/form-data">

    <input type="hidden" value="<?php echo $_GET['num'] ?>" name="original_num" />

    <div class="form-group row">
        <label for="title" class="col-md-2">Title</label>
        <input type="text" class="form-control col-md-10" id="title" name="title" value="<?php echo $resolutionRow['title']?>">
    </div>

    <div class="form-group row">
        <label for="num" class="col-md-2">Number</label>
        <select name="num" class="form-control col-md-2" id="num">
            <?php 
            $resolutionCount = getResolutionCount();
            for ($i=1;$i<=$resolutionCount;$i++) {
                if ($i == $resolutionRow['num']) {
                    echo '<option selected value="'.$i.'">'.$i.'</option>';
                } else {
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
            }
            ?>
        </select>
        
        <label for="status" class="col-md-2">Status</label>
        <select name="status" class="form-control col-md-2" id="status">
            <option <?php if ($resolutionRow['status'] == 'pending') { echo 'selected';} ?> value="pending">Pending</option>
            <option <?php if ($resolutionRow['status'] == 'in_session') { echo 'selected';} ?> value="in_session">In Session</option>
            <option <?php if ($resolutionRow['status'] == 'passed') { echo 'selected';} ?> value="passed">Passed</option>
            <option <?php if ($resolutionRow['status'] == 'failed') { echo 'selected';} ?> value="failed">Failed</option>
            <option <?php if ($resolutionRow['status'] == 'shelved') { echo 'selected';} ?> value="shelved">Shelved</option>
        </select>
        <label for="clauses" class="col-md-2">Clauses</label>
        <input type="number" min="1" class="form-control col-md-2" id="clauses" name="clauses" value="<?php echo $resolutionRow['clauses']?>">
    </div>

    <p><i>Switching the resolution number will swap the two existing resolutions</i></p>

    <hr>

    <div class="form-group row">
        <label for="submitter" class="col-md-2">Submitter</label>
        <select name="submitter" class="form-control col-md-2" id="submitter">
            <?php
            foreach (getCountryArray() as $countryRow) {
                if ($countryRow['id'] == $resolutionRow['submitter']) {
                    echo '<option selected value="'.$countryRow['id'].'">'.$countryRow['name'].'</option>';
                } else {
                    echo '<option value="'.$countryRow['id'].'">'.$countryRow['name'].'</option>';
                }
            }
            ?>
        </select>
        <label for="seconder" class="col-md-2">Seconder</label>
        <select name="seconder" class="form-control col-md-2" id="seconder">
            <?php
            foreach (getCountryArray() as $countryRow) {
                if ($countryRow['id'] == $resolutionRow['seconder']) {
                    echo '<option selected value="'.$countryRow['id'].'">'.$countryRow['name'].'</option>';
                } else {
                    echo '<option value="'.$countryRow['id'].'">'.$countryRow['name'].'</option>';
                }
            }
            ?>
        </select>
        <label for="negator" class="col-md-2">Negator</label>
        <select name="negator" class="form-control col-md-2" id="negator">
            <?php
            foreach (getCountryArray() as $countryRow) {
                if ($countryRow['id'] == $resolutionRow['negator']) {
                    echo '<option selected value="'.$countryRow['id'].'">'.$countryRow['name'].'</option>';
                } else {
                    echo '<option value="'.$countryRow['id'].'">'.$countryRow['name'].'</option>';
                }
            }
            ?>
        </select>
    </div>

    <hr>

    <div class="form-group row">
        <label for="pdfUpload">Resolution PDF upload</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
        <input type="file" name="pdfUpload" id="pdfUpload" class="form-control col-md-12" accept=".pdf"/>
    </div>

    <div class="form-check">
        <input type="checkbox" name="pdfDelete" class="form-check-input" id="pdfDelete">
        <label class="form-check-label" for="pdfDelete">Check to delete currently stored PDF file</label>
    </div>

    <hr>

    <a class="btn btn-secondary" href="<?php echo $_POST['lastURL']?>" role="button">Cancel</a>
    <button type="submit" name="saveResolutionChangesButton" class="btn btn-primary">Save Changes</button>

</form>


<?php
require(getServerFilePath('content-pane-end.php'));
require(getServerFilePath('footer.php'));