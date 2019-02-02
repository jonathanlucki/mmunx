<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: resolutions-table.php
 * Purpose:
 * Created: 9/25/18
 * Last Modified: 01/02/19
 */
?>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Resolution</th>
        <th scope="col">Amendment Count</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach (getResolutionArray() as $resolutionRow) {
        echo '<tr>';
        echo '<td>';
        echo '<a href="'.getLocalFilePath('resolution-overview.php').'?num=' . $resolutionRow['num'] . '"> Resolution ' . $resolutionRow['num'] . ': ' . $resolutionRow['title'] . '</a>';
        echo '</td>';
        echo '<td>';
        echo getAmendmentCountByResolutionNum($resolutionRow['num']);
        echo '</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>