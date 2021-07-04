<?php
    include_once 'includes/session.php';
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
                                    <h2 class="title-1">دسته بندی ها</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <h4>لیست دسته بندی ها</h4>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button type="button" class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#addnew">
                                            <i class="zmdi zmdi-plus"></i>افزودن دسته</button>
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
                                            <th scope="col">نام دسته</th>
                                            <th scope="col">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $conn = $pdo->open();

                                            try{
                                                $stmt = $conn->prepare("SELECT * FROM tourist_attractions_cat");
                                                $stmt->execute();
                                                foreach($stmt as $row){
                                                    echo "
                                                      <tr>
                                                        <td>".$row['name']."</td>
                                                        <td>
                                                          <button class='btn btn-primary edit' data-id='".$row['id']."'><i class='fa fa-edit'></i> ویرایش</button>
                                                          <button class='btn btn-danger delete' data-id='".$row['id']."'><i class='fa fa-trash'></i> حذف</button>
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

                        <?php
                        include_once 'includes/footer.php';
                        ?>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>


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

    });

    function getRow(id){
        $.ajax({
            type: 'POST',
            url: 'category_row.php',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                $('.catid').val(response.id);
                $('#edit_name').val(response.name);
                $('.catname').html(response.name);
            }
        });
    }
</script>

<?php include_once 'includes/categories_modal.php'; ?>
</body>

</html>
<!-- end document-->


