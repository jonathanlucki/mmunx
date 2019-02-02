<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: country-table.php
 * Purpose:
 * Created: 9/25/18
 * Last Modified: 01/02/19
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
    foreach (getCountryArray() as $countryRow) {
        echo '<tr>';
        echo '<td>';
        echo '<a href="' . getLocalFilePath('country-overview.php') . '?countryID=' . $countryRow['id'] . '"> ' . $countryRow['name'] . '</a>';
        echo '</td>';
        echo '<td>';
        echo getAmendmentCountByCountryID($countryRow['id']);
        echo '</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
