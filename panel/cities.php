<?php
    include_once 'includes/session.php';
?>
<?php
    $where = '';
    $province_id = 0;
    if (isset($_GET['province'])) {
        $province_id = $_GET['province'];
        $where = 'WHERE province_id =' . $province_id;
    }
?>
<?php
    include_once 'includes/header.php';
    include_once 'includes/mobile-header.php';
    include_once 'includes/sidebar.php';
?>
        <!-- PAGE CONTAINER-->
        <div class="page-container">
        <?php include_once 'includes/desktop-header.php'; ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">لیست شهرها </h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="pull-right">
                                            <form class="form-inline">
                                                <div class="form-group">
                                                    <label>استان: </label>
                                                    <select class="form-control" id="select_province">
                                                        <option value="0">همه</option>
                                                        <?php
                                                        $conn = $pdo->open();

                                                        $stmt = $conn->prepare("SELECT * FROM provinces");
                                                        $stmt->execute();

                                                        foreach($stmt as $crow){
                                                            $selected = ($crow['id'] == $province_id) ? 'selected' : '';
                                                            echo "
                                                                <option value='".$crow['id']."' ".$selected.">".$crow['name']."</option>
                                                              ";
                                                        }

                                                        $pdo->close();
                                                        ?>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button type="button" class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#addnew" id="addcity">
                                            <i class="zmdi zmdi-plus"></i>افزودن شهر جدید</button>
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
                                    <!-- Projects table -->
                                    <table class="table table-striped table-bordered" id="table_id_1" style="width: 100%">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">نام شهر</th>
                                            <th scope="col">نام استان</th>
                                            <th scope="col">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $conn = $pdo->open();

                                        try{
                                            $stmt = $conn->prepare("SELECT *, c.id as cityId, c.name as cityName, p.name as provincesName 
                                                                    FROM cities as c
                                                                    INNER JOIN provinces as p
                                                                    ON c.province_id = p.id
                                                                     $where");
                                            $stmt->execute();
                                            foreach($stmt as $row){
                                                echo "
                                                  <tr>
                                                    <td>".$row['cityName']."</td>
                                                    
                                                    <td>".$row['provincesName']."</td>
                                                   
                                                    <td>
                                                      <button class='btn btn-primary btn-sm edit' data-id='".$row['cityId']."'><i class='fa fa-edit'></i>ویرایش</button>
                                                      <button class='btn btn-danger btn-sm delete' data-id='".$row['cityId']."'><i class='fa fa-trash'></i> حذف</button>
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

<?php include 'includes/cities_modal.php'; ?>

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


        $('#select_province').change(function(){
            var val = $(this).val();
            if(val == 0){
                window.location = 'cities.php';
            }
            else{
                window.location = 'cities.php?province='+val;
            }
        });

        $('#addcity').click(function(e){
            e.preventDefault();
            getProvinces();
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
            url: 'cities_row.php',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                $('.name').html(response.cityName);
                $('.cityId').val(response.cityId);
                $('#edit_name').val(response.cityName);
                $('#selectedprovince').val(response.provincesId).html(response.provincesName);
                getProvinces();
            }
        });
    }
    function getProvinces(){
        $.ajax({
            type: 'POST',
            url: 'provinces_fetch.php',
            dataType: 'json',
            success:function(response){
                $('#provinces').append(response);
                $('#edit_provinces').append(response);
            }
        });
    }
</script>

</body>

</html>
<!-- end document-->


