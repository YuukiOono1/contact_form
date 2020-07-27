<?php
session_start();
require('../dbconnect.php');

// ログイン済みか判定
if ($_SESSION['email']) {
    $id = $_REQUEST['id'];
    $statement = $db->prepare('SELECT * FROM contacts WHERE id=?');
    $statement->execute(array($id));
    $sta = $statement->fetch();
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
            <div class="card mr-4 mt-4">
                <div class="card-body">
                    <h1 class="dark-grey-text text-center mb-5"><strong>お問い合わせ詳細</strong></h1>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th class="w-50" scope="row">姓</td>
                                <td>
                                    <?php echo $sta['last_name']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">名</th>
                                <td>
                                    <?php echo $sta['first_name']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">セイ</th>
                                <td>
                                    <?php echo $sta['last_name_kana']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">メイ</th>
                                <td>
                                    <?php echo $sta['first_name_kana']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">メールアドレス</th>
                                <td>
                                    <?php echo $sta['email']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">郵便番号</th>
                                <td>
                                    <i class="fas fa-tenge"></i>
                                    <?php echo $sta['post_code']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">電話番号</th>
                                <td>
                                    <i class="fas fa-phone"></i>
                                    <?php echo $sta['telephone']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">お問い合わせ内容</th>
                                <td>
                                    <?php echo $sta['content']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">お問い合わせについて</th>
                                <td>
                                    <?php echo $sta['about']; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="index.php" class="text-center">←お問い合わせ一覧に戻る</a>
                </div>
            </div>
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