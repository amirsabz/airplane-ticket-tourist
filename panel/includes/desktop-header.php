<!-- HEADER DESKTOP-->
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">

                <div class="header-button">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="<?php echo (!empty($admin['photo'])) ? '../image/'.$admin['photo'] : '../image/profile.jpg'; ?>" alt="ImanRaiesi" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#"><?php echo $admin['firstname'].' '.$admin['lastname']; ?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="<?php echo (!empty($admin['photo'])) ? '../image/'.$admin['photo'] : '../image/profile.jpg'; ?>" alt="ImanRaiesi" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#"><?php echo $admin['firstname'].' '.$admin['lastname']; ?></a>
                                        </h5>
                                        <span class="email"><?php echo $admin['email']; ?></span>
                                    </div>
                                </div>

                                <div class="account-dropdown__footer">
                                    <a href="../logout.php">
                                        <i class="zmdi zmdi-power"></i>خروج</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ml-4">
                    <a href="#profile" data-toggle="modal" class="btn btn-secondary btn-sm" id="admin_profile">
                        ویرایش پروفایل</a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- HEADER DESKTOP-->
<?php include 'includes/profile_modal.php'; ?>
