<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: delete-amendment.php
 * Purpose:
 * Created: 10/09/18
 * Last Modified: 24/01/19
 */

//Includes initialization file (init.php)
include_once('../../resources/init.php');

include('../layouts/header.php');
include('../layouts/delegation-navbar.php');
?>

    <div class="text-center">

        <h3>
            <?php
            if(isset($_POST['submitButton'])){
                if (insertAmendment($_SESSION['countryID'],$_POST['resolution'],$_POST['type'],$_POST['clause'],$_POST['details'])) {
                    echo 'Amendment successfully created';
                } else {
                    echo 'Error encountered creating amendment';
                }
            }
            ?>
        </h3>

        <br>

        <a class="btn btn-outline-secondary" href="<?php echo $_POST['lastURL']?>" role="button">Return to previous page</a>

        <br>

    </div>


<?php
include('../layouts/footer.php');