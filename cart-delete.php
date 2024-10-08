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
    <link rel="stylesheet" href="common/css/cart_show.css">
    <!-- ↑ページ別の.cssをリンク -->
    <title>ショッピングカート｜C.C.Donuts</title>
</head>

<body>
    <?php require 'includes/header.php'; ?>
    <!-- パンくず -->
    <nav class="navigator">
        <ol class="bread_crumb">
            <li><a href="index.php">TOP</a></li>
            <li>商品一覧</li>
        </ol>
    </nav>
    <hr class="brown_line">
    <!-- ユーザー名 -->
    <div class="navigator">

        <?php
        // データベース接続
        // ログインしていたらユーザー名表示、していなければゲスト様を表示
        if (isset($_SESSION['customer'])) {
            echo '<p class="greeting">ようこそ　', $_SESSION['customer']['name'], '様</p>';
        } else {
            echo '<p class="greeting">ようこそ　ゲスト様</p>';
        }
        ?>

    </div>
    <hr class="brown_line">
    <!-- コンテンツ -->
    <main>
        <div class="navigator">
            <?php
            unset($_SESSION['product'][$_REQUEST['id']]);
            echo '<p style="color:#333;">', 'カートから商品を削除しました。', '</p>';
            echo '</div>';
            // echo '<hr>';
            require 'cart.php';
            ?>
    </main>
    <?php require 'includes/footer.php'; ?>