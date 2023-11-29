<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
function isEmailVerified($conn, $verificationCode)
{
    $query = "SELECT * FROM tb_users WHERE rcode='$verificationCode'";
    return mysqli_num_rows(mysqli_query($conn, $query)) > 0;
}

function updateVerificationCode($conn, $verificationCode)
{
    $query = "UPDATE tb_users SET rcode='' WHERE rcode='$verificationCode'";
    return mysqli_query($conn, $query);
}

function loginUser($conn, $email, $password)
{
    $hashedPassword = md5($password);
    $query = "SELECT * FROM tb_users WHERE email='$email' AND password='$hashedPassword'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return false;
    }
}

function isEmailExists($conn, $email)
{
    $query = "SELECT * FROM tb_users WHERE email='{$email}'";
    return mysqli_num_rows(mysqli_query($conn, $query)) > 0;
}

function isUsernrExistsInMembers($conn, $usernr)
{
    $query = "SELECT * FROM tb_members WHERE usernr='{$usernr}'";
    return mysqli_num_rows(mysqli_query($conn, $query)) > 0;
}

function registerUser($conn, $name, $email, $password, $code)
{
    $hashedPassword = md5($password);
    $sql = "INSERT INTO tb_users (email, password, rcode) VALUES ('{$email}', '{$hashedPassword}', '{$code}')";
    return mysqli_query($conn, $sql);
}

// function registerMember($conn, $usernr, $type, $fullname, $organization, $street, $zip, $city, $country, $cellphone, $telephone, $instagram, $facebook, $website)
function registerMember($conn, $type, $fullname, $organization, $street, $zip, $city, $country, $cellphone, $telephone, $instagram, $facebook, $website)
{
    // $query = "INSERT INTO tb_members (usernr, type, fullname, organization, street, zip, city, country, cellphone, telephone, instagram, facebook, website) VALUES ('{$usernr}', '{$type}', '{$fullname}', '{$organization}', '{$street}', '{$zip}', '{$city}', '{$country}', '{$cellphone}', '{$telephone}', '{$instagram}', '{$facebook}', '{$website}')";
    $query = "INSERT INTO tb_members (type, fullname, organization, street, zip, city, country, cellphone, telephone, instagram, facebook, website) VALUES ('{$type}', '{$fullname}', '{$organization}', '{$street}', '{$zip}', '{$city}', '{$country}', '{$cellphone}', '{$telephone}', '{$instagram}', '{$facebook}', '{$website}')";
    return mysqli_query($conn, $query);
}

function send_email($email, $code, $for)
{
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'golden.starr1997@gmail.com';
        $mail->Password = 'zlrn ooiv lyfo egxb';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('golden.starr1997@gmail.com');
        $mail->addAddress($email);

        $mail->isHTML(true);

        if ($for == 'reset_pwd') {
            $mail->Subject = 'Reset password verfiy';
            $mail->Body = 'Here is the verification link <b><a href="http://localhost/change-password.php?reset='
                . $code . '">http://localhost/change-password.php?reset='
                . $code . '</a></b>';
        } else {
            $mail->Subject = 'Register verfiy';
            $mail->Body = 'Here is the verification link <b><a href="http://localhost/?verification='
                . $code . '">http://localhost/?verification='
                . $code . '</a></b>';
        }

        $mail->send();

        return true;
    } catch (Exception $e) {
        return false;
    }
}

function select_userByEmail($conn, $email){
    $query = "SELECT * FROM tb_users INNER JOIN tb_members ON tb_users.usernr = tb_members.usernr WHERE tb_users.email = '{$email}'";
    return mysqli_query($conn, $query);
}

?>