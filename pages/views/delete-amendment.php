<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: delete-amendment.php
 * Purpose:
 * Created: 10/09/18
 * Last Modified: 26/01/19
 */

//Requires initialization file (init.php)
require_once($_SERVER['DOCUMENT_ROOT'].'/resources/init.php');

//redirect users
redirect('user');

require(getServerFilePath('header.php'));
require(getServerFilePath('content-pane-start.php'));
?>

    <div class="text-center">

        <h3>
        <?php
if(isset($_POST['deleteButton'])){
    $amendmentRow = getAmendmentRow($_SESSION['countryID'],$_POST['resolution']);
    if (deleteAmendmentByID($amendmentRow['amendment_id'])) {
        echo 'Amendment successfully deleted';
    } else {
        echo 'Error encountered deleting amendment';
    }
}
?>
        </h3>

        <br>

        <a class="btn btn-outline-secondary" href="<?php echo $_POST['lastURL']?>" role="button">Return to previous page</a>

        <br>

</div>


<?php
require(getServerFilePath('content-pane-end.php'));
require(getServerFilePath('footer.php'));
