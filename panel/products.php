<?php
    include_once 'includes/session.php';
?>
<?php
    $where = '';
    $catid = 0;
    if (isset($_GET['category'])) {
        $catid = $_GET['category'];
        $where = 'WHERE tourist_attractions_cat_id =' . $catid;
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
                                    <h2 class="title-1">لیست خدمات و جاذبه های گردشگری </h2>
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
                                                    <label>دسته بندی: </label>
                                                    <select class="form-control" id="select_category">
                                                        <option value="0">همه</option>
                                                        <?php
                                                        $conn = $pdo->open();

                                                        $stmt = $conn->prepare("SELECT * FROM tourist_attractions_cat");
                                                        $stmt->execute();

                                                        foreach($stmt as $crow){
                                                            $selected = ($crow['id'] == $catid) ? 'selected' : '';
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
                                        <button type="button" class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#addnew" id="addproduct">
                                            <i class="zmdi zmdi-plus"></i>افزودن مورد جدید</button>
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
                                            <th scope="col">عنوان</th>
                                            <th scope="col">تصویر</th>
                                            <th scope="col">شهر</th>
                                            <th scope="col">توضیحات</th>
                                            <th scope="col">آدرس</th>
                                            <th scope="col">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $conn = $pdo->open();

                                        try{
                                            $now = date('Y-m-d');
                                            $stmt = $conn->prepare("SELECT *, ta.id as taId, ta.name as taName, c.name as cityName 
                                                                    FROM tourist_attractions as ta
                                                                    INNER JOIN cities as c
                                                                    ON ta.city_id = c.id
                                                                     $where");
                                            $stmt->execute();
                                            foreach($stmt as $row){
                                                $image = (!empty($row['photo'])) ? '../image/'.$row['photo'] : '../image/noimage.jpg';
                                                echo "
                                                  <tr>
                                                    <td>".$row['taName']."</td>
                                                    <td>
                                                      <img src='".$image."' height='30px' width='30px'>
                                                      <span class='pull-left'><a href='#edit_photo' class='photo' data-toggle='modal' data-id='".$row['taId']."'><i class='fa fa-edit'></i></a></span>
                                                    </td>
                                                    <td>".$row['cityName']."</td>
                                                    <td><a href='#description' data-toggle='modal' class='btn btn-info btn-sm btn-flat desc' data-id='".$row['taId']."'><i class='fa fa-search'></i> مشاهده</a></td>
                                                    <td>".$row['address']."</td>
                                                    <td>
                                                      <button class='btn btn-primary btn-sm edit' data-id='".$row['taId']."'><i class='fa fa-edit'></i>ویرایش</button>
                                                      <button class='btn btn-danger btn-sm delete' data-id='".$row['taId']."'><i class='fa fa-trash'></i> حذف</button>
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

<?php include 'includes/products_modal.php'; ?>
<?php include 'includes/products_modal2.php'; ?>

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

        $(document).on('click', '.photo', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            getRow(id);
        });

        $(document).on('click', '.desc', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            getRow(id);
        });

        $('#select_category').change(function(){
            var val = $(this).val();
            if(val == 0){
                window.location = 'products.php';
            }
            else{
                window.location = 'products.php?category='+val;
            }
        });

        $('#addproduct').click(function(e){
            e.preventDefault();
            getCategory();
            getProvinces();
        });

        $("#addnew").on("hidden.bs.modal", function () {
            $('.append_items').remove();
        });

        $("#edit").on("hidden.bs.modal", function () {
            $('.append_items').remove();
        });



        $('#province').on('change', function() {
            var province_id = this.value;
            $.ajax({
                url: "cities_by_provinces.php",
                type: "POST",
                data: {
                    province_id: province_id
                },
                cache: false,
                success: function(result){
                    $("#city").html(result);
                }
            });
        });

        $('#edit_province').on('change', function() {
            var province_id = this.value;
            $.ajax({
                url: "cities_by_provinces.php",
                type: "POST",
                data: {
                    province_id: province_id
                },
                cache: false,
                success: function(result){
                    $("#edit_city").html(result);
                }
            });
        });

    });

    function getRow(id){
        $.ajax({
            type: 'POST',
            url: 'products_row.php',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                $('#desc').html(response.description);
                $('.title').html(response.taName);
                $('.name').html(response.taName);
                $('.prodid').val(response.taId);
                $('#edit_name').val(response.taName);
                $('#catselected').val(response.tourist_attractions_cat_id).html(response.tacName);
                $('#selectedprovince').val(response.provincesId).html(response.provincesName);
                $('#selectcity').val(response.cityId).html(response.cityName);
                $('#edit_address').val(response.address);
                editor2.setData(response.description);
                getCategory();
                getProvinces();
            }
        });
    }
    function getCategory(){
        $.ajax({
            type: 'POST',
            url: 'category_fetch.php',
            dataType: 'json',
            success:function(response){
                $('#category').append(response);
                $('#edit_category').append(response);
            }
        });
    }
    function getProvinces(){
        $.ajax({
            type: 'POST',
            url: 'provinces_fetch.php',
            dataType: 'json',
            success:function(response){
                $('#province').append(response);
                $('#edit_province').append(response);
            }
        });
    }

    var editor2;
    ClassicEditor
        .create( document.querySelector( '#editor2' ), {
            // The UI of the editor as well as its content will be in German.
            language: 'fa',
            // But the content will be edited in Arabic.
            content: 'ar'
        } )
        .then( newEditor => {
            editor2 = newEditor;
        } )
        .catch( error => {
            console.error( error );
        } );
</script>

</body>

</html>
<!-- end document-->


