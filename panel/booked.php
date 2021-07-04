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
                                    <h2 class="title-1">لیست بلیط های رزرو شده </h2>
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
                                            <th scope="col">ردیف</th>
                                            <th scope="col">اطلاعات مسافر</th>
                                            <th scope="col">اطلاعات پرواز</th>
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

                                            $i=1;

                                            $qry = $conn->prepare("SELECT b.*,f.*,a.name as airlineName,a.logo,b.id as bid FROM  booked_flight b inner join flights f on f.id = b.flight_id inner join airlines a on f.airline_id = a.id  order by b.id desc");
                                            $qry->execute();
                                            foreach($qry->fetchAll() as $row){

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
                                                    <td class='text-center'>".$i++."</td>
                                                    <td>
                                                        <p><b>نام: </b>".$row['name']."</p>
                                                        <p><b>شماره تماس: </b>".$row['contact']."</p>
                                                        <p><b>آدرس: </b>".$row['address']."</p>
                                                    </td>
                                                    <td>
                                                        <img src='".$image."' height='30px' width='30px'>
                                                        <p><b>شرکت هواپیمایی: </b>".$row['airlineName']."</p>
                                                        <p><b>مبدأ: </b>".$aname[$row['departure_airport_id']]."</p>
                                                        <p><b>مقصد: </b>".$aname[$row['arrival_airport_id']]."</p>
                                                        <p><b>تاریخ و ساعت پرواز: </b> ".$departure_datetime."</p>
                                                        <p><b>تاریخ و ساعت رسیدن به مقصد: </b> ".$arrival_datetime."</p>
                                                        <p><b>شماره پرواز: </b>".$row['flight_number']."</p>
                                                    </td>       
                                                    <td>
                                                      <button class='btn btn-primary btn-sm edit' data-id='".$row['bid']."'><i class='fa fa-edit'></i>ویرایش</button>
                                                      <button class='btn btn-danger btn-sm delete' data-id='".$row['bid']."'><i class='fa fa-trash'></i> حذف</button>
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

<?php include 'includes/booked_modal.php'; ?>

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



        $("#edit").on("hidden.bs.modal", function () {
            $('.append_items').remove();
        });


        function getRow(id){
            $.ajax({
                type: 'POST',
                url: 'booked_row.php',
                data: {id:id},
                dataType: 'json',
                success: function(response){
                    //console.log(response);
                    $('.bookedid').val(response.id);
                    $('.name').text(response.name);
                    $('#edit_name').val(response.name);
                    $('#edit_contact').val(response.contact);
                    $('#edit_address').val(response.address);
                }
            });
        }

    });
</script>

</body>

</html>
<!-- end document-->


