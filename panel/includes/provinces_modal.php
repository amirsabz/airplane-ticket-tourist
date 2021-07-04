<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>افزودن استان جدید</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="provinces_add.php">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="name" class="form-control-label">نام استان</label>
                    </div>

                    <div class="col col-md-9">
                        <input type="text" id="name" name="name" placeholder="نام استان..." class="form-control" required>
                        <small class="form-text text-muted"></small>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> بستن</button>
              <button type="submit" class="btn btn-primary" name="add"><i class="fa fa-plus"></i> افزودن</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>ویرایش دسته بندی</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="provinces_edit.php">
                <input type="hidden" class="provincesId" name="id">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="edit_name" class="form-control-label">نام دسته بندی</label>
                    </div>

                    <div class="col col-md-9">
                        <input type="text" id="edit_name" name="name" class="form-control" required>
                        <small class="form-text text-muted"></small>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> بستن</button>
              <button type="submit" class="btn btn-primary" name="edit"><i class="fas fa-edit"></i> ویرایش</button>
              </form>
            </div>
        </div>
    </div>
</div>

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
              <form class="form-horizontal" method="POST" action="provinces_delete.php">
                <input type="hidden" class="provincesId" name="id">
                <div class="text-center">
                    <p>حذف استان</p>
                    <h2 class="bold provinces_name"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> بستن</button>
              <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-trash"></i> حذف</button>
              </form>
            </div>
        </div>
    </div>
</div>
