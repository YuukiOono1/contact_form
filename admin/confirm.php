<?php
session_start();
require('../dbconnect.php');
if (!empty($_POST)) {
    $statement = $db->prepare('INSERT INTO replys SET email=?, subject=?, content=?, reply_contacts_id=?, reply_at=NOW()');
    $statement->execute(array(
        $_SESSION['reply']['email'],
        $_SESSION['reply']['subject'],
        $_SESSION['reply']['content'],
        $_SESSION['reply']['id'],
    ));

    header('Location: reply_mail.php');
    exit();
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

    <div class="container">
        <div class="card mt-4">
            <div class="card-body">
                <form method="POST" action="">
                    <input type="hidden" name="action" value="submit">
                    <h1 class="dark-grey-text text-center mb-5"><strong>入力確認</strong></h1>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th class="w-50">メールアドレス</th>
                                <td><?php echo $_SESSION['reply']['email']; ?></td>
                            </tr>
                            <tr>
                                <th class="w-50">件名</th>
                                <td><?php echo $_SESSION['reply']['subject']; ?></td>
                            </tr>
                            <tr>
                                <th class="w-50">本文</th>
                                <td><?php echo $_SESSION['reply']['content']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn default-color btn-block btn-rounded z-depth-1a"><span class="white-text">送信する</span></button>
                </form>
                <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-4">
                    <a href="reply.php">戻る</a>
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