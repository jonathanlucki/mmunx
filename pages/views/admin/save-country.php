<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: save-country.php
 * Purpose:
 * Created: 01/02/19
 * Last Modified: 01/02/19
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
            if(isset($_POST['saveCountryChangesButton'])){
                if (updateCountryRow($_POST['countryID'],
                    $_POST['country-name'],
                    $_POST['access-code'],
                    $_POST['speaker-points'],
                    $_POST['order-num'],
                    $_POST['person-one-name'],
                    $_POST['person-one-email'],
                    $_POST['person-two-name'],
                    $_POST['person-two-email'],
                    $_POST['person-three-name'],
                    $_POST['person-three-email'],
                    $_POST['person-four-name'],
                    $_POST['person-four-email'])) {
                    echo "Country changes saved successfully";
                } else {
                    echo 'Error encountered saving country changes';
                }
            }
            ?>
        </h3>

        <br>

        <a class="btn btn-outline-secondary" href="<?php echo getLocalFilePath('country-overview.php').'?countryID='.$_POST['countryID'] ?>" role="button">Return to country overview</a>

        <br>

    </div>


<?php
require(getServerFilePath('content-pane-end.php'));
require(getServerFilePath('footer.php'));