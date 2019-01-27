<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: delete-amendment.php
 * Purpose:
 * Created: 10/09/18
 * Last Modified: 26/01/19
 */

//Includes initialization file (init.php)
include_once('../../resources/init.php');

include(PATHS['header.php']);
include(PATHS['content-pane-start.php']);
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
include(PATHS['content-pane-end.php']);
include(PATHS['footer.php']);
