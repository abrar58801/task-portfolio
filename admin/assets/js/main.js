// admin login start 
deleteData('.deleteSeller');
changeStatus('.statusSeller');
$(document).on('submit', '#admin_login', function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    $.ajax({
        url: './inc/config/class/auth.php',
        type: 'POST',
        data: formData,
        success: res => {
            res = JSON.parse(res);

            if (res.status == 100) {
                swamsg.success(res.msg);
                setTimeout(() => {
                    location.assign('./');
                }, 1500);
            } else {
                swamsg.error(res.msg);
            }
        },
        contentType: false,
        processData: false
    })
});
// admin login start 

deleteData('.deleteContact');


// Admin register start
$("#admin_register").submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);

    $.ajax({
        url: './inc/config/admin_update.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
            const res = JSON.parse(data);
            if (res.status == 100) {
                $("#admin_register").trigger('reset');
                swamsg.success(res.msg);
            } else if (res.status == 102) {
                swamsg.success(res.msg);
            } else {
                swamsg.error(res.msg);
            }
        },
    });
});
// Admin register end


// register user start 
deleteData('.deleteUser');
changeStatus('.statusUser');
$("#register_user").submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);

    $.ajax({
        url: './inc/config/user_register.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
            const res = JSON.parse(data);
            if (res.status == 100) {
                $("#register_user").trigger('reset');
                swamsg.success(res.msg);
            } else if (res.status == 102) {
                swamsg.success(res.msg);
            } else {
                swamsg.error(res.msg);
            }
        },
    });
});
// user end

// Gallery add start 
deleteData('.deleteGallery');
changeStatus('.statusGallery');
$("#gallery_submit").submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);

    $.ajax({
        url: './inc/config/gallery_submit.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
            const res = JSON.parse(data);
            if (res.status == 100) {
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
                swamsg.success(res.msg);
            } else if (res.status == 102) {
                swamsg.success(res.msg);
            } else {
                swamsg.error(res.msg);
            }
        },
    });
});
// Gallery add end


// Website setting add start 
$("#website_setting_submit").submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);

    $.ajax({
        url: './inc/config/website_setting_submit.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
            const res = JSON.parse(data);
            if (res.status == 100) {
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
                swamsg.success(res.msg);
            } else if (res.status == 102) {
                swamsg.success(res.msg);
            } else {
                swamsg.error(res.msg);
            }
        },
    });
});
// Website setting add end

// forgot_pass add start 
$("#forgot_pass_submit").submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);

    // Show loader while waiting for response
    $('.loader-container').fadeIn(); // Show loader

    $.ajax({
        url: './inc/config/forgot_pass_submit.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
            const res = JSON.parse(data);
            if (res.status == 100) {
                // Hide loader on success
                $('.loader-container').fadeOut(); // Hide loader
                swamsg.success(res.msg);
            } else {
                // Hide loader on error
                $('.loader-container').fadeOut(); // Hide loader
                swamsg.error(res.msg);
            }
        },
    });
});
// forgot_pass add end

// reset_pass add start 
$("#reset_pass_submit").submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);

    $.ajax({
        url: './inc/config/reset_pass_submit.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data, status) {
            const res = JSON.parse(data);
            if (res.status == 100) {
                setTimeout(function () {
                    window.location.assign(`./login.php`);
                }, 1500);
                swamsg.success(res.msg);
            } else {
                swamsg.error(res.msg);
            }
        },
    });
});
// reset_pass add end

