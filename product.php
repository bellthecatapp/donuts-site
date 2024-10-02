<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common/css/reset.css">
    <link rel="stylesheet" href="common/css/common.css">
    <link rel="stylesheet" href="common/css/product.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="">
    <!-- ↑ページ別の.cssをリンク -->
    <title>productpage｜donuts-site</title>
</head>

<body>
    <?php require 'includes/header.php';
    ?>
    <!-- パンくず -->

    <!-- ユーザー名 -->

    <!-- コンテンツ -->
    <main>


        <!-- <form action="product.php" method="post"> -->
        <section class="product_hero">
            <h1 class="product_title">商品一覧</h1>
            <div class="product_content">
                <?php
                //データベース接続
                $pdo = new PDO('mysql:host=localhost;dbname=donuts;charset=utf8', 'donuts', 'password');
                // SQL文の準備
                $sql = $pdo->prepare('select * from product where id=?');
                // SQL文の実行


                $shop = $pdo->query('select * from product limit 6');


                foreach ($shop as $row) {
                    echo <<<END
                        <form action="cart.php" method="post" class="product_menu">                        <p class="product_img"><a href="detail.php?id='$row[id]'"><img alt="image" src="common/images/{$row['id']}.png"></a></p>
                        <p class="product_submenu"><a href="detail.php?id='$row[id]'">{$row['name']}</a></p>
                         <p class="product_money"><a href="detail.php?id='$row[id]'">税込 &yen;{$row['price']}</a><span class="product_favorite"><img src="common/images/heart.png" alt="favorite"></span></p>
                        END;

                    // ヒアドキュメント2つ目
                    echo <<<END
                        <input type="hidden" name="id" value="{$row['id']}">
                        <input type="hidden" name="name" value="{$row['name']}">
                        <input type="hidden" name="price" value="{$row['price']}">
                        <p><input type="submit" class="product_submit" value="カートに入れる"></p>
                        </form>
                        END;
                }
                ?></div>

            <h2 class="subtitle">バラエティセット</h2>
            <div class="product_content">
                <?php
                $shop2 = $pdo->query('select * from product limit 12 offset 6');


                foreach ($shop2 as $row2) {
                    echo <<<END
        <form action="cart.php" method="post" class="product_menu">                        <p class="product_img"><a href="detail.php?id='$row[id]'"><img alt="image" src="common/images/{$row2['id']}.png"></a></p>
        <p class="product_submenu"><a href="detail.php?id='$row2[id]'">{$row2['name']}</a></p>
         <p class="product_money"><a href="detail.php?id='$row[id]'">税込 &yen;{$row2['price']}</a><span class="product_favorite"><img src="common/images/heart.png" alt="favorite"></span></p>
        END;

                    // ヒアドキュメント2つ目
                    echo <<<END
        <input type="hidden" name="id" value="{$row['id']}">
        <input type="hidden" name="name" value="{$row['name']}">
        <input type="hidden" name="price" value="{$row['price']}">
        <p><input type="submit" class="product_submit" value="カートに入れる"></p>
        </form>
        END;
                }
                ?>
            </div>

    </main>
    <?php require 'includes/footer.php'; ?>
</body>

</html>