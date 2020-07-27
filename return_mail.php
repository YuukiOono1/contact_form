<?php
session_start();
require('basic_auth.php');

// セッション情報
$last_name = $_SESSION['contacts']['last_name']; // 姓
$first_name = $_SESSION['contacts']['first_name']; // 名
$last_name_kana = $_SESSION['contacts']['last_name_kana']; // セイ
$first_name_kana = $_SESSION['contacts']['first_name_kana']; // メイ
$email = $_SESSION['contacts']['email']; // メール
$post_code = $_SESSION['contacts']['post_code']; // 郵便番号 111-1111
$post_code_first = substr($post_code, 0, 3);
$post_code_last = substr($post_code, 3, 4);
$telephone = $_SESSION['contacts']['telephone']; // 電話番号
$telephone_first = substr($telephone, 0, 3);
$telephone_middle = substr($telephone, 3, 4);
$telephone_last = substr($telephone, 7, 4);
$content = $_SESSION['contacts']['content']; // 本文
$about = $_SESSION['contacts']['about']; // 件名

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

try{
    // 管理者宛メール
    $manager_mail = new PHPMailer(true);
    require('manager_mail_server.php'); // サーバー設定
    $manager_mail->setFrom($email); // from
    $manager_mail->addAddress('admin@example.com'); // to
    $manager_mail->CharSet = 'UTF-8'; 
    $manager_mail->Subject = $about; // 件名
    $manager_mail->Body = '氏名: ' . $last_name . ' ' . $first_name . "\n" . // 本文
        'フリガナ: ' . $last_name_kana . ' ' . $first_name_kana . "\n" .
        'メールアドレス: ' . $email . "\n" .
        '郵便番号: ' . $post_code_first . '-' . $post_code_last . "\n" .
        '電話番号: ' . $telephone_first . '-' . $telephone_middle . '-' . $telephone_last . "\n" . 
        'お問い合わせ内容: ' . $content . "\n" .
        'お問い合わせについて: ' . $about . "\n";


    if ($manager_mail) {
        $manager_flag = '○';
    } else {
        $manager_flag = '×';
    }

    //　ユーザー宛メール
    $user_mail = new PHPMailer(true);
    require('user_mail_server.php'); // サーバー設定
    $user_mail->setFrom('admin@example.com'); // from
    $user_mail->addAddress($email); // to
    $user_mail->CharSet = 'UTF-8'; 
    $user_mail->Subject = 'お問い合わせを承りました'; // 件名
    $user_mail->Body = '氏名: ' . $last_name . ' ' . $first_name . "\n" . // 本文
        'フリガナ: ' . $last_name_kana . ' ' . $first_name_kana . "\n" .
        'メールアドレス: ' . $email . "\n" .
        '郵便番号: ' . $post_code_first . '-' . $post_code_last . "\n" .
        '電話番号: ' . $telephone_first . '-' . $telephone_middle . '-' . $telephone_last . "\n" . 
        'お問い合わせ内容: ' . $content . "\n" .
        'お問い合わせについて: ' . $about . "\n";
    
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