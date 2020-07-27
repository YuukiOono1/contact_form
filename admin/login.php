<?php
session_start();
require('../dbconnect.php'); 

if (!empty($_POST)) {
    $login = $db->prepare('SELECT * FROM users WHERE email=? AND password=?');
    $login->execute(array(
        $_POST['email'],
        $_POST['password'],
    ));
    $user = $login->fetch();

    if ($user) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['time'] = time();
        // ユーザーのクッキーに１週間ログイン情報を保持
        setcookie('email', $_POST['email'], time()+60*60*24*7);
    
        header('Location: index.php');
        exit();
    } else {
        $error['login'] = 'failed';
    }
}

if (!empty($_COOKIE['email'])) {
    $email = $_COOKIE['email'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
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
                            <h3 class="dark-grey-text mb-5"><strong>ログイン</strong></h3>
                            <?php if ($error['login'] === 'failed'): ?>
                                <p class="text-danger">ログインに失敗しました。</p>
                            <?php endif; ?>
                        </div>

                        <form method="POST" action="">
                            <div class="md-form">
                                <label for="email">メールアドレス</label>
                                <input type="email" id="email" name="email" class="form-control" required 
                                value="<?php echo $_POST['email']; ?>">
                            </div>
                            <div class="md-form">
                                <label for="password">パスワード</label>
                                <input type="password" id="password" name="password" class="form-control" required 
                                value="<?php echo $_POST['password']; ?>">
                            </div>
                            <button type="submit" class="btn default-color btn-block btn-rounded z-depth-1a"><span class="white-text">ログイン</span></button>
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