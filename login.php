<?php include_once 'includes/session.php'; ?>
<?php include_once "includes/header.php"; ?>

        <!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">بخش ورود به سایت</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">خانه</a></li>
                        <li class="active">ورود</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->

        <!--================Contact Area =================-->
        <section class="contact_area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="contact_info">
                            <div class="info_item">
                                <h3>فرم ورود</h3>
                                <p>از طریق فرم مقابل وارد حساب کاربری خود شوید.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <?php
                        if(isset($_SESSION['error'])){
                            echo "
                                 <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                    <span class='badge badge-pill badge-warning'>خطا</span>
                                    ".$_SESSION['error']."
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                  </div>
                                ";
                            unset($_SESSION['error']);
                        }

                        if(isset($_SESSION['success'])){
                            echo "
                                  <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                    <span class='badge badge-pill badge-success'>موفق</span>
                                        ".$_SESSION['success']."
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                  </div>
                                ";
                            unset($_SESSION['success']);
                        }
                        ?>

                        <form class="row contact_form" action="verify.php" method="post" novalidate="novalidate">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="نام کاربری یا ایمیل">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="کلمه عبور">
                                </div>
                            </div>
                            <div class="col-md-8 text-left">
                                <button type="submit" name="login" class="btn theme_btn button_hover">ورود</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--================Contact Area =================-->

        <!--================ start footer Area  =================-->
        <?php include_once 'includes/footer.php'?>
		<!--================ End footer Area  =================-->


       <!--================Contact Success and Error message Area =================-->
        <div id="success" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Thank you</h2>
                        <p>Your message is successfully sent...</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals error -->

        <div id="error" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Sorry !</h2>
                        <p> Something went wrong </p>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Contact Success and Error message Area =================-->


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <?php include_once 'includes/script.php'?>


    </body>
</html>
