<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: save-resolution.php
 * Purpose:
 * Created: 02/02/19
 * Last Modified: 02/02/19
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
            if(isset($_POST['saveResolutionChangesButton'])){
                if (updateResolutionRow($_POST['original_num'],
                    $_POST['num'],
                    $_POST['title'],
                    $_POST['status'],
                    $_POST['clauses'],
                    $_POST['submitter'],
                    $_POST['seconder'],
                    $_POST['negator'])) {
                    echo "Resolution changes saved successfully";
                } else {
                    echo 'Error encountered saving resolution changes';
                }
                if (isset($_POST['pdfDelete'])) {
                    if (!insertResolutionPDF($_POST['num'],"")) {
                        echo "Error encountered deleting active PDF";
                    }
                }
                if (isset($_FILES['pdfUpload']['tmp_name'])) {
                    if (($_FILES['pdfUpload']['size'] <= 1000000) && ($_FILES['pdfUpload']['type'] == "application/pdf")) {
                        if (!insertResolutionPDF($_POST['num'], file_get_contents($_FILES['pdfUpload']['tmp_name']))) {
                            echo "Error encountered uploaded PDF";
                        }
                    } else {
                        echo " PDF file either too large or not pdf - If not uploading a PDF please ignore";
                    }
                }
            }
            ?>
        </h3>

        <br>

        <a class="btn btn-outline-secondary" href="<?php echo getLocalFilePath('resolution-overview.php').'?num='.$_POST['num'] ?>" role="button">Return to resolution overview</a>

        <br>

    </div>


<?php
require(getServerFilePath('content-pane-end.php'));
require(getServerFilePath('footer.php'));