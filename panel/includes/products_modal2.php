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
              <form class="form-horizontal" method="POST" action="products_delete.php">
                <input type="hidden" class="prodid" name="id">
                <div class="text-center">
                    <p>حذف جاذبه یا خدمات گردشگری</p>
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
              <h4 class="modal-title"><b>ویرایش جاذبه گردشگری / خدمات گردشگری</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="products_edit.php">
                <input type="hidden" class="prodid" name="id">
                  <div class="row form-group">
                      <div class="col col-md-1">
                          <label for="name" class="form-control-label">نام</label>
                      </div>
                      <div class="col col-md-5">
                          <input type="text" id="edit_name" name="name" class="form-control" placeholder="عنوان ..." required>
                      </div>

                      <div class="col col-md-1">
                          <label for="category" class="form-control-label">دسته</label>
                      </div>
                      <div class="col col-md-5">
                          <select class="form-control" id="edit_category" name="category" required>
                              <option id="catselected" selected></option>
                          </select>
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col col-md-1">
                          <label for="province" class="form-control-label">استان</label>
                      </div>
                      <div class="col col-md-5">
                          <select class="form-control" id="edit_province" name="province" required>
                              <option id="selectedprovince" selected></option>
                          </select>
                      </div>

                      <div class="col col-md-1">
                          <label for="city" class="form-control-label">شهر</label>
                      </div>
                      <div class="col col-md-5">
                          <select class="form-control" id="edit_city" name="city" required>
                              <option id="selectcity" selected></option>
                          </select>
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col col-md-1">
                          <label for="address" class="form-control-label">آدرس</label>
                      </div>
                      <div class="col col-md-11">
                          <input type="text" id="edit_address" name="address" class="form-control" placeholder="آدرس ..." required>
                      </div>
                  </div>
                  <p><b>توضیحات</b></p>
                  <div class="row form-group">
                      <div class="col-md-12">
                          <textarea id="editor2" name="description" rows="10" cols="80"></textarea>
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

