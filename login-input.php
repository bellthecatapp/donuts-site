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
    <title>ログイン｜C.C.Donuts</title>
</head>

<body>
    <main>
        <?php
        require 'includes/header.php';
        ?>
        <!-- パンくず -->

        <!-- ユーザー名 -->
        <div class="inner">
            <h1 class="common_subpage">ログイン</h1>

            <div class="login_wrapper">
                <div class="common_login_frame">
                    <form action="login-complete.php" method="post">
                        <fieldset>
                            <legend>メールアドレス</legend><input type="email" name="login" class="common_input">
                        </fieldset>
                        <fieldset>
                            <legend>パスワード</legend><input type="password" name="password" class="common_input input_last" />
                        </fieldset>
                        <input type="submit" value="ログインする" class="common_btn_lg">
                    </form>
                </div>
                <div class="login_wrapper2">
                    <p class="linkedtext"><a href="customer-input.php">会員登録がお済みでない方はこちら</a></p>
                </div>
            </div>
        </div>
    </main>
    <?php
    require 'includes/footer.php';
    ?>