<?php
require "./inc/head.php";
require "./inc/headbar.php";
require "./inc/sidebar.php";

if (isset($_GET['gallery_id']) && !empty($_GET['gallery_id'])) {
    $gallery_id = $_GET['gallery_id'];

    $select_gallery = runFatch("SELECT * FROM tbl_gallery WHERE id = '{$gallery_id}'");
}
?>

<!-- Page Wrapper -->
<div class="page-wrapper">

    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Gallery Edit</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="./gallery.php">Gallery</a></li>
                            <li class="breadcrumb-item active">Gallery Edit</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Overview Section -->
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">

                    <form id="gallery_submit">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title student-info">Gallery Information</h5>
                            </div>

                            <input type="hidden" name="hidden_id" value="<?= @$select_gallery[0]['id'] ?>">


                            <div class="col-md-12">
                                <div class="form-group local-forms">
                                    <label>Title <span class="login-danger">*</span></label>
                                    <input name="title" type="text" class="form-control" placeholder="Title" value="<?= @$select_gallery[0]['title'] ?>">
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <input type="hidden" name="hidden_image" value="<?= @$select_gallery[0]['image'] ?>">

                                <label for="image" class="mb-1">Image</label>
                                <div class="uploadOuter mb-3">
                                    <span class="dragBox">
                                        Darg and Drop image here
                                        <input type="file" name="image" onChange="dragNdrop(event)" ondragover="drag()" ondrop="drop()" id="uploadFile" />
                                    </span>
                                </div>
                                <div id="preview">
                                    <?php
                                    if (isset($select_gallery[0]['image']) && !empty($select_gallery[0]['image'])) {
                                    ?>
                                        <img src="../upload/<?= @$select_gallery[0]['image'] ?>" alt="image-priview">
                                    <?php
                                    } else {
                                    ?>
                                        <img src="./assets/img/demo.png" alt="image-priview">
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