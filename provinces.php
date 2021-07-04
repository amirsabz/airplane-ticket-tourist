<?php include_once 'includes/session.php'; ?>
<?php include_once "includes/header.php"; ?>

        <!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area blog_banner_two">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle f_48">استان ها</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">صفحه اصلی</a></li>
                        <li class="active">استان ها</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->

			<!-- Start Button -->
			<section class="button-area">
				<div class="container border-top-generic">
					<h3 class="text-heading title_color">لیست استان ها</h3>
                    <p>برای مشاهده جاذبه های گردشگری، هتل ها، رستوران ها و ... هر استان بر روی نام استان موردنظر کلیک کنید</p>
                    <div class="row mt-10">
                        <?php
                        $conn = $pdo->open();

                        try{
                            $stmt = $conn->prepare("SELECT * FROM provinces");
                            $stmt->execute();
                           $provinces = $stmt->fetchAll();
                        }
                        catch(PDOException $e){
                            echo "خطا در برقراری ارتباط: " . $e->getMessage();
                        }
                        ?>
                        <?php
                        foreach ($provinces as  $key => $row) {
                        if ($key ==4) {
                            break;
                        }
                        ?>
                             <div class="col-md-3">
                                 <a href="provinces-details.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>"
                                    class="genric-btn success e-large btn-block"><?php echo $row['name'] ?></a>
                             </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="row mt-10">
                        <?php
                        foreach ($provinces as  $key => $row) {
                            if ($key >= 4 && $key <= 7) {
                        ?>
                                <div class="col-md-3">
                                    <a href="provinces-details.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>"
                                       class="genric-btn success e-large btn-block"><?php echo $row['name'] ?></a>
                                </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                    <div class="row mt-10">
                        <?php
                        foreach ($provinces as  $key => $row) {
                            if ($key >= 8 && $key <= 11) {
                                ?>
                                <div class="col-md-3">
                                    <a href="provinces-details.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>"
                                       class="genric-btn success e-large btn-block"><?php echo $row['name'] ?></a>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="row mt-10">
                        <?php
                        foreach ($provinces as  $key => $row) {
                            if ($key >= 12 && $key <= 15) {
                                ?>
                                <div class="col-md-3">
                                    <a href="provinces-details.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>"
                                       class="genric-btn success e-large btn-block"><?php echo $row['name'] ?></a>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="row mt-10">
                        <?php
                        foreach ($provinces as  $key => $row) {
                            if ($key >= 16 && $key <= 19) {
                                ?>
                                <div class="col-md-3">
                                    <a href="provinces-details.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>"
                                       class="genric-btn success e-large btn-block"><?php echo $row['name'] ?></a>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="row mt-10">
                        <?php
                        foreach ($provinces as  $key => $row) {
                            if ($key >= 20 && $key <= 23) {
                                ?>
                                <div class="col-md-3">
                                    <a href="provinces-details.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>"
                                       class="genric-btn success e-large btn-block"><?php echo $row['name'] ?></a>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="row mt-10">
                        <?php
                        foreach ($provinces as  $key => $row) {
                            if ($key >= 24 && $key <= 27) {
                                ?>
                                <div class="col-md-3">
                                    <a href="provinces-details.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>"
                                       class="genric-btn success e-large btn-block"><?php echo $row['name'] ?></a>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="row mt-10">
                        <?php
                        foreach ($provinces as  $key => $row) {
                            if ($key >= 28 && $key <= 31) {
                                ?>
                                <div class="col-md-3">
                                    <a href="provinces-details.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>"
                                       class="genric-btn success e-large btn-block"><?php echo $row['name'] ?></a>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>

				</div>
			</section>
			<!-- End Button -->
			<!-- Start Align Area -->

        <!--================ start footer Area  =================-->
        <?php include_once 'includes/footer.php'?>
		<!--================ End footer Area  =================-->


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <?php include_once 'includes/script.php'?>
    </body>
</html>
