<?php
session_start();
require('../dbconnect.php');

// ログイン済みか判定
if ($_SESSION['email']) {
    $page = $_REQUEST['page'];
    if ($page == '') {
        $page = 1;
    }
    // ページが1より小さい場合は1
    $page = max($page, 1);
    // DBから問い合わせの全件を取得
    $counts = $db->query('SELECT count(*) As cnt from contacts');
    $cnt = $counts->fetch();
    $maxPage = ceil($cnt['cnt'] / 5);
    // ページが２より大きい場合は２
    $page = min($page, $maxPage);

    $start = ($page - 1) * 5;

    // 記事一覧をDBから取得
    $statement = $db->prepare('SELECT contacts.*, replys.reply_at from contacts LEFT OUTER JOIN replys ON contacts.id = replys.reply_contacts_id ORDER BY id LIMIT ?, 5');
    $statement->bindParam(1, $start, PDO::PARAM_INT);
    $statement->execute();
    $sta = $statement->fetchall();
    
    // csvダウンロード
    if (isset($_POST['csv'])) {
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=お問い合わせ一覧.csv");
        header('Content-Transfer-Encoding: binary');
        
        // カラム
        $csv_data = 'ID, 姓, 名, セイ, メイ, メールアドレス, 郵便番号, 電話番号, お問い合わせ内容, お問い合わせについて' . "\n";
        

        foreach($sta as $row) {
            // データを1行ずつCSVファイルに書き込む
            $csv_data .= '"' . $row['id'] . '","' . $row['last_name'] . '","' . $row['first_name']
             . '","' . $row['last_name_kana'] . '","' . $row['first_name_kana'] . '","' . $row['email'] . '","' . $row['post_code']
             . '","' . $row['telephone'] . '","' . $row['content'] . '","' . $row['about'] . '","' . "\"\n";
        }

        // 文字コードをSJISに変換
        $csv_data = mb_convert_encoding($csv_data, 'SJIS-win', 'UTF-8');

        echo $csv_data;
        exit;
    }
} else {
    // ログインしていなければログインページへリダイレクト
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>管理ページ</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
</head>

<body>
    <div class="row">
        <?php require('sidebar.php'); ?>
        <div class="col">
            <form action="index.php" method="post">
                <button type="submit" name="csv" class="btn btn-primary mt-4">CSVダウンロード</button>
            </form>
            <div class="card mt-4 mr-4">
                <table class="table">
                    <thead class="black white-text">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">氏名</th>
                            <th scope="col">お問い合わせについて</th>
                            <th scope="col">お問い合わせ内容</th>
                            <th scope="col">詳細を見る</th>
                            <th scope="col">返答する</th>
                            <th scope="col">返答日</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count=1; ?>
                        <?php foreach($sta as $row) { ?>
                            <tr>
                                <th scope="row"><?php echo $count++; ?></th>
                                <td>
                                    <?php echo $row['last_name']. ' ' .$row['first_name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['about']; ?>
                                </td>
                                <td>
                                    <?php echo mb_substr($row['content'], 0, 10); ?>・・・
                                </td>
                                <td>
                                    <a href="show.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">詳細
                                </td>
                                <td>
                                    <a href="reply.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">返答
                                </td>
                                <td>
                                    <?php if (!empty($row['reply_at'])): ?>
                                        <p><?php echo $row['reply_at']; ?></p>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination pg-blue">
                    <?php if ($page > 1): ?>
                        <li class="page-item"><a class="page-link" href="index.php?page=<?php echo($page - 1); ?>">前へ</a></li>
                    <?php endif; ?>
                    <li class="page-item"><a class="page-link">1</a></li>
                    <?php if ($page < $maxPage): ?>
                        <li class="page-item"><a class="page-link" href="index.php?page=<?php echo($page + 1); ?>">次へ</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>
</body>

</html>