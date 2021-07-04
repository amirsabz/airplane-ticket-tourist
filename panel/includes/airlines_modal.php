<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>افزودن شرکت هواپیمایی جدید</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="airlines_add.php" enctype="multipart/form-data">

                  <div class="row form-group">
                      <div class="col col-md-3">
                          <label for="name" class="form-control-label">نام</label>
                      </div>
                      <div class="col col-md-9">
                          <input type="text" id="name" name="name" class="form-control" placeholder="نام شرکت هواپیمایی..." required>
                      </div>

                  </div>

                  <div class="row form-group">
                      <div class="col col-md-1">
                          <label for="photo" class="form-control-label">عکس</label>
                      </div>
                      <div class="col col-md-11">
                          <input type="file" id="photo" name="photo">
                      </div>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal"><i class="fa fa-close"></i> بستن</button>
              <button type="submit" class="btn btn-primary" name="add"><i class="fa fa-plus"></i> افزودن</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="name"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="airlines_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="prodid" name="id">
                <div class="row form-group">

                    <div class="col col-md-3">
                        <label for="photo" class="form-control-label">عکس</label>
                    </div>
                    <div class="col col-md-9">
                        <input type="file" id="edit_photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal"><i class="fa fa-close"></i> بستن</button>
              <button type="submit" class="btn btn-primary btn-flat" name="upload"><i class="fa fa-edit"></i> ویرایش</button>
              </form>
            </div>
        </div>
    </div>
</div>
