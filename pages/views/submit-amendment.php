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

require(PATHS['header.php']);
require(PATHS['content-pane-start.php']);
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
require(PATHS['content-pane-end.php']);
require(PATHS['footer.php']);