<?php
/**
 * Jonathan Lucki
 * MMUNx
 * File: delete-resolution-button.php
 * Purpose:
 * Created: 29/01/19
 * Last Modified: 31/01/19
 */
?>

<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmModal">Delete Resolution</button>

<div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmLabel">Delete Resolution</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you would like to delete this resolution?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form id="delete-resolution" action="<?php echo getLocalFilePath('delete-resolution.php')?>" method="post">
                    <input type="hidden" value="<?php echo getCurrentURL() ?>" name="lastURL" />
                    <input type="hidden" value="<?php echo $_GET['num'] ?>" name="num" />
                    <button type="submit" name="deleteResolutionButton" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>