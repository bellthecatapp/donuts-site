<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common/css/reset.css">
    <link rel="stylesheet" href="common/css/common.css">
    <link rel="stylesheet" href="common/css/cart_show.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <!-- ↑ページ別の.cssをリンク -->
    <title>カート｜C.C.Donuts</title>
</head>
<?php require 'includes/header.php'; ?>

<body>
    <!-- パンくず -->
    <nav class="navigator">
        <ol class="bread_crumb">
            <li><a href="index.php">TOP</a></li>
            <li>カート</li>
        </ol>
    </nav>
    <hr class="brown_line">
    <!-- ユーザー名 -->
    <div class="navigator">
        <?php
        // データベース接続
        require 'includes/database.php';
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
        <?php require 'cart.php'; ?>
    </main>
    <!-- フッター -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "TOP",
                    "item": "index.php"
                },
                {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "カート一覧",
                    "item": "cart.php"
                }
            ]
        }
    </script>
    <?php require 'includes/footer.php'; ?>