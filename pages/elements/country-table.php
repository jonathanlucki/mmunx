<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: country-table.php
 * Purpose:
 * Created: 9/25/18
 * Last Modified: 9/25/18
 */
?>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Country Name</th>
        <th scope="col">Amendment Count</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($rowNum=1; $rowNum <= getCountryCount(); $rowNum++) {
        echo '<tr>';
        echo '<td>';
        echo '<a href="' . getLocalFilePath('country-overview.php') . '?countryID=' . $rowNum . '"> ' . getCountryRow($rowNum)['name'] . '</a>';
        echo '</td>';
        echo '<td>';
        echo getAmendmentCountByCountryID($rowNum);
        echo '</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
