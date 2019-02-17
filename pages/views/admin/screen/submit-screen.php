<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: submit-screen.php
 * Purpose:
 * Created: 16/02/19
 * Last Modified: 16/02/19
 */

//Requires initialization file (init.php)
require_once($_SERVER['DOCUMENT_ROOT'].'/resources/init.php');

//redirect users
redirect('admin');

require(getServerFilePath('header.php'));
require(getServerFilePath('content-pane-start.php'));

//get screen data
$screenData = getCurrentScreenData();

/**
 * Checks all possible button posts and makes database calls to change screen data
 * Returns true if successful, otherwise returns false
 * @param array  $screenData  Screen data row
 * @return bool
 */
function checkPosts ($screenData) {

    if (isset($_POST['active-resolution-next-speaker-button'])) {

        return incrementSpeakers($screenData['active_resolution']);

    } else if (isset($_POST['active-resolution-open-amendment-button'])) {

        return updateScreenData('active_amendment',getAmendmentRow(getSpeakersListForResolution($screenData['active_resolution'])[0],$screenData['active_resolution'])['amendment_id']);

    } else if (isset($_POST['active-resolution-skip-amendment-button'])) {

        return updateAmendmentStatus(getAmendmentRow(getSpeakersListForResolution($screenData['active_resolution'])[0],$screenData['active_resolution'])['amendment_id'],'failed');

    } else if (isset($_POST['active-resolution-start-vote-button'])) {

        return updateScreenData('voting',$screenData['active_resolution']);

    } else if (isset($_POST['screen-title-button'])) {

        return updateScreenData('active_screen','title');

    } else if (isset($_POST['screen-conference-button'])) {

        return updateScreenData('active_screen','conference');

    } else if (isset($_POST['screen-message-button'])) {

        return updateScreenData('active_screen','message');

    } else if (isset($_POST['vote-amendment-resolution-button'])) {

        return updateScreenData('voting',$screenData['active_amendment']);

    } else if (isset($_POST['cancel-amendment-resolution-button'])) {

        return updateScreenData('active_amendment',null);

    } else if (isset($_POST['message-button'])) {

        return updateScreenData('message',$_POST['message']);

    } else if (isset($_POST['vote-open-resolution-button'])) {

        return updateScreenData('voting',$_POST['vote-open-resolution-num']);

    } else if (isset($_POST['open-paging-system-button'])) {

        return updateScreenData('paging_system_open',true);

    } else if (isset($_POST['close-paging-system-button'])) {

        return updateScreenData('paging_system_open',false);

    } else if (isset($_POST['speakers-list-limit-button'])) {

        return updateScreenData('speakers_list_limit',$_POST['speakers-list-limit']);

    } else if (isset($_POST['temp-speakers-button'])) {

        return (updateScreenData('temp_speaker_1',$_POST['temp-speaker-1']) &&
            updateScreenData('temp_speaker_2',$_POST['temp-speaker-2']) &&
            updateScreenData('temp_speaker_3',$_POST['temp-speaker-3']));

    } else if (isset($_POST['pass-vote-active-resolution-button'])) {

        return (updateResolutionStatus($screenData['active_resolution'],'passed') &&
            updateScreenData('active_resolution',null) &&
            updateScreenData('voting',null) &&
            updateScreenData('vote_result','passed'));

    } else if (isset($_POST['fail-vote-active-resolution-button'])) {

        return (updateResolutionStatus($screenData['active_resolution'],'failed') &&
            updateScreenData('active_resolution',null) &&
            updateScreenData('voting',null) &&
            updateScreenData('vote_result','failed'));

    } else if (isset($_POST['cancel-vote-active-resolution-button'])) {

        return updateScreenData('voting', null);

    } else if (isset($_POST['pass-vote-amendment-resolution-button'])) {

        return (updateAmendmentStatus($screenData['active_amendment'],'passed') &&
            updateScreenData('active_amendment',null) &&
            updateScreenData('voting',null) &&
            updateScreenData('vote_result','passed'));

    } else if (isset($_POST['fail-vote-amendment-resolution-button'])) {

        return (updateAmendmentStatus($screenData['active_amendment'],'failed') &&
            updateScreenData('active_amendment',null) &&
            updateScreenData('voting',null) &&
            updateScreenData('vote_result','failed'));

    } else if (isset($_POST['cancel-vote-amendment-resolution-button'])) {

        return updateScreenData('voting', null);

    } else if (isset($_POST['pass-vote-open-resolution-button'])) {

        return (updateScreenData('active_resolution',$screenData['voting']) &&
            updateResolutionStatus($screenData['voting'],'in_session') &&
            updateScreenData('voting',null) &&
            updateScreenData('vote_result','passed'));

    } else if (isset($_POST['fail-vote-open-resolution-button'])) {

        return (updateScreenData('voting',null) &&
            updateScreenData('vote_result','failed'));

    } else if (isset($_POST['cancel-vote-open-resolution-button'])) {

        return updateScreenData('voting', null);

    } else if (isset($_POST['clear-vote-result-button'])) {

        return updateScreenData('vote_result', null);

    } else {

        return false;

    }

}
?>

    <div class="text-center">

        <h3>
            <?php
            if(checkPosts($screenData)) {
                echo "Changes pushed successfully";
            } else {
                echo 'Error encountered pushing changes';
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
