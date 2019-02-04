<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: review.php
 * Purpose:
 * Created: 03/02/19
 * Last Modified: 03/02/19
 */

//Requires initialization file (init.php)
require_once($_SERVER['DOCUMENT_ROOT'].'/resources/init.php');

//redirect users
redirect('admin');

require(getServerFilePath('header.php'));
require(getServerFilePath('content-pane-start.php'));

$amendmentRow = getNextPendingAmendmentRow();

echo '<h3>Amendment Review</h3>';

echo '<hr>';

if ($amendmentRow != null) {

    echo '<h3>Resolution '.$amendmentRow['resolution'].': '.getResolutionRow($amendmentRow['resolution'])['title'].'</h3>';

    echoAmendmentText($amendmentRow['amendment_id']);

    echo '<hr>';

    echo '<form id="edit-country" action="'.getLocalFilePath('submit-review.php').'" method="post">';
    echo '<input type="hidden" value="'.$amendmentRow['amendment_id'].'" name="amendmentID" />';
    echo '<input type="hidden" value="'.getCurrentURL().'" name="lastURL" />';
    echo '<button type="submit" name="denyAmendment" class="btn btn-danger">Deny Amendment</button>';
    echo '<button type="submit" name="approveAmendment" class="btn btn-success">Approve Amendment</button>';
    echo '</form>';

} else {

echo '<h5>No pending amendments!</h5>';

}


require(getServerFilePath('content-pane-end.php'));
require(getServerFilePath('footer.php'));