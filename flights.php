<?php include_once 'includes/session.php'; ?>
<?php include_once 'includes/header.php'; ?>
<?php include_once 'functions/functions.php'?>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    foreach($_POST as $k => $v){
        $$k = $v;

    }
}

$date               =    convertNumbers($date , false);
$date_arr           =    explode('/', $date );

$year       =   intval($date_arr[0]);
$month      =  intval(ltrim($date_arr[1], '0'));
$day        =   intval(ltrim($date_arr[2], '0'));

$date = jalali_to_gregorian($year,$month,$day,'-');

$jalali = gregorian_to_jalali(date("Y", strtotime($date)),date("m", strtotime($date)),date("d", strtotime($date)),$mod='/');
$jalali = convertNumbers($jalali , true);

if (isset($date_return) && !empty($date_return))
{
    $date_return              =    convertNumbers($date_return, false);
    $date_return_arr           =    explode('/', $date_return );

    $year       =   intval($date_return_arr[0]);
    $month      =  intval(ltrim($date_return_arr[1], '0'));
    $day        =   intval(ltrim($date_return_arr[2], '0'));

    $date_return = jalali_to_gregorian($year,$month,$day,'-');

    $jalali_return = gregorian_to_jalali(date("Y", strtotime($date_return)),date("m", strtotime($date_return)),date("d", strtotime($date_return)),$mod='/');
    $jalali_return = convertNumbers($jalali_return , true);
}

?>
        <!--================Header Area =================-->

        <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="booking_table d_flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h6>رزرو بلیط پروازهای داخلی</h6>
						<h2>خدمات توریسیتی و جاذبه های گردشگری</h2>
					</div>
				</div>
            </div>
            <div class="hotel_booking_area position">
                <div class="container">
                    <div class="hotel_booking_table">
                        <div class="col-md-12">
                            <div class="boking_table">
                                <form id="manage-filter" action="flights.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="book_tabel_item">
                                                <div class="input-group">
                                                    <select name="departure_airport_id" id="departure_location" class="wide select1">
                                                        <option value=""></option>
                                                            <?php
                                                                $conn = $pdo->open();

                                                                try{
                                                                $stmt = $conn->prepare("SELECT * FROM airports order by name asc");
                                                                $stmt->execute();
                                                                foreach ($stmt as $row) {
                                                            ?>
                                                            <option value="<?php echo $row['id'] ?>" <?php echo isset($departure_airport_id) && $departure_airport_id == $row['id'] ? "selected" : '' ?>><?php echo $row['name'] ?></option>
                                                                    <?php
                                                                }
                                                                }
                                                                catch(PDOException $e){
                                                                    echo "خطا در برقراری ارتباط: " . $e->getMessage();
                                                                }
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="book_tabel_item">
                                                <div class="input-group">
                                                    <select name="arrival_airport_id" id="arrival_airport_id" class="wide select3">
                                                        <option value=""></option>
                                                        <?php
                                                        $conn = $pdo->open();

                                                        try{
                                                            $stmt = $conn->prepare("SELECT * FROM airports order by name asc");
                                                            $stmt->execute();
                                                            foreach ($stmt as $row) {
                                                                ?>
                                                                <option value="<?php echo $row['id'] ?>" <?php echo isset($arrival_airport_id) && $arrival_airport_id == $row['id'] ? "selected" : '' ?>><?php echo $row['name'] ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        catch(PDOException $e){
                                                            echo "خطا در برقراری ارتباط: " . $e->getMessage();
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="book_tabel_item">
                                                <div class="form-group">
                                                    <div class='input-group date'>
                                                        <input type='text' class="form-control"  name="date" id='datetimepicker11' placeholder="تاریخ رفت" value="<?php echo isset($jalali) && !empty($jalali) ? $jalali : "" ?>"/>
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="book_tabel_item" id="rdate" <?php if(isset($trip) && $trip == 1): ?> style="display: none" <?php endif; ?>>
                                                <div class="form-group">
                                                    <div class='input-group date'>
                                                        <input type='text' class="form-control"  name="date_return" id='datetimepicker1' placeholder="تاریخ برگشت" value="<?php echo isset($jalali_return) && !empty($jalali_return) ? $jalali_return : "" ?>"/>
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="book_tabel_item">
                                                <div class="switch-wrap d-flex justify-content-between">

                                                    <div class="primary-radio">
                                                        <input type="radio" name="trip" id="onewway" value="1" <?php echo isset($trip) && $trip == 1 ? "checked" : "" ?>>
                                                        <label for="onewway"></label>
                                                    </div>
                                                    <p>یک طرفه</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="book_tabel_item">
                                                <div class="switch-wrap d-flex justify-content-between">

                                                    <div class="primary-radio">
                                                        <input type="radio" name="trip" id="rtrip" value="2"  <?php echo isset($trip) && $trip == 2 ? "checked" : "" ?>>
                                                        <label for="rtrip"></label>
                                                    </div>
                                                    <p>رفت و برگشت</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="margin-right: 41.6%;">
                                            <button class="book_now_btn button_hover" type="submit"> رزرو بلیط</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Banner Area =================-->

        <!--================ Latest Blog Area  =================-->
        <section class="latest_blog_area section_gap" id="flight">
            <section class="page-section" id="flight" >
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h2><?php echo isset($trip) && $trip == 2 ? "نتایج برای پرواز رفت ..." : ( !isset($trip)? " پروازهای موجود" :"نتایج پرواز جستجو شده ...")  ?></h2>
                                    </div>
                                </div>
                                <hr>
                                <?php
                                $conn = $pdo->open();

                                $stmt = $conn->prepare("SELECT * FROM airports");
                                $stmt->execute();
                                foreach ($stmt as $row) {
                                    $aname[$row['id']] = $row['name'];
                                }
                                $where = " where date(f.departure_datetime) > '".date("Y-m-d")."' ";
                                if($_SERVER['REQUEST_METHOD'] == "POST" )
                                    $where .= " and f.departure_airport_id ='$departure_airport_id' and f.arrival_airport_id = '$arrival_airport_id' and date(f.departure_datetime) = '".date('Y-m-d',strtotime($date))."'  ";
                                $flight = $conn->prepare("SELECT f.*,a.name as airline_name,a.logo FROM flights f inner join airlines a on f.airline_id = a.id $where order by rand()");
                                $flight->execute();
                                if($flight->rowCount() > 0):
                                    foreach ($flight->fetchAll() as $row) :
                                        $booked = $conn->prepare("SELECT * FROM booked_flight where flight_id = ".$row['id']);
                                        $booked->execute();
                                        $booked = $booked->rowCount();
                                        ?>
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <img src="img/<?php echo $row['logo'] ?>" alt="" class="img-fluid">
                                            </div>
                                            <div class="col-md-6">
                                                <p><b><?php echo $aname[$row['departure_airport_id']].' - '.$aname[$row['arrival_airport_id']] ?></b></p>
                                                <p><small>شرکت هواپیمایی: <b><?php echo $row['airline_name'] ?></b></small></p>
                                                <p><small>حرکت از مبدأ: <b><?php echo date('h:i A',strtotime($row['departure_datetime'])) ?></b></small></p>
                                                <p><small>رسیدن به مقصد: <b><?php echo (date('M d,Y',strtotime($row['departure_datetime'])) == date('M d,Y',strtotime($row['arrival_datetime']))) ? date('h:i A',strtotime($row['arrival_datetime'])) : date('M d,Y h:i A',strtotime($row['arrival_datetime'])) ?></b></small></p>
                                                <p>صندلی های موجود : <b><?php echo $row['seats'] - $booked ?></b></p>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <h4 class="text-left"><b><?php echo number_format($row['price']) ?></b></h4>
                                                <button class="book_now_btn button_hover  mb-4 book_flight" type="button" data-id="<?php echo $row['id'] ?>"  data-name="<?php echo $aname[$row['departure_airport_id']].' - '.$aname[$row['arrival_airport_id']] ?>" data-max="<?php echo $row['seats'] - $booked ?>">رزرو بلیط</button>
                                            </div>
                                        </div>
                                        <hr class="divider" style="max-width: 60vw">
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="row align-items-center">
                                        <h5 class="text-center"><b>نتیجه ای یافت نشد.</b></h5>
                                    </div>
                                <?php endif; ?>

                                <?php if(isset($trip) && $trip ==2): ?>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h2><?php echo isset($trip) && $trip == 2 ? "نتایج برای پرواز برگشت ..." : ( !isset($trip)? " پروازهای موجود " :"نتایج پرواز جستجو شده ...")  ?></h2>
                                        </div>
                                    </div>
                                    <hr class="divider">
                                    <?php
                                    $conn = $pdo->open();

                                    $stmt = $conn->prepare("SELECT * FROM airports");
                                    $stmt->execute();
                                    foreach ($stmt as $row) {
                                        $aname[$row['id']] = $row['name'];
                                    }
                                    $where = " where date(f.departure_datetime) > '".date("Y-m-d")."' ";
                                    if($_SERVER['REQUEST_METHOD'] == "POST" )
                                        $where .= " and f.departure_airport_id ='$arrival_airport_id' and f.arrival_airport_id = '$departure_airport_id' and date(f.departure_datetime) = '".date('Y-m-d',strtotime($date_return))."'  ";
                                    $flight = $conn->prepare("SELECT f.*,a.name as airline_name,a.logo FROM flights f inner join airlines a on f.airline_id = a.id $where order by rand()");
                                    $flight->execute();
                                    if($flight->rowCount() > 0):
                                        foreach ($flight->fetchAll() as $row):
                                            $booked = $conn->prepare("SELECT * FROM booked_flight where flight_id = ".$row['id']);
                                            $booked->execute();
                                            $booked = $booked->rowCount();

                                            ?>
                                            <div class="row align-items-center">
                                                <div class="col-md-3">
                                                    <img src="img/<?php echo $row['logo'] ?>" alt="" class="img-fluid">
                                                </div>
                                                <div class="col-md-6">
                                                    <p><b><?php echo $aname[$row['departure_airport_id']].' - '.$aname[$row['arrival_airport_id']] ?></b></p>
                                                    <p><small>شرکت هواپیمایی: <b><?php echo $row['airline_name'] ?></b></small></p>
                                                    <p><small>حرکت از مبدأ: <b><?php echo date('h:i A',strtotime($row['departure_datetime'])) ?></b></small></p>
                                                    <p><small>رسیدن به مقصد: <b><?php echo (date('M d,Y',strtotime($row['departure_datetime'])) == date('M d,Y',strtotime($row['arrival_datetime']))) ? date('h:i A',strtotime($row['arrival_datetime'])) : date('M d,Y h:i A',strtotime($row['arrival_datetime'])) ?></b></small></p>
                                                    <p>صندلی های های موجود : <b><?php echo $row['seats'] - $booked ?></b></p>
                                                </div>
                                                <div class="col-md-3 text-center">
                                                    <h4 class="text-left"><b><?php echo number_format($row['price']) ?></b></h4>
                                                    <button class="book_now_btn button_hover  btn  mb-4 book_flight" type="button" data-id="<?php echo $row['id'] ?>"  data-name="<?php echo $aname[$row['departure_airport_id']].' - '.$aname[$row['arrival_airport_id']] ?>" data-max="<?php echo $row['seats'] - $booked ?>">رزرو بلیط</button>
                                                </div>
                                            </div>
                                            <hr class="divider" style="max-width: 60vw">
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="row align-items-center">
                                            <h5 class="text-center"><b>نتیجه ای یافت نشد.</b></h5>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </section>
        <!--================ Recent Area  =================-->

        <!--================ start footer Area  =================-->
        <?php include_once 'includes/footer.php'?>
		<!--================ End footer Area  =================-->

        <!--================ start All Modal  =================-->
        <div class="modal fade" id="uni_modal" role='dialog'>
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!--================ End All Modal  =================-->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->

        <?php include_once 'includes/script.php'?>

        <script>

            $('.view_prod').click(function(){
                uni_modal_right('Product','view_prod.php?id='+$(this).attr('data-id'))
            })
            $('.select1').select2({
                placeholder:'شهر مبدأ',
                width:'100%'
            });
            $('.select3').select2({
                placeholder:'شهر مقصد',
                width:'100%'
            });
            $('[name="trip"]').on("keypress change keyup",function(){
                if($(this).val() == 1){
                    $('#rdate').hide()
                }else{
                    $('#rdate').show()
                }
            });

            $('#datetimepicker11').persianDatepicker({
                altField: '#datetimepicker11',
                altFormat: "YYYY/MM/DD",
                observer: true,
                format: 'YYYY/MM/DD',
                initialValue: false,
                initialValueType: 'persian',
                autoClose: true,
                //maxDate: 'today',
            });

            $('#datetimepicker1').persianDatepicker({
                altField: '#datetimepicker1',
                altFormat: "YYYY/MM/DD",
                observer: true,
                format: 'YYYY/MM/DD',
                initialValue: false,
                initialValueType: 'persian',
                autoClose: true,
                //maxDate: 'today',
            });

            $('.book_flight').click(function(){
                if($(this).attr('data-max') <= 0){
                    alert("تمامی صندلی های این پرواز پر شده است!");
                    return false;
                }
                uni_modal($(this).attr('data-name'),"book_flight.php?id="+$(this).attr('data-id')+"&max="+$(this).attr('data-max'),'mid-large')
            })

            window.start_load = function(){
                $('body').prepend('<di id="preloader2"></di>')
            }
            window.end_load = function(){
                $('#preloader2').fadeOut('fast', function() {
                    $(this).remove();
                })
            }


            window.uni_modal = function($title = '' , $url='',$size=''){
                start_load();
                $.ajax({
                    url:$url,
                    error:err=>{
                        console.log()
                        alert("An error occured")
                    },
                    success:function(resp){
                        if(resp){
                            $('#uni_modal .modal-title').html($title)
                            $('#uni_modal .modal-body').html(resp)
                            if($size != ''){
                                $('#uni_modal .modal-dialog').addClass($size)
                            }else{
                                $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
                            }
                            $('#uni_modal').modal('show')
                            end_load()
                        }
                    }
                })
            }

        </script>


    </body>
</html>
