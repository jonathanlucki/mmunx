<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: advanced.php
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
?>

<a class="btn btn-outline-secondary" href="<?php echo getLocalFilePath('email.php') ?>" role="button">Send Emails</a>
<p>WARNING: Click button once and then WAIT even if it takes a few minutes - emails are sending slowly...</p>

<?php
require(getServerFilePath('content-pane-end.php'));
require(getServerFilePath('footer.php'));