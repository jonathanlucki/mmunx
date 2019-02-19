<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: active-resolution-options.php
 * Purpose:
 * Created: 15/02/19
 * Last Modified: 17/02/19
 */
$resolutionRow = getResolutionRow($screenData['active_resolution']);
?>

<h5>Active Resolution: <?php echo $screenData['active_resolution'] ?></h5>
<h5># of Amendments debated: <?php echo max(0,$resolutionRow['speakers']) ?></h5>

    <div class="btn-group" role="group">
<?php
if ($screenData['temp_speaker_1'] || $screenData['temp_speaker_2'] || $screenData['temp_speaker_3']) {
    echo 'Please clear current temporary speakers before continuing ';
} else {
    if ($resolutionRow['speakers'] < 3) {
        echo '<button type="submit" name="active-resolution-next-speaker-button" class="btn btn-secondary">Next speaker</button>';
    } else {
        echo '<button type="submit" name="active-resolution-open-amendment-button" class="btn btn-secondary">Open current amendment</button>';
        echo '<button type="submit" name="active-resolution-skip-amendment-button" class="btn btn-secondary">Skip current amendment</button>';
    }
}
?>
        <button type="submit" name="active-resolution-start-vote-button" class="btn btn-secondary">Vote on resolution</button>
    </div>
