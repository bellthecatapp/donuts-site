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
    <title>ページ名入力｜donuts-site</title>
</head>

<body>
    <!-- パンくず -->

    <!-- ユーザー名 -->

    <!-- コンテンツ -->
    <main>

        <body>
            <form action="product.php" method="post">
                <section class="product_hero">
                    <h1 class="product_title">商品一覧</h1>
                    <?php
                    $pdo = new PDO('mysql:host=localhost;dbname=donuts;charset=utf8', 'donuts', 'password');
                    ?>
                </section>
            </form>
            <!-- <div class="product_content">
                <div class="product_menu">
                    <div class="product_img"><a href="detail.php"><img src="common/images/products-CCoriginal.png" alt="CCdonuts"></a></div>
                    <p class="product_submenu"><a href="detail.php">CCドーナツ 当店オリジナル （5個入り）</a></p>
                    <p class="product_money"><a href="detail.php">税込 &yen;1,500</a><span class="product_favorite"><img src="common/images/heart.png" alt="favorite"></span></p>
                    <p class="product_button"><a href="cart-input.php"><input type="submit" class="product_submit" value="カートに入れる"></a></p>
                </div>
                <div class="product_menu">
                    <p class="product_img"><a href="detail.php"><img src="common/images/products-chocolate.png" alt="CCdonuts"></a></p>
                    <p class="product_submenu"><a href="detail.php">チョコレートデライト （5個入り）</a></p>
                    <p class="product_money"><a href="detail.php">税込 &yen;1,600</a><span class="product_favorite"><img src="common/images/heart.png" alt="favorite"></span></p>
                    <p class="product_button"><a href="cart-input.php"><input type="submit" class="product_submit" value="カートに入れる"></a></p>
                </div>
                <div class="product_menu">
                    <div class="product_img"><a href="detail.php"><img src="common/images/products-caramel.png" alt="CCdonuts"></a></div>
                    <p class="product_submenu"><a href="detail.php">キャラメルクリーム （5個入り）</a></p>
                    <p class="product_money"><a href="detail.php">税込 &yen;1,600</a><span class="product_favorite"><img src="common/images/heart.png" alt="favorite"></span></p>
                    <p class="product_button"><a href="cart-input.php"><input type="submit" class="product_submit" value="カートに入れる"></a></p>
                </div>
                <div class="product_menu">
                    <div class="product_img"><a href="detail.php"><img src="common/images/products-plane.png" alt="CCdonuts"></a></div>
                    <p class="product_submenu"><a href="detail.php">プレーンクラシック （5個入り）</a></p>
                    <p class="product_money"><a href="detail.php">税込 &yen;1,500</a><span class="product_favorite"><img src="common/images/heart.png" alt="favorite"></span></p>
                    <p class="product_button"><a href="cart-input.php"><input type="submit" class="product_submit" value="カートに入れる"></a></p>
                </div>
                <div class="product_menu">
                    <div class="product_img"><a href="detail.php"><img src="common/images/products-citrus.png" alt="CCdonuts"></a></div>
                    <p class="product_submenu"><a href="detail.php">【新作】 サマーシトラス （5個入り）</a></p>
                    <p class="product_money"><a href="detail.php">税込 &yen;1,600</a><span class="product_favorite"><img src="common/images/heart.png" alt="favorite"></span></p>
                    <p class="product_button"><a href="cart-input.php"><input type="submit" class="product_submit" value="カートに入れる"></a></p>
                </div>
                <div class="product_menu">
                    <div class="product_img"><a href="detail.php"><img src="common/images/products-strawberry.png" alt="CCdonuts"></a></div>
                    <p class="product_submenu"><a href="detail.php">ストロベリークラッシュ （5個入り）</a></p>
                    <p class="product_money"><a href="detail.php">税込 &yen;1,800</a><span class="product_favorite"><img src="common/images/heart.png" alt="favorite"></span></p>
                    <p class="product_button"><a href="cart-input.php"><input type="submit" class="product_submit" value="カートに入れる"></a></p>
                </div>
            </div>
        </section>
        <section class="product_subhero">
            <h2 class="subtitle">バラエティセット</h2>
            <div class="product_content">
                <div class="product_menu">
                    <p class="product_img"><a href="detail.php"><img src="common/images/variety-fruit12.png" alt="CCdonuts"></a></p>
                    <p class="product_submenu"><a href="detail.php">フルーツドーナツセット （12個入り）</a></p>
                    <p class="product_money"><a href="detail.php">税込 &yen;3,500</a><span class="product_favorite"><img src="common/images/heart.png" alt="favorite"></span></p>
                    <p class="product_button"><a href="cart-input.php"><input type="submit" class="product_submit" value="カートに入れる"></a></p>
                </div>
                <div class="product_menu">
                    <p class="product_img"><a href="detail.php"><img src="common/images/variety-fruit14.png" alt="CCdonuts"></a></p>
                    <p class="product_submenu"><a href="detail.php">フルーツドーナツセット （14個入り）</a></p>
                    <p class="product_money"><a href="detail.php">税込 &yen;4,000</a><span class="product_favorite"><img src="common/images/heart.png" alt="favorite"></span></p>
                    <p class="product_button"><a href="cart-input.php"><input type="submit" class="product_submit" value="カートに入れる"></a></p>
                </div>
                <div class="product_menu">
                    <div class="product_img"><a href="detail.php"><img src="common/images/variety-best4.png" alt="CCdonuts"></a></div>
                    <p class="product_submenu"><a href="detail.php">ベストセクションボックス （4個入り）</a></p>
                    <p class="product_money"><a href="detail.php">税込 &yen;1,200</a><span class="product_favorite"><img src="common/images/heart.png" alt="favorite"></span></p>
                    <p class="product_button"><a href="cart-input.php"><input type="submit" class="product_submit" value="カートに入れる"></a></p>
                </div>
                <div class="product_menu">
                    <div class="product_img"><a href="detail.php"><img src="common/images/variety-chocolate7.png" alt="CCdonuts"></a></div>
                    <p class="product_submenu"><a href="detail.php">チョコクラッシュボックス （7個入り）</a></p>
                    <p class="product_money"><a href="detail.php">税込 &yen;2,400</a><span class="product_favorite"><img src="common/images/heart.png" alt="favorite"></span></p>
                    <p class="product_button"><a href="cart-input.php"><input type="submit" class="product_submit" value="カートに入れる"></a></p>
                </div>
                <div class="product_menu">
                    <div class="product_img"><a href="detail.php"><img src="common/images/variety-cream4.png" alt="CCdonuts"></a></div>
                    <p class="product_submenu"><a href="detail.php">クリームボックス （4個入り）</a></p>
                    <p class="product_money"><a href="detail.php">税込 &yen;1,400</a><span class="product_favorite"><img src="common/images/heart.png" alt="favorite"></span></p>
                    <p class="product_button"><a href="cart-input.php"><input type="submit" class="product_submit" value="カートに入れる"></a></p>
                </div>
                <div class="product_menu">
                    <div class="product_img"><a href="detail.php"><img src="common/images/variety-cream7.png" alt="CCdonuts"></a></div>
                    <p class="product_submenu"><a href="detail.php">クリームボックス （9個入り）</a></p>
                    <p class="product_money"><a href="detail.php">税込 &yen;2,800</a><span class="product_favorite"><img src="common/images/heart.png" alt="favorite"></span></p>
                    <p class="product_button"><a href="cart-input.php"><input type="submit" class="product_submit" value="カートに入れる"></a></p>
                </div>
            </div> -->

    </main>
</body>

</html>