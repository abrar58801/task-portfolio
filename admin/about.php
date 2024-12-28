<?php
require "./inc/head.php";
require "./inc/headbar.php";
require "./inc/sidebar.php";

$select_about = runFatch("SELECT * FROM tbl_about");
?>

<!-- Page Wrapper -->
<div class="page-wrapper">

    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">About</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">About</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Overview Section -->
        <div class="row">
            <div class="card">
                <div class="card-body">

                    <form id="about_submit">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title student-info">About Information</h5>
                            </div>

                            <input type="hidden" name="hidden_id" value="<?= @$select_about[0]['id'] ?>">

                            <div class="col-md-12">
                                <div class="form-group local-forms">
                                    <label>About Title <span class="login-danger">*</span></label>
                                    <input name="about_title" type="text" class="form-control" placeholder="About Title" value="<?= @$select_about[0]['about_title'] ?>">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group local-forms">
                                    <label>About Description <span class="login-danger">*</span></label>
                                    <textarea name="about_des" class="form-control" placeholder="About Description"><?= @$select_about[0]['about_des'] ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <input type="hidden" name="hidden_about_image" value="<?= @$select_about[0]['about_image'] ?>">

                                <label for="about_image" class="mb-1">About Image <span class="text-danger">*</span></label>
                                <div class="uploadOuter mb-3">
                                    <span class="dragBox">
                                        Darg and Drop About image here
                                        <input type="file" name="about_image" onChange="dragNdrop(event)" ondragover="drag()" ondrop="drop()" id="uploadFile" />
                                    </span>
                                </div>
                                <div id="preview">
                                    <?php
                                    if (isset($select_about[0]['about_image']) && !empty($select_about[0]['about_image'])) {
                                    ?>
                                        <img src="../upload/<?= @$select_about[0]['about_image'] ?>" alt="about_image-priview">
                                    <?php
                                    } else {
                                    ?>
                                        <img src="./assets/img/demo.png" alt="about_image-priview">
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- /Overview Section -->
    </div>

    <?php
    require "./inc/footer.php";
    require "./inc/script.php";
    ?>