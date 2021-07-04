<?php include_once 'includes/session.php'; ?>
<?php include_once 'includes/header.php'?>
<?php include_once 'functions/functions.php'?>


<!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area blog_banner_two">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle f_48"><?php echo $_GET['name']; ?></h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">خانه</a></li>
                        <li class="active"><?php echo $_GET['name']; ?></li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->

        <!--================Blog Area =================-->
        <section class="blog_area single-post-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
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
		 								WHERE ta.id=:id");

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
                        <div class="single-post row">
                            <div class="col-lg-12">
                                <div class="feature-img">
                                    <img class="img-fluid" src="<?php echo $image; ?>" alt="">
                                </div>
                            </div>
                            <div class="col-lg-3  col-md-3">
                                <div class="blog_info text-right">

                                    <ul class="blog_meta list_style">
                                        <li><a href="#"><?php echo $row['tacName']; ?><i class="lnr lnr-pushpin"></i></a></li>
                                        <li><a href="#"><?php echo $row['cityName']; ?><i class="lnr lnr-apartment"></i></a></li>
                                        <li> <a href="#"><i class="lnr lnr-calendar-full"></i> <?php echo $jalali; ?></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 blog_details">
                                <h2><?php echo $row['taName']; ?></h2>
                                <p class="excert">
                                    <?php echo $row['description']; ?>
                                </p>

                            </div>
                            <div class="col-lg-12">
                                <div class="quotes">
                                    <h3>آدرس: <?php echo $row['address']; ?></h3>
                                </div>
                                <!--<div class="row">
                                    <div class="col-6">
                                        <img class="img-fluid" src="image/blog/post-img1.jpg" alt="">
                                    </div>
                                    <div class="col-6">
                                        <img class="img-fluid" src="image/blog/post-img2.jpg" alt="">
                                    </div>

                                </div>-->
                            </div>
                        </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">آخرین مطالب سایت</h3>
                                <?php
                                $conn = $pdo->open();

                                try{
                                $stmt = $conn->prepare("SELECT ta.id as touristAttractionsId, ta.name as touristAttractionsName, ta.description, ta.address,
                                                    ta.photo, ta.slug, ta.created_at,
                                                    tac.id as touristAttractionsCatId, tac.name as touristAttractionsCatName, tac.cat_slug,     
                                                    c.id as cityId, c.name as cityName
                                                    FROM tourist_attractions as ta
                                                    INNER JOIN tourist_attractions_cat as tac
                                                    ON ta.tourist_attractions_cat_id = tac.id
                                                    INNER JOIN cities as c
                                                    ON ta.city_id = c.id     
                                                    LIMIT 6
                                                    ");
                                $stmt->execute();
                                foreach ($stmt as $row) {
                                $image = (!empty($row['photo'])) ? 'image/' . $row['photo'] : 'image/noimage.jpg';

                                $s = $row['created_at'];
                                $dt = new DateTime($s);
                                $date = $dt->format('m/d/Y');

                                $jalali = gregorian_to_jalali(date("Y", strtotime($date)),date("m", strtotime($date)),date("d", strtotime($date)),$mod='-');
                                $jalali = convertNumbers($jalali , true);
                                ?>
                                <div class="media post_item">
                                    <img src="<?php echo $image; ?>" style="width: 100px; height: 60px;" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html"><h3><?php echo $row['touristAttractionsName']; ?></h3></a>
                                        <p><?php echo $jalali; ?></p>
                                    </div>
                                </div>
                                    <?php
                                }
                                }
                                catch(PDOException $e){
                                    echo "خطا در برقراری ارتباط: " . $e->getMessage();
                                }

                                $pdo->close();

                                ?>
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">خدمات و جاذبه های گردشگری</h4>
                                <ul class="list_style cat-list">
                                    <?php
                                    $conn = $pdo->open();

                                    try{
                                    $stmt = $conn->prepare("SELECT * FROM tourist_attractions_cat");
                                    $stmt->execute();
                                    foreach ($stmt as $row) {
                                    ?>
                                    <li>
                                        <a href="tourist-attractions-details.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>" class="d-flex justify-content-between">
                                            <p><?php echo $row['name'] ?></p>
                                        </a>
                                    </li>
                                    <?php
                                    }
                                    }
                                    catch(PDOException $e){
                                        echo "خطا در برقراری ارتباط: " . $e->getMessage();
                                    }
                                    ?>
                                </ul>
                                <div class="br"></div>
                            </aside>
                            <aside class="single-sidebar-widget tag_cloud_widget">
                                <h4 class="widget_title">استان ها</h4>
                                <ul class="list_style">
                                    <?php
                                    $conn = $pdo->open();

                                    try{
                                    $stmt = $conn->prepare("SELECT * FROM provinces");
                                    $stmt->execute();
                                    foreach ($stmt as $row) {
                                    ?>
                                    <li><a href="provinces-details.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>"><?php echo $row['name'] ?></a></li>
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
