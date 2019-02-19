<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: email.php
 * Purpose:
 * Created: 18/02/19
 * Last Modified: 18/02/19
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

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


    $mail = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'mmunx.noreply@gmail.com';                 // SMTP username
        $mail->Password = 'mmun1234';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('mmunx.noreply@gmail.com', 'MMUNx Admin');
        $mail->addAddress($to);

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;

        if ($mail->send()) {
            return true;
        } else {
            error_log($mail->ErrorInfo);
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            return false;
        }

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