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
                        <h3 class="page-title">Contact</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Contact</li>
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

                    <div class="table-responsive">
                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select_contact = runFatch("SELECT * FROM tbl_contact ORDER BY id DESC");
                                $count = 1;
                                if ($select_contact) {
                                    foreach ($select_contact as $contact) {
                                ?>
                                        <tr id="removeContactDelete_<?= @$contact['id'] ?>">
                                            <td><?= $count++ ?></td>
                                            <td><?= @$contact['name'] ?></td>
                                            <td><?= @$contact['email'] ?></td>
                                            <td><?= @$contact['phone'] ?></td>
                                            <td><?= @$contact['subject'] ?></td>
                                            <td><?= @$contact['message'] ?></td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="javascript:void(0);" title="Delete" class="btn btn-sm bg-danger-light deleteContact" data-files="" data-remove="#removeContactDelete_<?= @$contact['id'] ?>" data-collection="contact" data-ref_id="<?= @$contact['id'] ?>"> <i class="feather-trash"></i></a>
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