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
    <title>ログイン完了｜C.C.Donuts</title>
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
            <h1 class="common_subpage">ログイン</h1>
            <h1>会員登録完了</h1>
            <div class="result_box">
                <p>会員登録が完了しました</p>
                <p class="linkedtext"><a href="index.php">TOPページへ戻る</a></p>
            </div>
            <!-- <div class="inner_wrapper">
                <div class="common_login_frame_sm">
                    <p class="login_complete">ログインが完了しました。</p>
                </div>
                <div class="inner_wrapper2">
                    <p class="common_linkedtext"><a href="customer-input.php">TOPページへ戻る</a></p>
                </div>
            </div> -->
        </div>

    </main>
    <?php
    require 'includes/footer.php';
    ?>