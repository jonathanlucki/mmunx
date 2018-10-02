<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: resolution-box-class.php
 * Purpose:
 * Created: 9/25/18
 * Last Modified: 9/25/18
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
     * Echos a amendment resolution modal
     * @param int  $resolution  Resolution number
     * @param int  $id  Country ID number
     * @param string  $type  Either 'create', 'view', or 'delete';
     */
    private function echoModal($resolution,$id,$type) {

        $modalID = $id . $resolution . 'modal' . $type;
        echo '<div class="modal fade" id="' . $modalID . '" tabindex="-1" role="dialog" aria-labelledby="' . $modalID . 'Label" aria-hidden="true">';
        echo '<div class="modal-dialog" role="document">';
        echo '<div class="modal-content">';

        echo '<div class="modal-header">';
        echo '<h5 class="modal-title" id="exampleModalLabel">Resolution ' . $resolution . '</h5>';
        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</div>';

        echo '<div class="modal-body">';
        switch($type){
            case 'create':
                break;
            case 'view':
                //add soon
                break;
            case 'delete':
                echo '<p>Are you sure sure you would like to delete this amendment?</p>';
                break;
        }
        echo '</div>';

        echo '<div class="modal-footer">';
        switch($type){
            case 'create':
                echo '<button type="button" style="margin-right:5px;" class="btn btn-secondary" data-dismiss="modal">Close</button>';
                echo '<button type="button" style="margin-right:5px;" class="btn btn-primary" data-dismiss="modal">Submit Amendment</button>';
                break;
            case 'view':
                echo '<button type="button" style="margin-right:5px;" class="btn btn-secondary" data-dismiss="modal">Close</button>';
                break;
            case 'delete':
                echo '<button type="button" style="margin-right:5px;" class="btn btn-danger" data-dismiss="modal">Yes</button>';
                echo '<button type="button" style="margin-right:5px;" class="btn btn-secondary" data-dismiss="modal">No</button>';
                break;
        }
        echo '</div>';

        echo '</div>';
        echo '</div>';
        echo '</div>';

    }


    /**
     * Echos a amendment resolution box
     */
    function echoBox() {

        //localizes class variables
        $id = $this->countryID;
        $resolution = $this->resolutionNum;

        //get amendment row for box
        $amendmentRow = getAmendmentRow($id,$resolution);
        $resolutionRow = getResolutionRow($resolution);

        //Find amendment status
        if($amendmentRow == null){
            $status = 'None submitted';
        } elseif ($amendmentRow['status'] == 'pending') {
            $status = 'Pending approval';
        } elseif ($amendmentRow['status'] == 'approved') {
            $status = 'Approved';
        } elseif ($amendmentRow['status'] == 'declined') {
            $status = 'Denied (See Tech Desk for Information)';
        } else {
            $status = null;
        }

        //card
        echo '<div class="card h-100">';
        echo '<div class="card-body">';
        echo '<h4 class="card-title">Resolution ' . $resolutionRow['num'] . '</h4>';
        echo '<h6 class="card-subtitle mb-2">' . $resolutionRow['title'] . '</h6>';
        echo '<p class="card-text">Amendment Status: <em>' . $status . '</em></p>';
        if(($amendmentRow == null) and $this->editable()) { //if amendment does not exist and is editable
            //#%id%%resolution%modelcreate
            echo '<button type="button" style="margin-right:5px;" class="btn btn-primary" data-toggle="modal" data-target="#' . $id . $resolution . 'modelcreate"> Create Amendment </button>';
        } elseif (($amendmentRow != null) and $this->editable()) { //if amendment does exist and is editable
            //#%id%%resolution%modelview
            echo '<button type="button" style="margin-right:5px;" class="btn btn-secondary" data-toggle="modal" data-target="#' . $id . $resolution . 'modelview"> View Amendment </button>';
            //#%id%%resolution%modeldelete
            echo '<button type="button" style="margin-right:5px;" class="btn btn-danger" data-toggle="modal" data-target="#' . $id . $resolution . 'modeldelete"> Delete Amendment </button>';
        } elseif (($amendmentRow != null) and !$this->editable()) { //if amendment does exist and is not editable
            //#%id%%resolution%modelview
            echo '<button type="button" style="margin-right:5px;" class="btn btn-secondary" data-toggle="modal" data-target="#' . $id . $resolution . 'modelview"> View Amendment </button>';
        }
        echo '</div>';
        echo '</div>';

        //modals
        if(($amendmentRow == null) and $this->editable()) { //if amendment does not exist and is editable

        } elseif (($amendmentRow != null) and $this->editable()) { //if amendment does exist and is editable


        } elseif (($amendmentRow != null) and !$this->editable()) { //if amendment does exist and is not editable

        }
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