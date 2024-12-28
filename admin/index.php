<?php
require "./inc/head.php";
require "./inc/headbar.php";
require "./inc/sidebar.php";
?>

<!-- Page Wrapper -->
<div class="page-wrapper">

    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Welcome <?= $_SESSION['admin_name'] ?>!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Overview Section -->
        <div class="row">

            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Gallery</h6>
                                <h3>
                                    <?php
                                    $select_gallery = runFatch("SELECT COUNT(*) AS total_count FROM tbl_gallery");
                                    print_r($select_gallery[0]['total_count']);
                                    ?>
                                </h3>
                            </div>
                            <div class="db-icon text-primary">
                                <i class="fa-solid fa-photo-film"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Contact</h6>
                                <h3>
                                    <?php
                                    $select_contact = runFatch("SELECT COUNT(*) AS total_count FROM tbl_contact");
                                    print_r($select_contact[0]['total_count']);
                                    ?>
                                </h3>
                            </div>
                            <div class="db-icon text-primary">
                                <i class="fa-regular fa-envelope"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /Overview Section -->
    </div>

    <?php
    require "./inc/footer.php";
    require "./inc/script.php";
    ?>