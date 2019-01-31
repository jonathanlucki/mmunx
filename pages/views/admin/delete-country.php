<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: delete-country.php
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
            if(isset($_POST['deleteCountryButton'])){
                if (deleteCountry($_POST['countryID'])) {
                    echo "Country deleted successfully";
                } else {
                    echo 'Error encountered deleting country';
                }
            }
            ?>
        </h3>

        <br>

        <a class="btn btn-outline-secondary" href="<?php echo getLocalFilePath('home.php')?>" role="button">Return to to home</a>

        <br>

    </div>


<?php
require(getServerFilePath('content-pane-end.php'));
require(getServerFilePath('footer.php'));