<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: temp-speakers-options.php
 * Purpose:
 * Created: 14/02/19
 * Last Modified: 14/02/19
 */
?>

<h5>Temporary speakers:</h5>
<div class="form-group row">
    <label for="temp-speaker-1" class="col-md-2">Speaker #1</label>
    <select name="temp-speaker-1" class="form-control col-md-2" id="temp-speaker-1">
        <option value="null">NULL</option>
        <?php
        foreach (getCountryArray() as $countryRow) {
            if ($countryRow['id'] == $screenData['temp_speaker_1']) {
                echo '<option selected value="'.$countryRow['id'].'">'.$countryRow['name'].'</option>';
            } else {
                echo '<option value="'.$countryRow['id'].'">'.$countryRow['name'].'</option>';
            }
        }
        ?>
    </select>
    <label for="temp-speaker-2" class="col-md-2">Speaker #2</label>
    <select name="temp-speaker-2" class="form-control col-md-2" id="temp-speaker-2">
        <option value="null">NULL</option>
        <?php
        foreach (getCountryArray() as $countryRow) {
            if ($countryRow['id'] == $screenData['temp_speaker_2']) {
                echo '<option selected value="'.$countryRow['id'].'">'.$countryRow['name'].'</option>';
            } else {
                echo '<option value="'.$countryRow['id'].'">'.$countryRow['name'].'</option>';
            }
        }
        ?>
    </select>
    <label for="temp-speaker-3" class="col-md-2">Speaker #3</label>
    <select name="temp-speaker-3" class="form-control col-md-2" id="temp-speaker-3">
        <option value="null">NULL</option>
        <?php
        foreach (getCountryArray() as $countryRow) {
            if ($countryRow['id'] == $screenData['temp_speaker_3']) {
                echo '<option selected value="'.$countryRow['id'].'">'.$countryRow['name'].'</option>';
            } else {
                echo '<option value="'.$countryRow['id'].'">'.$countryRow['name'].'</option>';
            }
        }
        ?>
    </select>
</div>
<button type="submit" name="temp-speakers-button" class="btn btn-secondary">Save</button>
