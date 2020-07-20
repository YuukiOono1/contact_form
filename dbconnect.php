<?php
// DB接続
try {
    $db = new PDO('mysql:dbname=task; host=localhost; port=8889; charset=utf8', 'root', 'root');
} catch(PDOException $e) {
    echo 'DB接続エラー: ' . $e->getMessage();
}
?>
