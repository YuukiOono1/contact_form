<?php 
session_start();
require('basic_auth.php');
require('dbconnect.php'); 
var_dump($_SESSION['contacts']);
if (!empty($_POST)) {
    $statement = $db->prepare('INSERT INTO contacts SET last_name=?, first_name=?,
     last_name_kana=?, first_name_kana=?, email=?, post_code=?, address=?, telephone=?, content=?, file=?, about=?');
    $statement->execute(array(
        $_SESSION['contacts']['last_name'],
        $_SESSION['contacts']['first_name'],
        $_SESSION['contacts']['last_name_kana'],
        $_SESSION['contacts']['first_name_kana'],
        $_SESSION['contacts']['email'],
        $_SESSION['contacts']['post_code'] = $_SESSION['contacts']['post_code_first'] . $_SESSION['contacts']['post_code_last'],
        $_SESSION['contacts']['address'],
        $_SESSION['contacts']['telephone'] = $_SESSION['contacts']['telephone_first'] . $_SESSION['contacts']['telephone_middle']
                                                . $_SESSION['contacts']['telephone_last'],
        $_SESSION['contacts']['content'],
        $_SESSION['contacts']['image'],
        $_SESSION['contacts']['about'],
    ));
    header('Location: return_mail.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>お問い合わせ</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">

        <div class="card mt-4">
            <div class="card-body">
                <form method="POST" action="">
                    <input type="hidden" name="action" value="submit">
                    <h1 class="dark-grey-text text-center mb-5"><strong>入力確認</strong></h1>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th class="w-50" scope="row">姓</td>
                                <td><?php echo htmlspecialchars($_SESSION['contacts']['last_name'], ENT_QUOTES); ?></td>
                            </tr>
                            <tr>
                                <th class="w-50">名</th>
                                <td><?php echo htmlspecialchars($_SESSION['contacts']['first_name'], ENT_QUOTES); ?></td>
                            </tr>
                            <tr>
                                <th class="w-50">セイ</th>
                                <td><?php echo htmlspecialchars($_SESSION['contacts']['last_name_kana'], ENT_QUOTES); ?></td>
                            </tr>
                            <tr>
                                <th class="w-50">メイ</th>
                                <td><?php echo htmlspecialchars($_SESSION['contacts']['first_name_kana'], ENT_QUOTES); ?></td>
                            </tr>
                            <tr>
                                <th class="w-50">メールアドレス</th>
                                <td><?php echo htmlspecialchars($_SESSION['contacts']['email'], ENT_QUOTES); ?></td>
                            </tr>
                            <tr>
                                <th class="w-50">郵便番号</th>
                                <td>
                                    <i class="fas fa-tenge"></i>
                                    <?php echo htmlspecialchars($_SESSION['contacts']['post_code_first'], ENT_QUOTES); ?>
                                        - 
                                    <?php echo htmlspecialchars($_SESSION['contacts']['post_code_last'], ENT_QUOTES); ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">電話番号</th>
                                <td>
                                    <i class="fas fa-phone"></i>
                                    <?php echo htmlspecialchars($_SESSION['contacts']['telephone_first'], ENT_QUOTES); ?>
                                        - 
                                    <?php echo htmlspecialchars($_SESSION['contacts']['telephone_middle'], ENT_QUOTES); ?>
                                        - 
                                    <?php echo htmlspecialchars($_SESSION['contacts']['telephone_last'], ENT_QUOTES); ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">お問い合わせ内容</th>
                                <td>
                                    <?php echo htmlspecialchars($_SESSION['contacts']['content'], ENT_QUOTES); ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">ファイル</th>
                                <td>
                                    <?php echo htmlspecialchars($_SESSION['contacts']['image'], ENT_QUOTES); ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">お問い合わせについて</th>
                                <td>
                                    <?php echo htmlspecialchars($_SESSION['contacts']['about'], ENT_QUOTES); ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn default-color btn-block btn-rounded z-depth-1a"><span class="white-text">送信する</span></button>
                </form>
                <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-4">
                    <a href="index.php">お問い合わせに戻る</a>
                </p>
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