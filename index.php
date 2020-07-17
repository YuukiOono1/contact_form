<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>お問い合わせフォーム</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">

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

                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="last_name">姓</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="first_name">名</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="last_name_kana">セイ</label>
                                        <input type="text" name="last_name_kana" id="last_name_kana" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="first_name_kana">メイ</label>
                                        <input type="text" name="first_name_kana" id="first_name_kana" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>メールアドレス</label>
                                    <input type="email" id="email" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="textarea1">お問い合わせ内容</label>
                                    <textarea id="textarea1" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="select1a">お問い合わせについて</label>
                                    <select id="select1a" class="form-control">
                                        <option>会社について</option>
                                        <option>購入について</option>
                                        <option>商品について</option>
                                        <option>支払いについて</option>
                                        <option>その他</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn default-color btn-block btn-rounded z-depth-1a"><span class="white-text">送信</span></button>
                            </form>
                        </div>

                    </div>
                    <!--/Form without header-->

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->
        </section>
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