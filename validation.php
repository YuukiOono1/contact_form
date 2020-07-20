<?php
// バリデーションはあとでもう少し改善

// 未入力チェック
if (empty($_POST['last_name'])) {
    $error['last_name'] = 'blank';
}
if (empty($_POST['first_name'])) {
    $error['first_name'] = 'blank';
}
if (empty($_POST['last_name_kana'])) {
    $error['last_name_kana'] = 'blank';
}
if (empty($_POST['first_name_kana'])) {
    $error['first_name_kana'] = 'blank';
}
if (empty($_POST['email'])) {
    $error['email'] = 'blank';
}
if (empty($_POST['post_code'])) {
    $error['post_code'] = 'blank';
}

if (empty($_POST['telephone'])) {
    $error['telephone'] = 'blank';
}

if (empty($_POST['content'])) {
    $error['content'] = 'blank';
}

// 文字の長さ
if (strlen($_POST['last_name']) > 10) {
    $error['last_name'] = 'length';
}
if (strlen($_POST['first_name']) > 10) {
    $error['first_name'] = 'length';
}
if (strlen($_POST['last_name_kana']) > 20) {
    $error['last_name_kana'] = 'length';
}
if (strlen($_POST['first_name_kana']) > 20) {
    $error['first_name_kana'] = 'length';
}
if (strlen($_POST['post_code']) > 9) {
    $error['post_code'] = 'length';
}

if (strlen($_POST['content']) > 255) {
    $error['content'] = 'length';
}
?>