<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: delete-resolution.php
 * Purpose:
 * Created: 31/01/19
 * Last Modified: 31/01/19
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
            if(isset($_POST['deleteResolutionButton'])){
                if (deleteResolution($_POST['num'])) {
                    echo "Resolution deleted successfully";
                } else {
                    echo 'Error encountered deleting resolution';
                }
            }
            ?>
        </h3>

        <br>

        <a class="btn btn-outline-secondary" href="<?php echo getLocalFilePath('home.php')?>" role="button">Return to home</a>

        <br>

    </div>


<?php
require(getServerFilePath('content-pane-end.php'));
require(getServerFilePath('footer.php'));