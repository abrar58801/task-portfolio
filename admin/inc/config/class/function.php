<?php

function runFatch($sqlQuery)
{
    global $conn;

    $queryResult = $conn->query($sqlQuery);
    $response = [];

    while ($result = $queryResult->fetch_assoc()) {
        $response[] = $result;
    }

    return $response;
}

function runDelete($sqlQuery)
{
    global $conn;

    $deleteResult = $conn->query($sqlQuery);

    return $deleteResult;
}

function runUpdate($sqlQuery)
{
    global $conn;

    $updateResult = $conn->query($sqlQuery);

    return $updateResult;
}

function runInsert($sqlQuery)
{
    global $conn;

    $insertResult = $conn->query($sqlQuery);

    return $insertResult;
}


function filter(String $string = ''): String
{
    $string = htmlspecialchars($string);
    $string = stripslashes($string);
    $string = str_replace("'", '', $string);

    return $string;
}

function checkValidEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}


function send_mail($mail, $email, $html, $subject)
{
    ## $mail = new PHPMailer(true);
    ## create a $mail object when use this function dont create here otherwise thrown error
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = "tls";
    $mail->SMTPAuth = true;
    $mail->Username = "abrar.web.developer@gmail.com";
    $mail->Password = "qckwteivgrwmlkno";
    $mail->SetFrom("abrar.web.developer@gmail.com", 'Abrar Ahmad');
    $mail->addAddress($email);
    $mail->IsHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $html;
    //Set SMTP options
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    if ($mail->Send()) {
        return TRUE;
    } else {
        return FALSE;
    }
}