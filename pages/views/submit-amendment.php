<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: delete-amendment.php
 * Purpose:
 * Created: 10/09/18
 * Last Modified: 01/02/18
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
            if(isset($_POST['submitButton'])){
                if (getResolutionRow($_POST['resolution'])['status'] == 'pending') {
                    if (insertAmendment($_POST['countryID'], $_POST['resolution'], $_POST['type'], $_POST['clause'], strip_tags($_POST['details']))) {
                        echo 'Amendment successfully created';
                    } else {
                        echo 'Error encountered creating amendment';
                    }
                } else {
                    echo "Error: Submissions have closed for this resolution";
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