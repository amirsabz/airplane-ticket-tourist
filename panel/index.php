<?php
    include_once 'includes/session.php';
?>
<?php
    $where = '';
    $catid = 0;
    if (isset($_GET['category'])) {
        $catid = $_GET['category'];
        $where = 'WHERE category_id =' . $catid;
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
                                    <h2 class="title-1">پنل مدیریت سایت گردشگری</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-md-12">

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


<?php include 'includes/scripts.php'; ?>

</body>

</html>
<!-- end document-->


