<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: resolution-box-class.php
 * Purpose:
 * Created: 9/25/18
 * Last Modified: 06/02/18
 */

class resolution_box {


    public $countryID;
    public $resolutionNum;


    /**
     * Constructor for resolution_box
     * @param int  $countryID  Country ID number
     * @param int  $resolutionNum  Resolution number
     */
    function __construct($countryID,$resolutionNum) {
        $this->countryID = $countryID;
        $this->resolutionNum = $resolutionNum;
    }


    /**
     * Echos required amendment resolution modals
     */
    function echoModals() {

        //localizes class variables
        $id = $this->countryID;
        $resolution = $this->resolutionNum;

        //get amendment row
        $amendmentRow = getAmendmentRow($id,$resolution);

        //determines type
        if(($amendmentRow == null) and $this->editable()) { //if amendment does not exist and is editable
            $this->echoModal('create');
        } elseif (($amendmentRow != null) and $this->editable()) { //if amendment does exist and is editable
            $this->echoModal('view');
            $this->echoModal('delete');
        } elseif (($amendmentRow != null) and !$this->editable()) { //if amendment does exist and is not editable
            $this->echoModal('view');
        }

    }

    /**
     * Echos a amendment resolution modal based on type
     * @param string  $type  Either 'create', 'view', or 'delete';
     */
    private function echoModal($type) {

        //localizes class variables
        $id = $this->countryID;
        $resolution = $this->resolutionNum;

        //get amendment row
        $amendmentRow = getAmendmentRow($id,$resolution);

        $modalID = $id . $resolution . 'modal' . $type;
        echo '<div class="modal fade" id="' . $modalID . '" tabindex="-1" role="dialog" aria-labelledby="' . $modalID . 'Label" aria-hidden="true">';
        echo '<div class="modal-dialog" role="document">';
        echo '<div class="modal-content">';

        echo '<div class="modal-header">';
        echo '<h5 class="modal-title" id="exampleModalLabel">Resolution ' . $resolution . '</h5>';
        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</div>';

        //for create form
        if ($type == 'create') {
            echo '<form id="submission" action="'.getLocalFilePath('submit-amendment.php').'" method="post">';
        }

        echo '<div class="modal-body">';
        switch($type){
            case 'create':
                //amendment submission form
                echo '<div class="form-group">';
                echo '<label for="amendmentType">Amendment Type</label>';
                echo '<select name="type" class="form-control" id="amendmentType">';
                echo '<option value="amend">Amend clause</option>';
                echo '<option value="add">Add clause</option>';
                echo '<option value="strike">Strike clause</option>';
                echo '</select>';
                echo '</div>';

                echo '<div class="form-group">';
                echo '<label for="clause">Clause Number</label>';
                echo '<input name="clause" type="number" class="form-control" id="clause">';
                echo '</div>';

                echo '<div class="form-group">';
                echo '<label for="details">Details</label>';
                echo '<textarea name="details" class="form-control" id="details" rows="5" maxlength="500" aria-describedby="detailsMaxLength"></textarea>';
                echo '<small id="detailsMaxLength" class="form-text">Max characters: 500</small>';
                echo '</div>';

                break;
            case 'view':
                echoAmendmentText($amendmentRow['amendment_id']);
                break;
            case 'delete':
                echo '<p>Are you sure sure you would like to delete this amendment?</p>';
                break;
        }
        echo '</div>';

        echo '<div class="modal-footer">';
        switch($type){
            case 'create':
                echo '<input type="hidden" value="' . $resolution . '" name="resolution" />';
                echo '<input type="hidden" value="' . $id . '" name="countryID" />';
                echo '<input type="hidden" value="' . getCurrentURL() . '" name="lastURL" />';
                echo '<button type="button" style="margin-right:5px;" class="btn btn-secondary" data-dismiss="modal">Close</button>';
                echo '<button type="submit" name="submitButton"  style="margin-right:5px;" class="btn btn-primary">Submit Amendment</button>';
                break;
            case 'view':
                echo '<button type="button" style="margin-right:5px;" class="btn btn-secondary" data-dismiss="modal">Close</button>';
                break;
            case 'delete':
                //delete button
                echo '<form id="delete" action="'.getLocalFilePath('delete-amendment.php').'" method="post">';
                echo '<input type="hidden" value="' . $resolution . '" name="resolution" />';
                echo '<input type="hidden" value="' . $id . '" name="countryID" />';
                echo '<input type="hidden" value="' . getCurrentURL() . '" name="lastURL" />';
                echo '<button type="submit" name="deleteButton" style="margin-right:5px;" class="btn btn-danger">Yes</button>';
                echo '</form>';
                //non delete button
                echo '<button type="button" style="margin-right:5px;" class="btn btn-secondary" data-dismiss="modal">No</button>';
                break;
        }
        echo '</div>';

        //for create form
        if ($type == 'create') {
            echo '</form>';
        }

        echo '</div>';
        echo '</div>';
        echo '</div>';

    }


    /**
     * Echos a amendment resolution box
     * @param bool  $displayCountryName  true if box should display country name;
     */
    function echoBox($displayCountryName) {

        //localizes class variables
        $id = $this->countryID;
        $resolution = $this->resolutionNum;

        //get amendment row and resolution row
        $amendmentRow = getAmendmentRow($id,$resolution);
        $resolutionRow = getResolutionRow($resolution);

        //Find amendment status
        if($amendmentRow == null){
            $status = '<span class="badge badge-secondary">None submitted</span>';
        } elseif ($amendmentRow['status'] == 'pending') {
            $status = '<span class="badge badge-warning">Pending Tech Desk Approval</span>';
        } elseif ($amendmentRow['status'] == 'approved') {
            $status = '<span class="badge badge-primary">Approved</span>';
        } elseif ($amendmentRow['status'] == 'denied') {
            $status = '<span class="badge badge-dark">Denied (See Tech Desk for Information)</span>';
        }elseif ($amendmentRow['status'] == 'passed') {
            $status = '<span class="badge badge-success">Passed</span>';
        }elseif ($amendmentRow['status'] == 'failed') {
            $status = '<span class="badge badge-danger">Failed</span>';
        } else {
            $status = null;
        }

        //card
        echo '<div class="card h-100">';
        echo '<div class="card-body">';
        if ($displayCountryName) {
            echo '<h4 class="card-title">' . getCountryRow($id)['name'] . '</h4>';
        } else {
            echo '<h4 class="card-title">Resolution ' . $resolutionRow['num'] . '</h4>';
            echo '<h6 class="card-subtitle mb-2"><em>' . $resolutionRow['title'] . '</em></h6>';
        }
        echo '<p class="card-text">Status: ' . $status . '</p>';
        if(($amendmentRow == null) and $this->editable()) { //if amendment does not exist and is editable
            //#%id%%resolution%modelcreate
            echo '<button type="button" style="margin-right:5px; margin-bottom:5px;" class="btn btn-primary" data-toggle="modal" data-target="#' . $id . $resolution . 'modalcreate"> Create Amendment </button>';
        } elseif (($amendmentRow != null) and $this->editable()) { //if amendment does exist and is editable
            //#%id%%resolution%modelview
            echo '<button type="button" style="margin-right:5px; margin-bottom:5px;" class="btn btn-secondary" data-toggle="modal" data-target="#' . $id . $resolution . 'modalview"> View Amendment </button>';
            //#%id%%resolution%modeldelete
            echo '<button type="button" style="margin-right:5px; margin-bottom:5px;" class="btn btn-danger" data-toggle="modal" data-target="#' . $id . $resolution . 'modaldelete"> Delete Amendment </button>';
        } elseif (($amendmentRow != null) and !$this->editable()) { //if amendment does exist and is not editable
            //#%id%%resolution%modelview
            echo '<button type="button" style="margin-right:5px; margin-bottom:5px;" class="btn btn-secondary" data-toggle="modal" data-target="#' . $id . $resolution . 'modalview"> View Amendment </button>';
        }
        echo '</div>';
        echo '</div>';

    }

    private function editable() {
        if ($_SESSION['admin']) {
            return true;
        } elseif ($_SESSION['countryID'] == $this->countryID) {
            return true;
        } else {
            return false;
        }
    }

}