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
    <title>ログアウト｜C.C.Donuts</title>
</head>

<body>
    <?php
    require 'includes/header.php';
    ?>
    <!-- パンくず -->

    <!-- ユーザー名 -->

    <!-- コンテンツ -->
    <main>
        <div class="inner">
            <h1 class="common_subpage">ログアウト</h1>
            <div class="login_wrapper">
                <div class="login_frame">
                    <p class="logout">ログアウトしますか？</p>
                    <form action="login-complete.php" method="post">
                        <input type="submit" value="ログアウトする" class="common_btn_lg">
                    </form>
                </div>
                <div class="login_frame2"> </div>
            </div>
        </div>

    </main>
    <?php
    require 'includes/footer.php';
    ?>