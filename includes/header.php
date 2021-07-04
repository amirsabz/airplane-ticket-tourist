<!doctype html>
<html lang="fa-IR">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="image/favicon.ico" type="image/png">
    <title>سایت گردشگری و فروش بلیط هواپیما</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="vendors/linericon/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <!--<link rel="stylesheet" href="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">-->
    <link rel="stylesheet" href="vendors/persian-datepicker/dist/css/persian-datepicker.min.css"/>
    <!--<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">-->
    <link rel="stylesheet" href="vendors/select2./css/select2.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>
<!--================Header Area =================-->
<div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-white">
    </div>
</div>
<header class="header_area">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="index.php"><img src="image/Logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="./index.php">صفحه اصلی</a></li>
                    <li class="nav-item"><a class="nav-link" href="./provinces.php">استان ها</a></li>
                    <li class="nav-item submenu dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">خدمات توریستی</a>
                        <ul class="dropdown-menu">
                            <?php
                                $conn = $pdo->open();

                                try{
                                $stmt = $conn->prepare("SELECT * FROM tourist_attractions_cat");
                                $stmt->execute();
                                foreach ($stmt as $row) {
                            ?>
                            <li class="nav-item"><a class="nav-link" href="tourist-attractions-details.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>"><?php echo $row['name'] ?></a></li>
                            <?php
                                }
                                }
                                catch(PDOException $e){
                                    echo "خطا در برقراری ارتباط: " . $e->getMessage();
                                }
                            ?>
                        </ul>
                    </li>
                    <!--<li class="nav-item"><a class="nav-link" href="gallery.php">گالری تصاویر</a></li>

                    <li class="nav-item"><a class="nav-link" href="contact.php">تماس با ما</a></li>-->
                    <li class="nav-item"><a class="nav-link" href="login.php">ورد</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
