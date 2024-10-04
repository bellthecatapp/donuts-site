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
    <link rel="stylesheet" href="">
    <!-- ↑ページ別の.cssをリンク -->
    <title>ページ名入力｜C.C.Donuts</title>
</head>

<body>
    <!-- パンくず -->

    <!-- ユーザー名 -->

    <!-- コンテンツ -->
    <main>
        <?php
        $id = $_REQUEST['id'];
        if (!isset($_SESSION['product'])) {
            $_SESSION['product'] = [];
        }

        $count = 0;

        if (isset($_SESSION['product'][$id])) {
            $count = $_SESSION['product'][$id]['count'];
        }

        $_SESSION['product'][$id] = [
            'name' => $_REQUEST['name'],
            'price' => $_REQUEST['price'],
            'count' => $count + $_REQUEST['count']
        ];

        echo '<p>カートに商品を追加しました。</p>';
        echo '<hr>';

        require 'cart.php';

        ?>
    </main>
</body>

</html>