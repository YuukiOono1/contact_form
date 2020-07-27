<?php
session_start();
require('../dbconnect.php');

// ログイン済みか判定
if ($_SESSION['email']) {
    $id = $_REQUEST['id'];
    $statement = $db->prepare('SELECT * FROM contacts WHERE id=?');
    $statement->execute(array($id));
    $sta = $statement->fetch();
    // 送信処理
    if (!empty($_POST)) {
        $_SESSION['reply'] = $_POST;
        header('Location: confirm.php');
        exit();
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
    <section class="form-elegant">

    <!-- Grid row -->
    <div class="row mt-4">

        <!-- Grid column -->
        <div class="mx-auto col-md-9 col-lg-7 col-xl-5">

            <!--Form without header-->
            <div class="card">

                <div class="card-body">

                    <!--Header-->
                    <div class="text-center">
                        <h3 class="dark-grey-text mb-5"><strong>返信用フォーム</strong></h3>     
                    </div>

                    <form method="POST" action="">
                        <div class="form-group">
                            <label>メールアドレス</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?php echo $sta['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label>件名</label>
                            <input type="text" id="subject" name="subject" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="content">本文</label>
                            <textarea id="content" name="content" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn default-color btn-block btn-rounded z-depth-1a"><span class="white-text">確認する</span></button>
                        <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-4">
                            <a href="index.php">お問い合わせ一覧に戻る</a>
                        </p>
                    </form>
                </div>

            </div>
            <!--/Form without header-->

        </div>
        <!-- Grid column -->

    </div>
    <!-- Grid row -->
    </section>

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