<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>حذف...</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="booked_delete.php">
                    <input type="hidden" class="bookedid" name="id">
                    <div class="text-center">
                        <p>حذف یا کنسل کردن این بلیط</p>
                        <h2 class="bold name"></h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal"><i class="fa fa-close"></i> بستن</button>
                <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-trash"></i> حذف</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>ویرایش اطلاعات مسافر</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="booked_edit.php">
                    <input type="hidden" class="bookedid" name="id">
                    <div class="row form-group">
                        <div class="col col-md-2">
                            <label for="edit_name" class="form-control-label">نام مسافر</label>
                        </div>
                        <div class="col col-md-4">
                            <input type="text" id="edit_name" name="name" class="form-control">
                        </div>
                        <div class="col col-md-2">
                            <label for="edit_contact" class="form-control-label">شماره تماس</label>
                        </div>
                        <div class="col col-md-4">
                            <input type="text" id="edit_contact" name="contact" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="edit_address" class="form-control-label">آدرس</label>
                        </div>
                        <div class="col col-md-9">
                            <input type="text" id="edit_address" name="address" class="form-control">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal"><i class="fa fa-close"></i> بستن</button>
                <button type="submit" class="btn btn-primary" name="edit"><i class="fa fa-edit"></i> ویرایش</button>
                </form>
            </div>
        </div>
    </div>
</div>


