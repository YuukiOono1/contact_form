<?php
session_start();

require('dbconnect.php');

if (!empty($_POST)) {
    require('validation.php');

    if (empty($error)) {
        $_SESSION['contacts'] = $_POST;
        header('Location: confirm.php');
        exit();
    }
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

    <section class="form-gradient">

        <!-- Grid row -->
        <div class="row mt-4">

            <!-- Grid column -->
            <div class="mx-auto col-md-9 col-lg-7 col-xl-７">

                <!--Form without header-->
                <div class="card">

                    <div class="card-body">

                        <!--Header-->
                        <div class="text-center">
                            <h3 class="dark-grey-text mb-5"><strong>お問い合わせ</strong></h3>
                        </div>

                        <form method="post" action="">
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="last_name">姓</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control">
                                    <?php if ($error['last_name'] === 'blank'): ?>
                                        <p class="text-danger">姓を入力してください。</p>
                                    <?php endif; ?>
                                    <?php if ($error['last_name'] === 'length'): ?>
                                        <p class="text-danger">１０文字以下で入力してください。</p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="first_name">名</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control">
                                    <?php if($error['first_name'] === 'blank'): ?>
                                        <p class="text-danger">名を入力してください。</p>
                                    <?php endif; ?>
                                    <?php if ($error['first_name'] === 'length'): ?>
                                        <p class="text-danger">１０文字以下で入力してください。</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="last_name_kana">セイ</label>
                                    <input type="text" name="last_name_kana" id="last_name_kana" class="form-control">
                                    <?php if($error['last_name_kana'] === 'blank'): ?>
                                        <p class="text-danger">セイを入力してください。</p>
                                    <?php endif; ?>
                                    <?php if ($error['last_name_kana'] === 'length'): ?>
                                        <p class="text-danger">２０文字以下で入力してください。</p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="first_name_kana">メイ</label>
                                    <input type="text" name="first_name_kana" id="first_name_kana" class="form-control">
                                    <?php if($error['first_name_kana'] === 'blank'): ?>
                                        <p class="text-danger">メイを入力してください。</p>
                                    <?php endif; ?>
                                    <?php if ($error['first_name_kana'] === 'length'): ?>
                                        <p class="text-danger">２０文字以下で入力してください。</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>メールアドレス</label>
                                <input type="email" id="email" name="email" class="form-control" size="5">
                                <?php if($error['email'] === 'blank'): ?>
                                    <p class="text-danger">メールアドレスを入力してください。</p>
                                <?php endif; ?>
                            </div>
                            <label>郵便番号</label>
                            <div class="form-row">
                                <div class="form-group form-inline col-sm-6">
                                    <input type="text" name="post_code[]" id="post_code[]" class="form-control mr-1" size="5">
                                        ー
                                    <input type="text" name="post_code[]" id="post_code[]" class="form-control ml-1" size="5">
                                </div>
                            </div>
                            <?php if($error['post_code'] === 'blank'): ?>
                                <p class="text-danger">郵便番号を入力してください。</p>
                            <?php endif; ?>
                            <?php if ($error['post_code'] === 'length'): ?>
                                <p class="text-danger">入力数が長すぎます。</p>
                            <?php endif; ?>
                            <label>電話番号</label>
                            <div class="form-row">
                                <div class="form-group form-inline col-sm-10">
                                    <input type="tel" name="telephone[]" id="telephone[]" class="form-control mr-1" size="5">
                                        ー
                                    <input type="tel" name="telephone[]" id="telephone[]" class="form-control ml-1 mr-1" size="5">
                                        ー
                                    <input type="tel" name="telephone[]" id="telephone[]" class="form-control ml-1" size="5">
                                </div> 
                            </div>
                            <?php if($error['telephone'] === 'blank'): ?>
                                <p class="text-danger">電話番号を入力してください。</p>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="content">お問い合わせ内容</label>
                                <textarea id="content" name="content" class="form-control"></textarea>
                                <?php if($error['content'] === 'blank'): ?>
                                    <p class="text-danger">お問い合わせを入力してください。</p>
                                <?php endif; ?>
                                <?php if ($error['content'] === 'length'): ?>
                                    <p class="text-danger">入力数が長すぎます。</p>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="about">お問い合わせについて</label>
                                <select name="about" id="about" class="form-control">
                                    <option value="会社について">会社について</option>
                                    <option value="購入について">購入について</option>
                                    <option value="商品について">商品について</option>
                                    <option value="支払いについて">支払いについて</option>
                                    <option value="その他">その他</option>
                                </select>
                            </div>
                            <button type="submit" class="btn default-color btn-block btn-rounded z-depth-1a"><span class="white-text">確認する</span></button>
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