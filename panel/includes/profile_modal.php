<!-- Add -->
<div class="modal fade" id="profile">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>پروفایل مدیر</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
          		  <div class="row form-group">
                      <div class="col col-md-3">
                          <label for="email" class="form-control-label">ایمیل</label>
                      </div>
                      <div class="col col-md-9">
                          <input type="text" class="form-control" id="email" name="email" value="<?php echo $admin['email']; ?>">
                      </div>
                  </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="password" class="form-control-label">کلمه عبور</label>
                    </div>
                    <div class="col col-md-9">
                        <input type="password" class="form-control" id="password" name="password" value="<?php echo $admin['password']; ?>">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="firstname" class="form-control-label">نام</label>
                    </div>
                    <div class="col col-md-9">
                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $admin['firstname']; ?>">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="lastname" class="form-control-label">نام خانوادگی</label>
                    </div>
                    <div class="col col-md-9">
                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $admin['lastname']; ?>">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="photo" class="form-control-label">عکس</label>
                    </div>
                    <div class="col col-md-9">
                        <input type="file" id="photo2" name="photo">
                    </div>
                </div>
                <hr>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="curr_password" class="form-control-label">کلمه عبور جاری: </label>
                    </div>
                    <div class="col col-md-9">
                        <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="برای ذخیره تغییرات کلمه عبور را وارد کنید" required>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-secondary pull-left" data-dismiss="modal"><i class="fa fa-close"></i> بستن</button>
            	<button type="submit" class="btn btn-success" name="save"><i class="fa fa-edit"></i>ویرایش</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
