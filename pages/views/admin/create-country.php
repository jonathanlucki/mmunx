<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: create-country.php
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
            if(isset($_POST['createCountryButton'])){
                $newCountryID = insertNewCountry();
                if ($newCountryID) {
                    echo getCountryRow($newCountryID)['name']." created successfully";
                } else {
                    echo 'Error encountered creating country';
                }
            }
            ?>
        </h3>

        <br>

        <?php
        if ($newCountryID) {
            echo '<a class="btn btn-outline-secondary" href="'.getLocalFilePath('edit-country.php').'?countryID='.$newCountryID.'" role="button">Edit Country</a>';
        }
        ?>

        <a class="btn btn-outline-secondary" href="<?php echo $_POST['lastURL']?>" role="button">Return to previous page</a>

        <br>

    </div>


<?php
require(getServerFilePath('content-pane-end.php'));
require(getServerFilePath('footer.php'));