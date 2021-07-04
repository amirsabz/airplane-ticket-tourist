<?php include_once 'includes/session.php'; ?>
<?php include_once 'includes/header.php'?>
<?php include_once 'functions/functions.php'?>
        <!--================Header Area =================-->

        <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="booking_table d_flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h6>رزرو بلیط پروازهای داخلی</h6>
						<h2>خدمات توریسیتی و جاذبه های گردشگری</h2>
					</div>
				</div>
            </div>
            <div class="hotel_booking_area position">
                <div class="container">
                    <div class="hotel_booking_table">
                        <div class="col-md-12">
                            <div class="boking_table">
                                <form id="manage-filter" action="flights.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="book_tabel_item">
                                                <div class="input-group">
                                                    <select name="departure_airport_id" id="departure_location" class="wide select1">
                                                        <option value=""></option>
                                                            <?php
                                                                $conn = $pdo->open();

                                                                try{
                                                                $stmt = $conn->prepare("SELECT * FROM airports order by name asc");
                                                                $stmt->execute();
                                                                foreach ($stmt as $row) {
                                                            ?>
                                                            <option value="<?php echo $row['id'] ?>" <?php echo isset($departure_airport_id) && $departure_airport_id == $row['id'] ? "selected" : '' ?>><?php echo $row['name'] ?></option>
                                                                    <?php
                                                                }
                                                                }
                                                                catch(PDOException $e){
                                                                    echo "خطا در برقراری ارتباط: " . $e->getMessage();
                                                                }
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="book_tabel_item">
                                                <div class="input-group">
                                                    <select name="arrival_airport_id" id="arrival_airport_id" class="wide select3">
                                                        <option value=""></option>
                                                        <?php
                                                        $conn = $pdo->open();

                                                        try{
                                                            $stmt = $conn->prepare("SELECT * FROM airports order by name asc");
                                                            $stmt->execute();
                                                            foreach ($stmt as $row) {
                                                                ?>
                                                                <option value="<?php echo $row['id'] ?>" <?php echo isset($arrival_airport_id) && $arrival_airport_id == $row['id'] ? "selected" : '' ?>><?php echo $row['name'] ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        catch(PDOException $e){
                                                            echo "خطا در برقراری ارتباط: " . $e->getMessage();
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="book_tabel_item">
                                                <div class="form-group">
                                                    <div class='input-group date'>
                                                        <input type='text' class="form-control"  name="date" id='datetimepicker11' placeholder="تاریخ رفت"/>
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="book_tabel_item" id="rdate" style="display: none">
                                                <div class="form-group">
                                                    <div class='input-group date'>
                                                        <input type='text' class="form-control"  name="date_return" id='datetimepicker1' placeholder="تاریخ برگشت"/>
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="book_tabel_item">
                                                <div class="switch-wrap d-flex justify-content-between">

                                                    <div class="primary-radio">
                                                        <input type="radio" name="trip" id="onewway" value="1" checked>
                                                        <label for="onewway"></label>
                                                    </div>
                                                    <p>یک طرفه</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="book_tabel_item">
                                                <div class="switch-wrap d-flex justify-content-between">

                                                    <div class="primary-radio">
                                                        <input type="radio" name="trip" id="rtrip" value="2">
                                                        <label for="rtrip"></label>
                                                    </div>
                                                    <p>رفت و برگشت</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="margin-right: 41.6%;">
                                            <button class="book_now_btn button_hover" type="submit"> رزرو بلیط</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Banner Area =================-->

        <!--================ Latest Blog Area  =================-->
        <section class="latest_blog_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">آخرین مطالب سایت</h2>
                    <p>خدمات توریسیتی اعم از گردشگری، مکان های تفریحی، حمل و نقل، هتل، رستوران و خدمات درمانی </p>
                </div>
                <div class="row mb_30">
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
                    <div class="col-lg-4 col-md-6">
                        <div class="single-recent-blog-post">
                            <div class="thumb">
                                <img class="img-fluid" src="<?php echo $image; ?>" alt="post">
                            </div>
                            <div class="details">
                                <div class="tags">
                                    <a href="#" class="button_hover tag_btn"><?php echo $row['touristAttractionsCatName']; ?></a>
                                    <a href="#" class="button_hover tag_btn"><?php echo $row['cityName']; ?></a>
                                </div>
                                <a href="single.php?id=<?php echo $row['touristAttractionsId'] ?>&name=<?php echo $row['touristAttractionsName'] ?>"><h4 class="sec_h4"><?php echo $row['touristAttractionsName']; ?></h4></a>
                                <p><?php echo substr($row['description'],0, 160); ?> ...</p>
                                <h6 class="date title_color"><?php echo $jalali; ?></h6>
                            </div>
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
                </div>
            </div>
        </section>
        <!--================ Recent Area  =================-->

        <!--================ start footer Area  =================-->
        <?php include_once 'includes/footer.php'?>
		<!--================ End footer Area  =================-->


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <?php include_once 'includes/script.php'?>

        <script>

            $('.view_prod').click(function(){
                uni_modal_right('Product','view_prod.php?id='+$(this).attr('data-id'))
            })
            $('.select1').select2({
                placeholder:'شهر مبدأ',
                width:'100%'
            });
            $('.select3').select2({
                placeholder:'شهر مقصد',
                width:'100%'
            });
            $('[name="trip"]').on("keypress change keyup",function(){
                if($(this).val() == 1){
                    $('#rdate').hide()
                }else{
                    $('#rdate').show()
                }
            });

            $('#datetimepicker11').persianDatepicker({
                altField: '#datetimepicker11',
                altFormat: "YYYY/MM/DD",
                observer: true,
                format: 'YYYY/MM/DD',
                initialValue: false,
                initialValueType: 'persian',
                autoClose: true,
                //maxDate: 'today',
            });

            $('#datetimepicker1').persianDatepicker({
                altField: '#datetimepicker11',
                altFormat: "YYYY/MM/DD",
                observer: true,
                format: 'YYYY/MM/DD',
                initialValue: false,
                initialValueType: 'persian',
                autoClose: true,
                //maxDate: 'today',
            });
        </script>
    </body>
</html>
