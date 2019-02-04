<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: submit-review.php
 * Purpose:
 * Created: 04/02/19
 * Last Modified: 04/02/19
 */

//Requires initialization file (init.php)
require_once($_SERVER['DOCUMENT_ROOT'].'/resources/init.php');

//redirect users
redirect('admin');

require(getServerFilePath('header.php'));
require(getServerFilePath('content-pane-start.php'));
?>

    <div class="text-center">

        <h3>
            <?php
            if(isset($_POST['approveAmendment'])){
                if (updateAmendmentStatus($_POST['amendmentID'],'approved')) {
                    echo "Amendment Approved";
                } else {
                    echo 'Error encountered saving amendment approval';
                }
            } else if ($_POST['denyAmendment']) {
                if (updateAmendmentStatus($_POST['amendmentID'],'denied')) {
                    echo "Amendment Denied";
                } else {
                    echo "Error encountered saving amendment denial";
                }
            } else {
                echo "Error encountered: No button press posted";
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
