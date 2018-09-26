<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: delegates-table.php
 * Purpose:
 * Created: 9/18/18
 * Last Modified: 9/18/18
 */


/**
 * Echos a table row containing delegate information
 * @param string  $delegateName  Name of delegate
 * @param string  $delegateEmail  Email of delegate
 * @param string  $countryID  Country ID of delegate country
 */
function echoDelegateRow($delegateName,$delegateEmail,$countryID) {
if($delegateName != null) {
    echo '<tr>';
    echo '<td>' . $delegateName . '</td>';
    if (($countryID == $_SESSION['countryID']) or $_SESSION['admin']) {
        echo '<td>' . $delegateEmail . '</td>';
    }
    echo '</tr>';
}
return;
}
?>

<p class="lead">Delegates:</p>
<table class="table">
    <tbody>
    <?php
        echoDelegateRow($countryRow['person1'], $countryRow['email1'], $countryRow['id']);
        echoDelegateRow($countryRow['person2'], $countryRow['email2'], $countryRow['id']);
        echoDelegateRow($countryRow['person3'], $countryRow['email3'], $countryRow['id']);
        echoDelegateRow($countryRow['person4'], $countryRow['email4'], $countryRow['id']);
    ?>
</table>
