<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header">

            <!-- Logo -->
            <div class="header-left">
                <a href="index.php" class="logo mx-auto">
                    <img src="../upload/<?= @$select_website_setting[0]['favicon'] ?>" alt="Logo">
                </a>
                <a href="index.php" class="logo logo-small">
                    <img src="../upload/<?= @$select_website_setting[0]['favicon'] ?>" alt="Logo" width="30" height="30">
                </a>
            </div>
            <!-- /Logo -->

            <div class="menu-toggle">
                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fas fa-bars"></i>
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>
            <!-- /Mobile Menu Toggle -->

            <!-- Header Right Menu -->
            <ul class="nav user-menu">
                <!-- User Menu -->
                <li class="nav-item dropdown has-arrow new-user-menus">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <div class="user-img">
                            <?php
                            $select_admin = runFatch("SELECT * FROM tbl_admin WHERE id = '{$_SESSION['admin_id']}' ");

                            $user_profile = $select_admin[0]['profile'];
                            if ($user_profile) {
                            ?>
                                <img class="rounded-circle" src="../upload/<?= $select_admin[0]['profile'] ?>" width="31" alt="<?= $select_admin[0]['name'] ?>">
                            <?php
                            } else {
                            ?>
                                <img class="rounded-circle" src="./assets/img/profiles/avatar-01.jpg" width="31" alt="avtar">
                            <?php
                            }
                            ?>
                            <div class="user-text">
                                <h6><?= $select_admin[0]['name'] ?></h6>
                                <p class="text-muted mb-0">
                                    Admin
                                </p>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <?php
                                $user_profile = $select_admin[0]['profile'];
                                if ($user_profile) {
                                ?>
                                    <img src="../upload/<?= $select_admin[0]['profile'] ?>" alt="User Image" class="avatar-img rounded-circle">
                                <?php
                                } else {
                                ?>
                                    <img src="./assets/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle">
                                <?php
                                }
                                ?>
                            </div>
                            <div class="user-text">
                                <h6><?= $select_admin[0]['name'] ?></h6>
                                <p class="text-muted mb-0">
                                    Admin
                                </p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="profile.php?admin_id=<?= $select_admin[0]['id'] ?>">My Profile</a>
                        <a class="dropdown-item" href="./logout.php">Logout</a>
                    </div>
                </li>
                <!-- /User Menu -->

            </ul>
            <!-- /Header Right Menu -->

        </div>
        <!-- /Header -->