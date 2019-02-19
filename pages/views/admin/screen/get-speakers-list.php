<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: get-speakers-list.php
 * Purpose:
 * Created: 17/02/19
 * Last Modified: 17/02/19
 */

//Requires initialization file (init.php)
require_once($_SERVER['DOCUMENT_ROOT'].'/resources/init.php');


/**
 * echos speaker list item of country with $countryID
 * @param int  $countryID  Country ID
 */
function echoSpeakersListItem($countryID) {
    $countryName = getCountryRow($countryID)['name'];
    echo '<li>';
    echo '<h2>' . $countryName . '</h2>';
    echo '</li>';
}


//get screen data
$screenData = getCurrentScreenData();

//get resolution row and speakers list order
if ($screenData['active_resolution'] != null) {
    $resolutionRow = getResolutionRow($screenData['active_resolution']);
    $speakerOrder = getSpeakersListForResolution($screenData['active_resolution']);
}

//get amendment row
if ($screenData['active_amendment'] != null) {
    $amendmentRow = getAmendmentRowByID($screenData['active_amendment']);
}

//number of speakers for speakers list
if ($screenData['active_resolution'] != null) {
    $speakersNum = min($screenData['speakers_list_limit'], sizeof($speakerOrder), CONFIG['max_speakers_displayed']);
} else {
    $speakersNum = 0;
}

//speakers count
$speakersCount = 0;


echo '<h1>Speaker\'s List</h1>';

echo '<ul>';

//current amendment speaker
if ($screenData['active_amendment'] != null) {
    echoSpeakersListItem($amendmentRow['country_id']);
    $speakersCount++;
}

//temporary speakers
if ($screenData['temp_speaker_1'] != null) {
    echoSpeakersListItem($screenData['temp_speaker_1']);
    $speakersCount++;
}
if ($screenData['temp_speaker_2'] != null) {
    echoSpeakersListItem($screenData['temp_speaker_2']);
    $speakersCount++;
}
if ($screenData['temp_speaker_3'] != null) {
    echoSpeakersListItem($screenData['temp_speaker_3']);
    $speakersCount++;
}

//submitter, seconder, and negator
if($screenData['active_resolution'] != null) {
    if ($resolutionRow['speakers'] < 3) {
        echoSpeakersListItem($resolutionRow['negator']);
        $speakersCount++;
        if ($resolutionRow['speakers'] < 2) {
            echoSpeakersListItem($resolutionRow['seconder']);
            $speakersCount++;
            if ($resolutionRow['speakers'] < 1) {
                echoSpeakersListItem($resolutionRow['submitter']);
                $speakersCount++;
            }
        }
    }
}

//main speakers list
if ($screenData['active_resolution'] != null) {
    $i = 0;
    while ($speakersCount < $speakersNum) {
        if ($amendmentRow != null) {
            if ($speakerOrder[$i] != $amendmentRow['country_id']) {
                echoSpeakersListItem($speakerOrder[$i]);
                $speakersCount++;
                $i++;
            }
        } else {
            echoSpeakersListItem($speakerOrder[$i]);
            $speakersCount++;
            $i++;
        }
    }
}

echo '</ul>';
