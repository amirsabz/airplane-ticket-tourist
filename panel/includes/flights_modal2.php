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
              <form class="form-horizontal" method="POST" action="flights_delete.php">
                <input type="hidden" class="flightid" name="id">
                <div class="text-center">
                    <p>حذف پرواز</p>
                    <h2 class="bold" id="f_num"></h2>
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
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>ویرایش پرواز</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="flights_edit.php">
                <input type="hidden" class="flightid" name="id">
                  <div class="row form-group">
                      <div class="col col-md-2">
                          <label for="airline" class="form-control-label">شرکت هواپیمایی</label>
                      </div>
                      <div class="col col-md-4">
                          <select class="form-control" id="edit_airline" name="airline" required>
                              <option id="airlineselected" selected></option>
                          </select>
                      </div>
                      <div class="col col-md-2">
                          <label for="flight_number" class="form-control-label">شماره پرواز</label>
                      </div>
                      <div class="col col-md-4">
                          <input type="text" id="edit_flight_number" name="flight_number" class="form-control" placeholder="شماره پرواز..." required>
                      </div>

                  </div>
                  <div class="row form-group">
                      <div class="col col-md-2">
                          <label for="departure_airport_id" class="form-control-label">مبدا</label>
                      </div>
                      <div class="col col-md-4">
                          <select class="form-control" id="edit_departure_airport_id" name="departure_airport_id" required>
                              <option id="departureairportselected" selected></option>
                          </select>
                      </div>

                      <div class="col col-md-2">
                          <label for="arrival_airport_id" class="form-control-label">مقصد</label>
                      </div>
                      <div class="col col-md-4">
                          <select class="form-control" id="edit_arrival_airport_id" name="arrival_airport_id" required>
                              <option id="arrivalairportselected" selected></option>
                          </select>
                      </div>
                  </div>

                  <div class="row form-group">
                      <div class="col col-md-2">
                          <label for="departure_datetime" class="form-control-label">تاریخ و ساعت پرواز</label>
                      </div>
                      <div class="col col-md-4">
                          <input type="text" id="edit_departure_datetime" name="departure_datetime" class="form-control" placeholder="تاریخ و ساعت پرواز..." required>
                      </div>

                      <div class="col col-md-2">
                          <label for="arrival_datetime" class="form-control-label">تاریخ و ساعت رسیدن به مقصد</label>
                      </div>
                      <div class="col col-md-4">
                          <input type="text" id="edit_arrival_datetime" name="arrival_datetime" class="form-control" placeholder="تاریخ و ساعت رسیدن به مقصد..." required>
                      </div>

                  </div>

                  <div class="row form-group">
                      <div class="col col-md-2">
                          <label for="seats" class="form-control-label">تعداد صندلی</label>
                      </div>
                      <div class="col col-md-4">
                          <input type="text" id="edit_seats" name="seats" class="form-control" placeholder="تعداد صندلی..." required>
                      </div>

                      <div class="col col-md-2">
                          <label for="price" class="form-control-label">قیمت</label>
                      </div>
                      <div class="col col-md-4">
                          <input type="text" id="edit_price" name="price" class="form-control" placeholder="قیمت..." required>
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

