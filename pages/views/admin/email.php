<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: email.php
 * Purpose:
 * Created: 18/02/19
 * Last Modified: 18/02/19
 */

//Requires initialization file (init.php)
require_once($_SERVER['DOCUMENT_ROOT'].'/resources/init.php');

//redirect users
redirect('admin');

require(getServerFilePath('header.php'));
require(getServerFilePath('content-pane-start.php'));

function sendEmail($to,$name,$countryName,$countryCode) {

    $subject = "MMUNx Access Code - " . $countryName;

    $message = '
    <h1><strong>MMUNx</strong></h1>
<p>Hello '.$name.',</p>
<p>You have been enrolled in MMUNx and assigned to the country '.$countryName.'. Your access code is '.$countryCode.'.</p>
<p>MMUNx is a new system for Martingrove Model United Nations that allows you to submit amendments to resolutions online for General Assembly resolutions, up until a resolution is opened for debate. You may also view resolution details, and amendments submitted by other countries. Please note that all amendments will be screened for profanity.</p>
<p>To access MMUNx, simply navigate to&nbsp;<a href="https://www.mmun.ca/">https://www.mmun.ca/</a>&nbsp;and log in with the provided access code.</p>
<p>For any questions and concerns, please see tech desk during the conference.</p>
<p>&nbsp;</p>
<p>Thank you!</p>
<p>Jonathan Lucki</p>
<p>&nbsp;</p>
<p>DO NOT REPLY TO THIS EMAIL</p>
';


    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <no-reply@mmun.ca>' . "\r\n";

    return mail($to,$subject,$message,$headers);

}

function sendEmails() {

    $countryArray = getCountryArray();

    $success = false;

    foreach ($countryArray as $countryRow) {
        echo 'HEY';

        if ($countryRow['email1'] != null) {
            echo 'HEY2';
            if (sendEmail($countryRow['email1'],$countryRow['person1'],$countryRow['name'],$countryRow['code'])) {
                $success = true;
            }
        }
        if ($countryRow['email2'] != null) {
            if (sendEmail($countryRow['email2'],$countryRow['person2'],$countryRow['name'],$countryRow['code'])) {
                $success = true;
            }
        }
        if ($countryRow['email3'] != null) {
            if (sendEmail($countryRow['email3'],$countryRow['person3'],$countryRow['name'],$countryRow['code'])) {
                $success = true;
            }
        }
        if ($countryRow['email4'] != null) {
            if (sendEmail($countryRow['email4'],$countryRow['person4'],$countryRow['name'],$countryRow['code'])) {
                $success = true;
            }
        }

    }

    return $success;

}

?>

    <div class="text-center">

        <h3>
            <?php
            if(sendEmails()) {
                echo "Emails sent successfully";
            } else {
                echo 'Error encountered sending emails';
            }
            ?>
        </h3>

        <br>

        <a class="btn btn-outline-secondary" href="<?php echo getLocalFilePath('advanced.php')?>" role="button">Return to previous page</a>

        <br>

    </div>


<?php


require(getServerFilePath('content-pane-end.php'));
require(getServerFilePath('footer.php'));