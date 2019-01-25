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
        <th scope="col">Amendment Count</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($rowNum=1; $rowNum <= getResolutionCount(); $rowNum++) {
        echo '<tr>';
        echo '<td>';
        echo '<a href="resolution-overview.php?num=' . $rowNum . '"> Resolution ' . $rowNum . ': ' . getResolutionRow($rowNum)['title'] . '</a>';
        echo '</td>';
        echo '<td>';
        echo getAmendmentCountByResolutionNum($rowNum);
        echo '</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>