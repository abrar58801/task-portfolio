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
                        <h3 class="page-title">Gallery</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Gallery</li>
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
                    <div class="text-end mb-4">
                        <a href="./add-gallery.php" class="btn btn-primary"><i class="fas fa-edit"></i> Add Gallery</a>
                    </div>

                    <div class="table-responsive">
                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Added Date</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select_gallery = runFatch("SELECT * FROM tbl_gallery ORDER BY id DESC");
                                $count = 1;
                                if ($select_gallery) {
                                    foreach ($select_gallery as $gallery) {
                                ?>
                                        <tr id="removeGalleryDelete_<?= @$gallery['id'] ?>">
                                            <td><?= $count++ ?></td>
                                            <td>
                                                <a class="avatar avatar-sm me-2"><img class="avatar-img" src="../upload/<?= @$gallery['image'] ?>" alt="Image"></a>
                                            </td>
                                            <td><?= @$gallery['title'] ?></td>
                                            <td><?= @$gallery['date'] ?></td>
                                            <td class="d-flex align-items-center pt-3">
                                                <input type="checkbox" id="switch<?= $count ?>" <?php if (@$gallery['status'] == 1) echo 'checked' ?: '' ?> data-switch="bool" data-collection="gallery" data-ref_id="<?= @$gallery['id'] ?>" class="statusGallery" />
                                                <label for="switch<?= $count ?>" data-on-label="On" data-off-label="Off"></label>
                                            </td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="./add-gallery.php?gallery_id=<?= @$gallery['id'] ?>" class="btn btn-sm bg-danger-light" title="Edit">
                                                        <i class="feather-edit"></i>
                                                    </a>

                                                    <a href="javascript:void(0);" title="Delete" class="btn btn-sm bg-danger-light deleteGallery" data-files="image" data-remove="#removeGalleryDelete_<?= @$gallery['id'] ?>" data-collection="gallery" data-ref_id="<?= @$gallery['id'] ?>"> <i class="feather-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
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