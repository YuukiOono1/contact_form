<?php
session_start();

// セッション情報
$email = $_SESSION['reply']['email'];
$subject = $_SESSION['reply']['subject'];
$content = $_SESSION['reply']['content'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

try{
    // 返答メール
    $reply_mail = new PHPMailer(true);
    require('reply_mail_server.php'); // サーバー設定
    $reply_mail->setFrom('admin@example.com'); // from
    $reply_mail->addAddress($email); // to
    $reply_mail->CharSet = 'UTF-8'; 
    $reply_mail->Subject = $subject; // 件名
    $reply_mail->Body = $content;
    $reply_mail->send();
    header('Location: index.php');
} catch(Exception $e) {
    echo $reply_mail->ErrorInfo;
}