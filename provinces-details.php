<?php include_once 'includes/session.php'; ?>
<?php include_once 'includes/header.php'?>
<?php include_once 'functions/functions.php'?>

        <!--================Banner Area =================-->
        <section class="breadcrumb_area blog_banner_two">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle f_48"><?php echo $_GET['name']; ?></h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">خانه</a></li>
                        <li><a href="#"><?php echo $_GET['name']; ?></a></li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Banner Area =================-->

        <!--================Blog Area =================-->
        <section class="blog_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog_left_sidebar">
                            <?php
                            $conn = $pdo->open();
                            $id = $_GET['id'];
                            try{
                                $stmt = $conn->prepare("SELECT *, ta.id as taId, ta.name as taName,
										tac.id as tacId, tac.name as tacName,
										c.id as cityId, c.name as cityName,
										p.id as provincesId, p.name as provincesName
										FROM tourist_attractions as ta 
										INNER JOIN tourist_attractions_cat as tac
										ON ta.tourist_attractions_cat_id = tac.id
										INNER JOIN cities as c
										ON ta.city_id = c.id
										INNER JOIN provinces as p
										ON c.province_id = p.id
		 								WHERE p.id=:id");

                                $stmt->execute(['id'=>$id]);
                                $row = $stmt->fetch();
                                $stmt->execute();
                                $provinces = $stmt->fetchAll();
                            }
                            catch(PDOException $e){
                                echo "خطا در برقراری ارتباط: " . $e->getMessage();
                            }
                            ?>
                            <?php
                            foreach ($provinces as  $key => $row) {
                                $image = (!empty($row['photo'])) ? 'image/' . $row['photo'] : 'image/noimage.jpg';
                                $s = $row['created_at'];
                                $dt = new DateTime($s);
                                $date = $dt->format('m/d/Y');

                                $jalali = gregorian_to_jalali(date("Y", strtotime($date)),date("m", strtotime($date)),date("d", strtotime($date)),$mod='-');
                                $jalali = convertNumbers($jalali , true);
                            ?>

                            <article class="row blog_item">
                               <div class="col-md-3">
                                   <div class="blog_info text-left">
                                        <ul class="blog_meta list_style">
                                            <li><a href="#"><?php echo $row['tacName']; ?><i class="lnr lnr-pushpin"></i></a></li>
                                            <li><a href="#"><?php echo $row['cityName']; ?><i class="lnr lnr-apartment"></i></a></li>
                                            <li> <a href="#"><i class="lnr lnr-calendar-full"></i> <?php echo $jalali; ?></a></li>
                                        </ul>
                                    </div>
                               </div>
                                <div class="col-md-9">
                                    <div class="blog_post">
                                        <img src="<?php echo $image; ?>" alt="">
                                        <div class="blog_details">
                                            <a href="single.php?id=<?php echo $row['taId'] ?>&name=<?php echo $row['taName'] ?>"><h2><?php echo $row['taName']; ?></h2></a>
                                            <p><?php echo substr($row['description'],0, 160); ?> ...</p>
                                            <a href="single.php?id=<?php echo $row['taId'] ?>&name=<?php echo $row['taName'] ?>" class="view_btn button_hover">بیشتر بخوانید</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <?php
                            }
                            ?>

                            <!--<nav class="blog-pagination justify-content-center d-flex">
		                        <ul class="pagination">
		                            <li class="page-item">
		                                <a href="#" class="page-link" aria-label="Previous">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-right"></span>
		                                    </span>
		                                </a>
		                            </li>
		                            <li class="page-item"><a href="#" class="page-link">01</a></li>
		                            <li class="page-item active"><a href="#" class="page-link">02</a></li>
		                            <li class="page-item"><a href="#" class="page-link">03</a></li>
		                            <li class="page-item"><a href="#" class="page-link">04</a></li>
		                            <li class="page-item"><a href="#" class="page-link">09</a></li>
		                            <li class="page-item">
		                                <a href="#" class="page-link" aria-label="Next">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-left"></span>
		                                    </span>
		                                </a>
		                            </li>
		                        </ul>
		                    </nav>-->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single-sidebar-widget tag_cloud_widget">
                                <h4 class="widget_title">شهرهای استان <?php echo $_GET['name']; ?></h4>
                                <ul class="list_style">
                                    <?php
                                    $province_id = $_GET['id'];
                                    $conn = $pdo->open();

                                    try{
                                    $stmt = $conn->prepare("SELECT * FROM cities WHERE province_id = $province_id");
                                    $stmt->execute();
                                    foreach ($stmt as $row) {
                                        ?>
                                        <li>
                                            <a href="cities-details.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>"><?php echo $row['name'] ?></a>
                                        </li>
                                    <?php
                                    }
                                    }
                                    catch(PDOException $e){
                                        echo "خطا در برقراری ارتباط: " . $e->getMessage();
                                    }

                            $pdo->close();

                            ?>

                                </ul>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->


        <!--================ start footer Area  =================-->
        <?php include_once 'includes/footer.php'?>
		<!--================ End footer Area  =================-->


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <?php include_once 'includes/script.php'?>
    </body>
</html>
