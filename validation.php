<?php
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

if (empty($_POST['post_code_first'])) {
    $error['post_code'] = 'blank';
}

if (empty($_POST['post_code_last'])) {
    $error['post_code'] = 'blank';
}

if (empty($_POST['telephone_first'])) {
    $error['telephone'] = 'blank';
}

if (empty($_POST['telephone_middle'])) {
    $error['telephone'] = 'blank';
}

if (empty($_POST['telephone_last'])) {
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
if (strlen($_POST['post_code_first']) > 5) {
    $error['post_code'] = 'length';
}
if (strlen($_POST['post_code_last']) > 4) {
    $error['post_code'] = 'length';
}

if (strlen($_POST['telephone_first']) > 4) {
    $error['telephone'] = 'length';
}

if (strlen($_POST['telephone_middle']) > 4) {
    $error['telephone'] = 'length';
}

if (strlen($_POST['telephone_last']) > 4) {
    $error['telephone'] = 'length';
}

if (strlen($_POST['content']) > 255) {
    $error['content'] = 'length';
}

// 数値チェック
if (preg_match("/[^0-9]/", $_POST['post_code_first'])) {
    $error['post_code'] = 'match';
}

if (preg_match("/[^0-9]/", $_POST['post_code_last'])) {
    $error['post_code'] = 'match';
}

if (preg_match("/[^0-9]/", $_POST['telephone_first'])) {
    $error['telephone'] = 'match';
}

if (preg_match("/[^0-9]/", $_POST['telephone_middle'])) {
    $error['telephone'] = 'match';
}

if (preg_match("/[^0-9]/", $_POST['telephone_last'])) {
    $error['telephone'] = 'match';
}
?>