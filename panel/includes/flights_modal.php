<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>افزودن پرواز جدید</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action=" flights_add.php">

                  <div class="row form-group">
                      <div class="col col-md-2">
                          <label for="airline" class="form-control-label">شرکت هواپیمایی</label>
                      </div>
                      <div class="col col-md-4">
                          <select class="form-control" id="airline" name="airline" required>
                              <option value="" selected>- شرکت هواپیمایی -</option>
                          </select>
                      </div>
                      <div class="col col-md-2">
                          <label for="flight_number" class="form-control-label">شماره پرواز</label>
                      </div>
                      <div class="col col-md-4">
                          <input type="text" id="flight_number" name="flight_number" class="form-control" placeholder="شماره پرواز..." required>
                      </div>

                  </div>
                  <div class="row form-group">
                      <div class="col col-md-2">
                          <label for="departure_airport_id" class="form-control-label">مبدا</label>
                      </div>
                      <div class="col col-md-4">
                          <select class="form-control" id="departure_airport_id" name="departure_airport_id" required>
                              <option value="" selected>- مبدأ -</option>
                          </select>
                      </div>

                      <div class="col col-md-2">
                          <label for="arrival_airport_id" class="form-control-label">مقصد</label>
                      </div>
                      <div class="col col-md-4">
                          <select class="form-control" id="arrival_airport_id" name="arrival_airport_id" required>
                              <option value="">- مقصد -</option>
                          </select>
                      </div>
                  </div>

                  <div class="row form-group">
                      <div class="col col-md-2">
                          <label for="departure_datetime" class="form-control-label">تاریخ و ساعت پرواز</label>
                      </div>
                      <div class="col col-md-4">
                          <input type="text" id="departure_datetime" name="departure_datetime" class="form-control" placeholder="تاریخ و ساعت پرواز..." required>
                      </div>

                      <div class="col col-md-2">
                          <label for="arrival_datetime" class="form-control-label">تاریخ و ساعت رسیدن به مقصد</label>
                      </div>
                      <div class="col col-md-4">
                          <input type="text" id="arrival_datetime" name="arrival_datetime" class="form-control" placeholder="تاریخ و ساعت رسیدن به مقصد..." required>
                      </div>

                  </div>

                  <div class="row form-group">
                      <div class="col col-md-2">
                          <label for="seats" class="form-control-label">تعداد صندلی</label>
                      </div>
                      <div class="col col-md-4">
                          <input type="text" id="seats" name="seats" class="form-control" placeholder="تعداد صندلی..." required>
                      </div>

                      <div class="col col-md-2">
                          <label for="price" class="form-control-label">قیمت</label>
                      </div>
                      <div class="col col-md-4">
                          <input type="text" id="price" name="price" class="form-control" placeholder="قیمت..." required>
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
