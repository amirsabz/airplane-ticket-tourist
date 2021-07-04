<?php
    include_once 'includes/session.php';
    include_once 'functions/functions.php';
?>
<?php
    include_once 'includes/header.php';
    include_once 'includes/mobile-header.php';
    include_once 'includes/sidebar.php';
?>
        <!-- PAGE CONTAINER-->
        <div class="page-container">

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">لیست پروازها </h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="pull-right">

                                        </div>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button type="button" class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#addnew" id="addflight">
                                            <i class="zmdi zmdi-plus"></i>افزودن پرواز جدید</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <?php
                                    if(isset($_SESSION['error']))
                                    {
                                        echo "<div class='sufee-alert alert with-close alert-warning alert-dismissible fade show'>
                                                <span class='badge badge-pill badge-warning'>خطا</span>
                                                    ".$_SESSION['error']."
                                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                </button>
										      </div>";
                                        unset($_SESSION['error']);
                                    }
                                    if(isset($_SESSION['success']))
                                    {
                                        echo "<div class='sufee-alert alert with-close alert-success alert-dismissible fade show'>
                                                <span class='badge badge-pill badge-success'>موفق</span>
                                                    ".$_SESSION['success']."
                                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                </button>
                                              </div>";
                                        unset($_SESSION['success']);
                                    }
                                    ?>

                                    <?php include_once 'includes/desktop-header.php'; ?>

                                    <!-- Projects table -->
                                    <table class="table table-striped table-bordered" id="table_id_1" style="width: 100%">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">تاریخ</th>
                                            <th scope="col">اطلاعات</th>
                                            <th scope="col">صندلی</th>
                                            <th scope="col">رزرو شده</th>
                                            <th scope="col">موجود</th>
                                            <th scope="col">قیمت</th>
                                            <th scope="col">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $conn = $pdo->open();

                                        try{
                                            $airport = $conn->prepare("SELECT * FROM airports ");
                                            $airport->execute();
                                            foreach($airport->fetchAll() as $row){
                                                $aname[$row['id']] = $row['name'];
                                            }
                                            $qry = $conn->prepare("SELECT f.*,a.name as airlineName,a.logo FROM flights f inner join airlines a on f.airline_id = a.id  order by id desc");
                                            $qry->execute();
                                            foreach($qry->fetchAll() as $row){
                                                $booked = $conn->prepare("SELECT * FROM booked_flight where flight_id = ".$row['id']);
                                                $booked->execute();
                                                $booked = $booked->rowCount();

                                                $available = intval($row['seats']) - intval($booked);

                                                $image = (!empty($row['logo'])) ? '../image/'.$row['logo'] : '../image/noimage.jpg';

                                                $s1 = $row['departure_datetime'];
                                                $de_datetime = new DateTime($s1);
                                                $de_date = $de_datetime->format('m/d/Y');
                                                $de_time = $de_datetime->format('H:i:s');
                                                $jalali_de_date = gregorian_to_jalali(date("Y", strtotime($de_date)),date("m", strtotime($de_date)),date("d", strtotime($de_date)),$mod='/');
                                                $departure_datetime = $de_time . ' - '. $jalali_de_date  ;

                                                $s2 = $row['arrival_datetime'];
                                                $ar_datetime = new DateTime($s2);
                                                $ar_date = $ar_datetime->format('m/d/Y');
                                                $ar_time = $ar_datetime->format('H:i:s');
                                                $jalali_de_date = gregorian_to_jalali(date("Y", strtotime($ar_date)),date("m", strtotime($ar_date)),date("d", strtotime($ar_date)),$mod='/');

                                                $arrival_datetime = $ar_time . ' - '. $jalali_de_date  ;

                                                echo "
                                                  <tr>
                                                    <td>".$row['date_created']."</td>
                                                    <td>
                                                        <img src='".$image."' height='30px' width='30px'>
                                                        <p><b>شرکت هواپیمایی: </b>".$row['airlineName']."</p>
                                                        <p><b>مبدأ: </b>".$aname[$row['departure_airport_id']]."</p>
                                                        <p><b>مقصد: </b>".$aname[$row['arrival_airport_id']]."</p>
                                                        <p><b>تاریخ و ساعت پرواز: </b> ".$departure_datetime."</p>
                                                        <p><b>تاریخ و ساعت رسیدن به مقصد: </b> ".$arrival_datetime."</p>
                                                        <p><b>شماره پرواز: </b>".$row['flight_number']."</p>
                                                    </td>
                                                    <td>".$row['seats']."</td>
                                                    <td>".$booked."</td>
                                                    <td>".$available."</td>
                                                    <td>".$row['price']."</td>
                                                    <td>
                                                      <button class='btn btn-primary btn-sm edit' data-id='".$row['id']."'><i class='fa fa-edit'></i>ویرایش</button>
                                                      <button class='btn btn-danger btn-sm delete' data-id='".$row['id']."'><i class='fa fa-trash'></i> حذف</button>
                                                    </td>
                                                  </tr>
                                                ";
                                            }
                                        }
                                        catch(PDOException $e){
                                            echo $e->getMessage();
                                        }

                                        $pdo->close();
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>

                        <?php include_once 'includes/footer.php'; ?>

                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

<?php include 'includes/flights_modal.php'; ?>
<?php include 'includes/flights_modal2.php'; ?>

<?php include 'includes/scripts.php'; ?>
<script>
    $(function(){
        $(document).on('click', '.edit', function(e){
            e.preventDefault();
            $('#edit').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $(document).on('click', '.delete', function(e){
            e.preventDefault();
            $('#delete').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $('#addflight').click(function(e){
            e.preventDefault();
            getAirport();
            getAirline();
        });

        $("#addnew").on("hidden.bs.modal", function () {
            $('.append_items').remove();
        });

        $("#edit").on("hidden.bs.modal", function () {
            $('.append_items').remove();
        });


    });

    function getRow(id){
        $.ajax({
            type: 'POST',
            url: 'flights_row.php',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                console.log(response);
                $('.flightid').val(response.flightid);
                $('#f_num').text(response.flight_number);
                $('#airlineselected').val(response.airlineId).html(response.airlineName);
                $('#edit_flight_number').val(response.flight_number);
                $('#departureairportselected').val(response.departure_airport_id).html(response.departureAirportName);
                $('#arrivalairportselected').val(response.arrival_airport_id).html(response.arrivalAirportName);
                $('#edit_departure_datetime').val(response.departure_datetime);
                $('#edit_arrival_datetime').val(response.arrival_datetime);
                $('#edit_seats').val(response.seats);
                $('#edit_price').val(response.price);
                getAirport();
                getAirline();
            }
        });
    }

    function getAirport(){
        $.ajax({
            type: 'POST',
            url: 'airports_fetch.php',
            dataType: 'json',
            success:function(response){
                $('#departure_airport_id').append(response);
                $('#arrival_airport_id').append(response);
                $('#edit_departure_airport_id').append(response);
                $('#edit_arrival_airport_id').append(response);
            }
        });
    }

    function getAirline(){
        $.ajax({
            type: 'POST',
            url: 'airlines_fetch.php',
            dataType: 'json',
            success:function(response){
                $('#airline').append(response);
                $('#edit_airline').append(response);
            }
        });
    }

    $('#departure_datetime').persianDatepicker({
        altField: '#departure_datetime',
        altFormat: "YYYY-MM-DD - HH:mm:ss",
        observer: true,
       /* format: 'YYYY/MM/DD',*/
        initialValue: false,
        initialValueType: 'persian',
        autoClose: true,
        timePicker: {
            enabled: true,
            meridiem: {
                enabled: false
            }
        }
        //maxDate: 'today',
    });

    $('#arrival_datetime').persianDatepicker({
        altField: '#arrival_datetime',
        altFormat: "YYYY-MM-DD - HH:mm:ss",
        observer: true,
        /*format: 'YYYY/MM/DD',*/
        initialValue: false,
        initialValueType: 'persian',
        autoClose: true,
        timePicker: {
            enabled: true,
            meridiem: {
                enabled: true
            }
        }
        //maxDate: 'today',
    });

    $('#edit_departure_datetime').persianDatepicker({
        altField: '#edit_departure_datetime',
        altFormat: "YYYY-MM-DD - HH:mm:ss",
        observer: true,
        /* format: 'YYYY/MM/DD',*/
        initialValue: false,
        initialValueType: 'persian',
        autoClose: true,
        timePicker: {
            enabled: true,
            meridiem: {
                enabled: false
            }
        }
        //maxDate: 'today',
    });

    $('#edit_arrival_datetime').persianDatepicker({
        altField: '#edit_arrival_datetime',
        altFormat: "YYYY-MM-DD - HH:mm:ss",
        observer: true,
        /*format: 'YYYY/MM/DD',*/
        initialValue: false,
        initialValueType: 'persian',
        autoClose: true,
        timePicker: {
            enabled: true,
            meridiem: {
                enabled: true
            }
        }
        //maxDate: 'today',
    });
</script>

</body>

</html>
<!-- end document-->


