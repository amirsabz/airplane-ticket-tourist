<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>افزودن شهر جدید</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="cities_add.php">

                  <div class="row form-group">
                      <div class="col col-md-1">
                          <label for="name" class="form-control-label">نام</label>
                      </div>
                      <div class="col col-md-5">
                          <input type="text" id="name" name="name" class="form-control" placeholder="نام شهر ..." required>
                      </div>

                      <div class="col col-md-1">
                          <label for="category" class="form-control-label">استان</label>
                      </div>
                      <div class="col col-md-5">
                          <select class="form-control" id="provinces" name="provinces" required>
                              <option value="" selected>- استان -</option>
                          </select>
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
                <form class="form-horizontal" method="POST" action="cities_delete.php">
                    <input type="hidden" class="cityId" name="id">
                    <div class="text-center">
                        <p>حذف شهر</p>
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
                <h4 class="modal-title"><b>ویرایش شهر</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="cities_edit.php">
                    <input type="hidden" class="cityId" name="id">
                    <div class="row form-group">
                        <div class="col col-md-1">
                            <label for="name" class="form-control-label">نام</label>
                        </div>
                        <div class="col col-md-5">
                            <input type="text" id="edit_name" name="name" class="form-control" placeholder="نام شهر ..." required>
                        </div>

                        <div class="col col-md-1">
                            <label for="category" class="form-control-label">استان</label>
                        </div>
                        <div class="col col-md-5">
                            <select class="form-control" id="edit_provinces" name="provinces">
                                <option id="selectedprovince"></option>
                            </select>
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
