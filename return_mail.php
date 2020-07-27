<?php
session_start();

// セッション情報
$last_name = $_SESSION['contacts']['last_name']; // 姓
$first_name = $_SESSION['contacts']['first_name']; // 名
$email = $_SESSION['contacts']['email']; // メール
$content = $_SESSION['contacts']['content']; // 本文
$about = $_SESSION['contacts']['about']; // 件名

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


try{
    // 管理者メール
    $manager_mail = new PHPMailer(true);
    $manager_mail->isSMTP();
    $manager_mail->Host = 'smtp.mailtrap.io';
    $manager_mail->SMTPAuth = true;
    $manager_mail->Username = 'a149f0681d629b'; 
    $manager_mail->Password = '2d8da727f6857f'; 
    $manager_mail->SMTPSecure = 'tls';
    $manager_mail->Port = 2525;    
    $manager_mail->setFrom($email); // from
    $manager_mail->addAddress('admin@example.com'); // to
    $manager_mail->CharSet = 'UTF-8'; 
    $manager_mail->Subject = $about; // 件名
    $manager_mail->Body = '氏名: ' . $last_name . ' ' . $first_name . "\n" . // 本文
        'お問い合わせ内容: ' . $content;

    if ($manager_mail) {
        $manager_flag = '○';
    } else {
        $manager_flag = '×';
    }

    //　ユーザーメール
    $user_mail = new PHPMailer(true);
    $user_mail->isSMTP();
    $user_mail->Host = 'smtp.mailtrap.io';
    $user_mail->SMTPAuth = true;
    $user_mail->Username = 'a149f0681d629b'; 
    $user_mail->Password = '2d8da727f6857f'; 
    $user_mail->SMTPSecure = 'tls';
    $user_mail->Port = 2525;    
    $user_mail->setFrom('admin@example.com'); // from
    $user_mail->addAddress($email); // to
    $user_mail->CharSet = 'UTF-8'; 
    $user_mail->Subject = 'お問い合わせを承りました'; // 件名
    $user_mail->Body = 'お問い合わせ内容: ' . $content; // 本文
    
    if ($user_mail) {
        $user_flag = '○';
    } else {
        $user_flag = '×';
    }

    // 送信処理
    if ($manager_flag === '○' && $user_flag === '○') {
        $manager_mail->send();
        $user_mail->send();
        header('Location: complete.php');
    } else {
        echo '送信に失敗しました。<br>お手数ですが、再度ご入力をお願いします。<br><a href="index.php">お問い合わせ一覧に戻る。<br>';
    }
    
} catch(Exception $e) {
    echo '送信に失敗しました。<br>お手数ですが、再度ご入力をお願いします。<br><a href="index.php">お問い合わせ一覧に戻る。<br>';
}