<?php
require "./class/config.php";

##------------  phpmailer for send message or other at email address
include("../phpmailer/vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$res = [];

if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = filter($_POST['email']);
} else {
    $res['msg'] = 'Email is required';
    $res['status'] = 101;
}

if (!$res) {

    $select_user = runFatch("SELECT * FROM tbl_admin WHERE username = '$email' ");
    $user_id = $select_user[0]['id'];

    // Generate a unique token
    $token = bin2hex(random_bytes(50));

    if ($select_user > 0) {

        $insert_query = "INSERT INTO tbl_password_reset (user_id, token) VALUE ('$user_id', '$token')";
        $insert = runInsert($insert_query);

        // Send the password reset link to the user's email
        $reset_link = "http://localhost/portfolio/admin/reset_password.php?token=" . $token;
        $subject = "Password Reset Request";
        $message = "Click on the following link to reset your password: " . $reset_link;

        // PHP MAILER
        $mail = new PHPMailer(true);

        $send_mail = send_mail(
            $mail,
            $email,
            $message,
            $subject,
            );

        if ($send_mail) {
            $res['status'] = 100;
            $res['msg'] = "Password reset link has been sent to your email.";
        } else {
            $res['status'] = 101;
            $res['msg'] = 'Failed to send email.';
        }
    }
}

echo json_encode($res);
