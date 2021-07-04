<!-- Description -->
<div class="modal fade" id="description">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="title"></span></b></h4>
            </div>
            <div class="modal-body">
                <p id="desc"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal"><i class="fa fa-close"></i> بستن</button>
            </div>
        </div>
    </div>
</div>

<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>افزودن خدمات یا جاذبه گردشگری جدید</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="products_add.php" enctype="multipart/form-data">

                  <div class="row form-group">
                      <div class="col col-md-1">
                          <label for="name" class="form-control-label">نام</label>
                      </div>
                      <div class="col col-md-5">
                          <input type="text" id="name" name="name" class="form-control" placeholder="عنوان ..." required>
                      </div>

                      <div class="col col-md-1">
                          <label for="category" class="form-control-label">دسته</label>
                      </div>
                      <div class="col col-md-5">
                          <select class="form-control" id="category" name="category" required>
                              <option value="" selected>- دسته -</option>
                          </select>
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col col-md-1">
                          <label for="province" class="form-control-label">استان</label>
                      </div>
                      <div class="col col-md-5">
                          <select class="form-control" id="province" name="province" required>
                              <option value="" selected>- انتخاب استان -</option>
                          </select>
                      </div>

                      <div class="col col-md-1">
                          <label for="city" class="form-control-label">شهر</label>
                      </div>
                      <div class="col col-md-5">
                          <select class="form-control" id="city" name="city" required>
                              <option value="">- انتخاب شهر -</option>
                          </select>
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
                  <div class="row form-group">
                      <div class="col col-md-1">
                          <label for="address" class="form-control-label">آدرس</label>
                      </div>
                      <div class="col col-md-11">
                          <input type="text" id="address" name="address" class="form-control" placeholder="آدرس ..." required>
                      </div>
                  </div>
                <p><b>توضیحات</b></p>
                <div class="row form-group">
                  <div class="col-md-12">
                    <textarea id="editor1" name="description" rows="10" cols="80"></textarea>
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
              <form class="form-horizontal" method="POST" action="products_photo.php" enctype="multipart/form-data">
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
