<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

define('DOMAIN', 'http://localhost/Evangelism-email-marketing--PHP');
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

    $password = md5($password);
    $sql = "INSERT INTO tb_users (email, password, rcode) VALUES ('{$email}', '{$password}', '{$code}')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $usernr = $conn->insert_id;

        $query = "INSERT INTO tb_members (usernr,type, fullname, organization, street, zip, city, country, cellphone, telephone, instagram, facebook, website) VALUES ('{$usernr}', '', '{$name}', '', '','', '', '', '', '', '', '', '')";
        return mysqli_query($conn, $query);
    } else {
        return false;
    }
}

// function registerMember($conn, $usernr, $type, $fullname, $organization, $street, $zip, $city, $country, $cellphone, $telephone, $instagram, $facebook, $website)
function registerMember($conn, $usernr, $type, $fullname, $organization, $street, $zip, $city, $country, $cellphone, $telephone, $instagram, $facebook, $website)
{
    $query = "INSERT INTO tb_members (usernr, type, fullname, organization, street, zip, city, country, cellphone, telephone, instagram, facebook, website) VALUES ('{$usernr}', '{$type}', '{$fullname}', '{$organization}', '{$street}', '{$zip}', '{$city}', '{$country}', '{$cellphone}', '{$telephone}', '{$instagram}', '{$facebook}', '{$website}')";
    // $query = "INSERT INTO tb_members (type, fullname, organization, street, zip, city, country, cellphone, telephone, instagram, facebook, website) VALUES ('{$type}', '{$fullname}', '{$organization}', '{$street}', '{$zip}', '{$city}', '{$country}', '{$cellphone}', '{$telephone}', '{$instagram}', '{$facebook}', '{$website}')";
    $res = mysqli_query($conn, $query);

    if ($res) {
        $query = "UPDATE tb_users SET active='1' WHERE usernr='$usernr'";

        return mysqli_query($conn, $query);
    } else {
        return false;
    }
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
            $mail->Body = 'Here is the verification link <b><a href="' . DOMAIN . '/?verification='
                . $code . '">' . DOMAIN . '/?verification='
                . $code . '</a></b>';
        }

        $mail->send();

        return true;
    } catch (Exception $e) {
        return false;
    }
}

function select_oneuserByEmail($conn, $email)
{
    $query = "SELECT * FROM tb_users WHERE tb_users.email = '{$email}'";
    return mysqli_query($conn, $query);
}

function select_userByEmail($conn, $email)
{
    $query = "SELECT * FROM tb_users INNER JOIN tb_members ON tb_users.usernr = tb_members.usernr WHERE tb_users.email = '{$email}'";
    return mysqli_query($conn, $query);
}

function select_userById($conn, $id)
{
    $query = "SELECT * FROM tb_users INNER JOIN tb_members ON tb_users.usernr = tb_members.usernr WHERE tb_users.usernr = '{$id}'";
    return mysqli_query($conn, $query);
}

function update_profile($conn, $type, $fullname, $email, $organization, $password, $street, $zip, $city, $country, $cellphone, $telephone, $instagram, $facebook, $website, $usernr)
{
    $query = "UPDATE tb_users
    JOIN tb_members ON tb_users.usernr = tb_members.usernr
    SET 
        tb_users.email = '{$email}',
        tb_users.password = '{$password}',
        tb_members.type = '{$type}',
        tb_members.fullname = '{$fullname}',
        tb_members.organization = '{$organization}',
        tb_members.street = '{$street}',
        tb_members.zip = '$zip',
        tb_members.city = '$city',
        tb_members.country = '$country',
        tb_members.cellphone = '$cellphone',
        tb_members.telephone = '$telephone',
        tb_members.instagram = '$instagram',
        tb_members.facebook = '$facebook',
        tb_members.website = '{$website}'
    WHERE 
        tb_users.usernr = '{$usernr}'";
    $res = mysqli_query($conn, $query);

    if ($res) {
        $query = "UPDATE tb_users SET active='1' WHERE usernr='$usernr'";
        return mysqli_query($conn, $query);
    } else {
        return false;
    }
}

function create_event($conn, $usernr, $name, $street, $zip, $city, $country, $dateofevent, $invitetxt, $radiuskm, $web)
{
    $query = "INSERT INTO tb_event (usernr, name, street, zip, city, country, dateofevent, invitetxt, radiuskm, web, sendout)
    VALUES ('{$usernr}', '{$name}', '{$street}', '{$zip}', '{$city}', '{$country}', '{$dateofevent}', '{$invitetxt}', '{$radiuskm}', '{$web}', 0);";
    return mysqli_query($conn, $query);
}

function read_event($conn, $event_id)
{
    $query = "";
    return mysqli_query($conn, $query);
}

function delete_event($conn, $event_id)
{
    $query = "";
    return mysqli_query($conn, $query);
}

# Add Convert Page

function addConvert($conn, $email, $fullname, $street, $zip, $city, $country, $cellphone, $telephone, $instagram, $facebook, $website, $usernr){
    $query = "INSERT INTO tb_users ( email ) VALUES ('{$email}')";
    mysqli_query($conn, $query);
    $insertId = $conn->insert_id;
    $query = "INSERT INTO tb_members (usernr, type, fullname, organization, street, zip, city, country, cellphone, telephone, instagram, facebook, website) VALUES ('{$insertId}', '', '{$fullname}', '', '{$street}', '{$zip}', '{$city}', '{$country}', '{$cellphone}', '{$telephone}', '{$instagram}', '{$facebook}', '{$website}')";
    


    if($email != ""){
        return mysqli_query($conn, $query);
    } else {
        date_default_timezone_set('UTC');
        $currentDateTime = date('Y-m-d H:i:s');

        $query = "INSERT INTO tb_connection (usernr1, usernr2, cdate, status) VALUES ('$usernr', '$insertId', '{$currentDateTime}', 'S')";
        return mysqli_query($conn, $query);
    }
}

function select_members( $conn ){
    $query = "SELECT * FROM tb_users INNER JOIN tb_members ON tb_users.usernr = tb_members.usernr WHERE tb_users.active = '1'";
    return mysqli_query($conn, $query);
}

function select_events($conn, $sname, $sorg, $szip, $scity, $scountry, $sstartDate, $sendDate){
    $query = "SELECT * FROM tb_event INNER JOIN tb_members ON tb_event.usernr = tb_members.usernr INNER JOIN tb_users ON tb_event.usernr = tb_users.usernr WHERE tb_users.active = '1'";
    return mysqli_query($conn, $query);
}   
?>