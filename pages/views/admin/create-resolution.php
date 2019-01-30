<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: create-resolution.php
 * Purpose:
 * Created: 30/01/19
 * Last Modified: 30/01/19
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
            if(isset($_POST['createResolutionButton'])){
                $newResolutionNum = insertNewResolution();
                if ($newResolutionNum) {
                    echo getResolutionRow($newResolutionNum)['title']." created successfully";
                } else {
                    echo 'Error encountered creating resolution';
                }
            }
            ?>
        </h3>

        <br>

        <?php
        if ($newResolutionNum) {
            echo '<a class="btn btn-outline-secondary" href="'.getLocalFilePath('edit-resolution.php').'?num='.$newResolutionNum.'" role="button">Edit Resolution</a>';
        }
        ?>

        <a class="btn btn-outline-secondary" href="<?php echo $_POST['lastURL']?>" role="button">Return to previous page</a>

        <br>

    </div>


<?php
require(getServerFilePath('content-pane-end.php'));
require(getServerFilePath('footer.php'));