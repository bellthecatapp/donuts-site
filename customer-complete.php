<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common/css/reset.css">
    <link rel="stylesheet" href="common/css/common.css">
    <link rel="stylesheet" href="common/css/customer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="">
    <!-- ↑ページ別の.cssをリンク -->
    <title>会員登録完了｜donuts-site</title>
</head>

<body>
    <!-- パンくず -->

    <!-- ユーザー名 -->

    <!-- コンテンツ -->
    <header>
        <div class="customer_wrapper"><a href="index.php"><img src="common/images/logo.svg" alt="c.c.donutsのロゴ"></a></div>
    </header>
    <main>
        <?php require 'includes/database.php'; ?>

        <h1>会員登録完了</h1>
        <div>
            <p>会員登録が完了しました</p>
            <p><a href="login-input.php">ログイン画面に進む</a></p>
        </div>
    </main>
    <?php require 'includes/footer.php'; ?>