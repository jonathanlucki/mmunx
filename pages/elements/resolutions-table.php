<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: resolutions-table.php
 * Purpose:
 * Created: 9/25/18
 * Last Modified: 9/25/18
 */
?>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Resolution</th>
        <th scope="col">Status</th>
        <th scope="col">Amendment Count</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($rowNum=1; $rowNum <= getResolutionCount(); $rowNum++) {
        $resolutionRow = getResolutionRow($rowNum);
        echo '<tr>';
        echo '<td>';
        echo '<a href="'.getLocalFilePath('resolution-overview.php').'?num=' . $rowNum . '"> Resolution ' . $rowNum . ': ' . $resolutionRow['title'] . '</a>';
        echo '</td>';
        echo '<td>';
        echo convertResolutionStatus($resolutionRow['status']);
        echo '</td>';
        echo '<td>';
        echo getAmendmentCountByResolutionNum($rowNum);
        echo '</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>