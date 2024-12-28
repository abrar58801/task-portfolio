<?php
require './inc/head.php';
require './inc/header.php';
?>

<style>
    /* contact start */
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");

    .contact_form .container {
        position: relative;
        width: 100%;
        min-height: 100vh;
        padding: 2rem;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }

    .contact_form .form {
        width: 100%;
        max-width: 820px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.1);
        z-index: 11;
        overflow: hidden;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
    }

    .contact_form p{
        color: #000;
    }
    .contact_form .contact-form {
        background-color: #1abc9c;
        position: relative;
    }

    .contact_form .circle {
        border-radius: 50%;
        background: linear-gradient(to bottom, #19a6ab, #19a6ab);
        position: absolute;
    }

    .contact_form .circle.one {
        width: 130px;
        height: 130px;
        top: 130px;
        right: -40px;
    }

    .contact_form .circle.two {
        width: 80px;
        height: 80px;
        top: 10px;
        right: 30px;
    }

    .contact_form .contact-form:before {
        content: "";
        position: absolute;
        width: 26px;
        height: 26px;
        background-color: #1abc9c;
        transform: rotate(45deg);
        top: 50px;
        left: -13px;
    }

    .contact_form form {
        padding: 2.3rem 2.2rem;
        z-index: 10;
        overflow: hidden;
        position: relative;
    }

    .contact_form .title22 {
        color: #fff;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
        margin-bottom: 0.7rem;
    }

    .contact_form .input-container {
        position: relative;
        margin: 1rem 0;
    }

    .contact_form .input {
        width: 100%;
        outline: none;
        border: 2px solid #fafafa;
        background: none;
        padding: 0.6rem 1.2rem;
        color: #fff;
        font-weight: 500;
        font-size: 0.95rem;
        letter-spacing: 0.5px;
        border-radius: 5px;
        transition: 0.3s;
    }

    .contact_form textarea.input {
        padding: 0.8rem 1.2rem;
        min-height: 150px;
        border-radius: 5px;
        resize: none;
        overflow-y: auto;
    }

    .contact_form .input-container label {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        padding: 0 0.4rem;
        color: #fafafa;
        font-size: 0.9rem;
        font-weight: 400;
        pointer-events: none;
        z-index: 1000;
        transition: 0.5s;
    }

    .contact_form .input-container.textarea label {
        top: 1rem;
        transform: translateY(0);
    }

    .contact_form .btn {
        padding: 0.6rem 1.3rem;
        background-color: #fff;
        border: 2px solid #fafafa;
        font-size: 0.95rem;
        color: #1abc9c;
        line-height: 1;
        border-radius: 5px;
        outline: none;
        cursor: pointer;
        transition: 0.3s;
        margin: 0;
        width: 100%;
    }

    .contact_form .btn:hover {
        background-color: transparent;
        color: #fff;
    }

    .contact_form .input-container span {
        position: absolute;
        top: 0;
        left: 25px;
        transform: translateY(-50%);
        font-size: 0.8rem;
        padding: 0 0.4rem;
        color: transparent;
        pointer-events: none;
        z-index: 500;
    }

    .contact_form .input-container span:before,
    .contact_form .input-container span:after {
        content: "";
        position: absolute;
        width: 10%;
        opacity: 0;
        transition: 0.3s;
        height: 5px;
        background-color: #1abc9c;
        top: 50%;
        transform: translateY(-50%);
    }

    .contact_form .input-container span:before {
        left: 50%;
    }

    .contact_form .input-container span:after {
        right: 50%;
    }

    .contact_form .input-container.focus label {
        top: 0;
        transform: translateY(-50%);
        left: 25px;
        font-size: 0.8rem;
    }

    .contact_form .input-container.focus span:before,
    .contact_form .input-container.focus span:after {
        width: 50%;
        opacity: 1;
    }

    .contact_form .contact-info {
        padding: 2.3rem 2.2rem;
        position: relative;
    }

    .contact_form .contact-info .title22 {
        color: #1abc9c;
    }

    .contact_form .text {
        color: #333;
        margin: 1.5rem 0 2rem 0;
    }

    .contact_form .information {
        display: flex;
        color: #555;
        margin: 0.7rem 0;
        align-items: center;
        font-size: 0.95rem;
    }

    .contact_form .information i {
        color: #1ABC9C;
    }

    .contact_form .icon {
        width: 28px;
        margin-right: 0.7rem;
    }

    .contact_form .social-media {
        padding: 2rem 0 0 0;
    }

    .contact_form .social-media p {
        color: #333;
    }

    .contact_form .social-icons {
        display: flex;
        margin-top: 0.5rem;
    }

    .contact_form .social-icons a {
        width: 35px;
        height: 35px;
        border-radius: 5px;
        background: linear-gradient(45deg, #1abc9c, #149279);
        color: #fff;
        text-align: center;
        line-height: 35px;
        margin-right: 0.5rem;
        transition: 0.3s;
    }

    .contact_form .social-icons a:hover {
        transform: scale(1.05);
    }

    .contact_form .contact-info:before {
        content: "";
        position: absolute;
        width: 110px;
        height: 100px;
        border: 22px solid #1abc9c;
        border-radius: 50%;
        bottom: -77px;
        right: 50px;
        opacity: 0.3;
    }

    .contact_form .big-circle {
        position: absolute;
        width: 500px;
        height: 500px;
        border-radius: 50%;
        background: linear-gradient(to bottom, #19a6ab, #19a6ab);
        bottom: 50%;
        right: 50%;
        transform: translate(-40%, 38%);
    }

    .contact_form .big-circle:after {
        content: "";
        position: absolute;
        width: 360px;
        height: 360px;
        background-color: #fafafa;
        border-radius: 50%;
        top: calc(50% - 180px);
        left: calc(50% - 180px);
    }

    .contact_form .square {
        position: absolute;
        height: 400px;
        top: 50%;
        left: 50%;
        transform: translate(181%, 11%);
        opacity: 0.2;
    }

    @media (max-width: 850px) {
        .contact_form .form {
            grid-template-columns: 1fr;
        }

        .contact_form .contact-info:before {
            bottom: initial;
            top: -75px;
            right: 65px;
            transform: scale(0.95);
        }

        .contact_form .contact-form:before {
            top: -13px;
            left: initial;
            right: 70px;
        }

        .contact_form .square {
            transform: translate(140%, 43%);
            height: 350px;
        }

        .contact_form .big-circle {
            bottom: 75%;
            transform: scale(0.9) translate(-40%, 30%);
            right: 50%;
        }

        .contact_form .text {
            margin: 1rem 0 1.5rem 0;
        }

        .contact_form .social-media {
            padding: 1.5rem 0 0 0;
        }
    }

    @media (max-width: 480px) {
        .contact_form .container {
            padding: 1.5rem;
        }

        .contact_form .contact-info:before {
            display: none;
        }

        .contact_form .square,
        .contact_form .big-circle {
            display: none;
        }

        .contact_form form,
        .contact_form .contact-info {
            padding: 1.7rem 1.6rem;
        }

        .contact_form .text,
        .contact_form .information,
        .contact_form .social-media p {
            font-size: 0.8rem;
        }

        .contact_form .title2 {
            font-size: 1.15rem;
        }

        .contact_form .social-icons a {
            width: 30px;
            height: 30px;
            line-height: 30px;
        }

        .contact_form .icon {
            width: 23px;
        }

        .contact_form .input {
            padding: 0.45rem 1.2rem;
        }

        .contact_form .btn {
            padding: 0.45rem 1.2rem;
        }
    }

    /* contact end  */

    /* sweet alert */
    .colored-toast.swal2-icon-success {
        background-color: #28a745 !important;
        color: #fff;
        width: 200px;
    }

    .colored-toast.swal2-icon-error {
        background-color: #dc3545 !important;
        color: #fff;
        width: 200px;
    }

    .swal2-popup.swal2-toast {
        padding: 10px !important;
    }

    .swal2-popup.swal2-toast .swal2-title {
        font-size: 16px !important;
        font-weight: 400;
    }
    /* sweet alert */
</style>

<div class="col-md-10 mx-auto contact_form">
    <div class="container">
        <span class="big-circle"></span>
        <div class="form">
            <div class="contact-info">
                <h3 class="title2">Let's get in touch</h3>
                <p class="text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
                    dolorum adipisci recusandae praesentium dicta!
                </p>

                <div class="info">
                    <div class="information">
                        <i class="fas fa-map-marker-alt"></i> &nbsp &nbsp

                        <p class="m-0"><?= @$select_website_setting[0]['address'] ?></p>
                    </div>
                    <div class="information">
                        <i class="fas fa-envelope"></i> &nbsp &nbsp
                        <p class="m-0"><?= @$select_website_setting[0]['email'] ?></p>
                    </div>
                    <div class="information">
                        <i class="fas fa-phone"></i>&nbsp&nbsp
                        <p class="m-0"><?= @$select_website_setting[0]['contact'] ?></p>
                    </div>
                </div>

                <div class="social-media">
                    <p>Connect with us :</p>
                    <div class="social-icons">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>

                <form id="contact_submit">
                    <h3 class="title2">Contact us</h3>
                    <div class="input-container">
                        <input type="text" name="name" class="input" />
                        <label for="">Name</label>
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" class="input" />
                        <label for="">Email</label>
                        <span>Email</span>
                    </div>
                    <div class="input-container">
                        <input type="tel" name="phone" class="input" />
                        <label for="">Phone</label>
                        <span>Phone</span>
                    </div>
                    <div class="input-container textarea">
                        <textarea name="message" class="input"></textarea>
                        <label for="">Message</label>
                        <span>Message</span>
                    </div>
                    <input type="submit" value="Send" class="btn" />
                </form>
            </div>
        </div>
    </div>

</div>

<?php
require './inc/footer.php';
require './inc/script.php';
?>
<!-- sweet alert -->
<script src="./admin/assets/js/onlinejs/jquery.min.js"></script>

<!-- sweet alert -->
<script src="./admin/assets/js/onlinejs/sweetalert.js"></script>


<script>
    // swal alert start
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        iconColor: 'white',
        customClass: {
            popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true
    });
    const swamsg = {
        error: (msg) => {
            Toast.fire({
                icon: 'error',
                title: msg
            });
        },
        success: (msg) => {
            Toast.fire({
                icon: 'success',
                title: msg
            })
        }
    };
    // swal alert end 


    $("#contact_submit").submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            url: './inc/contact_submit.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(data, status) {
                const res = JSON.parse(data);
                if (res.status == 100) {
                    setTimeout(function() {
                        window.location.reload();
                    }, 1500);
                    swamsg.success(res.msg);
                } else {
                    swamsg.error(res.msg);
                }
            },
        });
    });

    const inputs = document.querySelectorAll(".input");

    function focusFunc() {
        let parent = this.parentNode;
        parent.classList.add("focus");
    }

    function blurFunc() {
        let parent = this.parentNode;
        if (this.value == "") {
            parent.classList.remove("focus");
        }
    }

    inputs.forEach((input) => {
        input.addEventListener("focus", focusFunc);
        input.addEventListener("blur", blurFunc);
    });
</script>