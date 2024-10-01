<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common/css/reset.css">
    <link rel="stylesheet" href="common/css/common.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="common/css/login_out.css">
    <!-- ↑ページ別の.cssをリンク -->
    <title>ログイン｜donuts-site</title>
</head>

<body>

    <?php
    require 'includes/header.php';
    ?>
    <!-- パンくず -->

    <!-- ユーザー名 -->
    <div class="inner">
        <h1 class="common_subpage">ログイン</h1>

        <div class="inner_wrapper">
            <div class="common_login_frame">
                <form action="login-complete.php" method="post">
                    <p class="common_form_label">メールアドレス</p><input type="email" name="login" class="input_form">
                    <p class="common_form_label">パスワード</p><input type="password" name="password" class="input_form input_last" />
                    <input type="submit" value="ログインする" class="common_btn_lg common_btn_brown">
                </form>
            </div>
            <div class="inner_wrapper2">
                <p class="common_linktext"><a href="customer-input.php">会員登録がお済みでない方はこちら</a></p>
            </div>
        </div>
    </div>

    <?php
    require 'includes/footer.php';
    ?>
</body>

</html>