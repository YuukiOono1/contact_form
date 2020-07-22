<?php
session_start();

mb_language("Japanese");
mb_internal_encoding("UTF-8");

// 管理者宛メール
function ManagerMail() {
    $to = 'admin@example.com'; // 送り先
    $title = $_SESSION['contacts']['about']; // 件名
    $message = '氏名: ' . $_SESSION['contacts']['last_name'] . ' ' . $_SESSION['contacts']['first_name'] . "\n"; // 氏名
    $message = $_SESSION['contacts']['content']; // 本文
    $headers = $_SESSION['contacts']['email']; // from
    if (mb_send_mail($to, $title, $message, $headers))  {
        $ManagerFlag = "○";
    } else {
        $ManagerFlag = "×";
    }
    return $ManagerFlag;
}

// ユーザー宛メール
function UserReplyMail() {
    $to = $_SESSION['contacts']['email']; // 送り先
    $title = "お問い合わせを承りました。"; // 件名
    $message = $_SESSION['contacts']['content']; // お問い合わせ内容
    $headers = 'admin@example.com';
    if (mb_send_mail($to, $title, $message, $headers)) {
        $UserFlag = "○";
    } else {
        $UserFlag = "×";
    }
    return $UserFlag;
}

// 送信処理
$ManagerMail = ManagerMail();
$UserReplyMail = UserReplyMail();

if ($ManagerMail === "○" && $UserReplyMail === "○") {
    header("Location: complete.php");
} else {
    echo '送信に失敗しました。<br>お手数ですが、再度ご入力をお願いします。<br><a href="index.php">お問い合わせ一覧に戻る。<br>';
}
?>