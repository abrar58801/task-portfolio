<?php
require "./inc/head.php";
require "./inc/headbar.php";
require "./inc/sidebar.php";

if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $select_user = runFatch("SELECT * FROM tbl_admin WHERE id = '{$user_id}'");
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
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
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
                    
                    <form id="admin_register">
                        <div class="row">

                            <input type="hidden" name="hidden_id" value="<?= @$select_user[0]['id'] ?>">

                            <div class="col-12 mb-3">
                                <input type="hidden" name="hidden_profile" value="<?= @$select_user[0]['profile'] ?>">

                                <label for="image" class="mb-1">Profile Image</label>
                                <div class="uploadOuter mb-3">
                                    <span class="dragBox">
                                        Darg and Drop image here
                                        <input type="file" name="profile" onChange="dragNdrop(event)" ondragover="drag()" ondrop="drop()" id="uploadFile" />
                                    </span>
                                </div>
                                <div id="preview">
                                    <?php
                                    if (isset($select_user[0]['profile']) && !empty($select_user[0]['profile'])) {
                                    ?>
                                        <img src="../upload/<?= @$select_user[0]['profile'] ?>" alt="image-priview">
                                    <?php
                                    } else {
                                    ?>
                                        <img src="./assets/img/demo.png" alt="image-priview">
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group local-forms">
                                    <label>Name <span class="login-danger">*</span></label>
                                    <input name="name" type="text" class="form-control" placeholder="Name" value="<?= @$select_user[0]['name'] ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group local-forms">
                                    <label>Phone <span class="login-danger">*</span></label>
                                    <input name="phone" type="number" class="form-control" placeholder="Phone" value="<?= @$select_user[0]['phone'] ?>">
                                </div>
                            </div>

                            <?php
                            if (isset($select_user[0]['username']) && !empty($select_user[0]['username'])) {
                                echo "";
                            } else {
                            ?>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>Username <span class="login-danger">*</span></label>
                                        <input name="username" type="text" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                            <?php
                            if (isset($select_user[0]['password']) && !empty($select_user[0]['password'])) {
                                echo "";
                            } else {
                            ?>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label>Password <span class="login-danger">*</span></label>
                                        <input name="password" type="text" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                            <div class="col-md-6">
                                <div class="form-group local-forms">
                                    <label>State <span class="login-danger">*</span></label>
                                    <select name="state" class="form-control" id="select_state">
                                        <option value="">Select State</option>
                                        <?php
                                        $select_state = runFatch("SELECT * FROM tbl_states");

                                        if ($select_state) {
                                            foreach ($select_state as $state) {
                                                $selected = @$select_user[0]['state'] == $state['id'] ? "selected" : "";
                                        ?>
                                                <option value="<?= $state['id'] ?>" <?= $selected ?>><?= $state['name'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group local-forms" id="city_div" style="display: none;">
                                    <label>City <span class="login-danger">*</span></label>
                                    <select name="city" class="form-control" id="select_city" style="display: none;">
                                        <option value="">Select City</option>
                                        <?php
                                        $select_cities = runFatch("SELECT * FROM tbl_cities");
                                        print_r($select_cities);
                                        if ($select_cities) {
                                            foreach ($select_cities as $cities) {
                                                $selected = $select_user[0]['city'] == $cities['city'] ? 'selected' : '';
                                        ?>
                                                <option <?= $selected ?> value="<?= $cities['city'] ?>">
                                                    <?= $cities['city'] ?>
                                                </option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group local-forms">
                                    <label>Address <span class="login-danger">*</span></label>
                                    <textarea name="address" class="form-control" cols="30" rows="4"><?= @$select_user[0]['address'] ?></textarea>
                                </div>
                            </div>

                            <!-- <div class="col-md-6 mb-3">
                                <input type="hidden" name="hidden_hospital_cir1" value="<?= @$select_user[0]['hospital_cir1'] ?>">

                                <label for="image" class="mb-1">Medical Cirtificate 1 (Optional)</label>
                                <div class="uploadOuter2 mb-3">
                                    <span class="dragBox2">
                                        Darg and Drop image here
                                        <input type="file" name="hospital_cir1" onChange="dragNdrop2(event)" ondragover="drag2()" ondrop="drop2()" id="uploadFile2" />
                                    </span>
                                </div>
                                <div id="preview2">
                                    <?php
                                    if (isset($select_user[0]['hospital_cir1']) && !empty($select_user[0]['hospital_cir1'])) {
                                    ?>
                                        <img src="../upload/<?= @$select_user[0]['hospital_cir1'] ?>" alt="image-priview">
                                    <?php
                                    } else {
                                    ?>
                                        <img src="./assets/img/demo.png" alt="image-priview">
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <input type="hidden" name="hidden_hospital_cir2" value="<?= @$select_user[0]['hospital_cir2'] ?>">

                                <label for="image" class="mb-1">Medical Cirtificate 2 (Optional)</label>
                                <div class="uploadOuter3 mb-3">
                                    <span class="dragBox3">
                                        Darg and Drop image here
                                        <input type="file" name="hospital_cir2" onChange="dragNdrop3(event)" ondragover="drag3()" ondrop="drop3()" id="uploadFile3" />
                                    </span>
                                </div>
                                <div id="preview3">
                                    <?php
                                    if (isset($select_user[0]['hospital_cir2']) && !empty($select_user[0]['hospital_cir2'])) {
                                    ?>
                                        <img src="../upload/<?= @$select_user[0]['hospital_cir2'] ?>" alt="image-priview">
                                    <?php
                                    } else {
                                    ?>
                                        <img src="./assets/img/demo.png" alt="image-priview">
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div> -->

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

    <script>
        $(document).on('change', '#select_state', function() {
            const state = $(this).val();

            $.ajax({
                url: './inc/config/get-city.php',
                type: "POST",
                data: {
                    state
                },
                success: function(response) {
                    const res_json = JSON.parse(response);
                    console.log(state);
                    $('#select_city').hide();
                    let options = '';
                    if (res_json.length) {
                        res_json.forEach(data => {
                            options += `<option value='${data.city}' >${data.city}</option>`;
                        });
                        $('#city_div').show(300);
                        $('#select_city').show(300).html(options);
                    }
                }
            });
        });

        window.onload = function() {
            const selectState = document.querySelector('#select_state');
            const selectCity = document.querySelector('#select_city');
            const selectCityMain = document.querySelector('#city_div');

            const stateValue = selectState.value;
            if (stateValue) {
                selectCityMain.style.display = 'block';
                selectCity.style.display = 'block';
            } else {
                selectCityMain.style.display = 'none';
                selectCity.style.display = 'none';
            }
        };
    </script>