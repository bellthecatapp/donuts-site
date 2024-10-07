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
    <link rel="stylesheet" href="common/css/detail.css">
    <title>商品詳細｜C.C.Donuts</title>
</head>

<body>
    <?php
    require 'includes/header.php';
    ?>
    <main>
        <!-- パンくず -->
        <nav class="navigator">
            <ol class="bread_crumb">
                <li><a href="index.php">TOP</a></li>
                <li><a href="product.php">商品一覧</a></li>
                <?php
                require 'includes/database.php';
                $sql = $pdo->query('select * from product where name');
                foreach ($sql as $row) {
                    $name = $row['name'];
                    echo '<li>', $name, '</li>';
                }
                ?>
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

        <?php
        // データベース接続
        require 'includes/database.php';

        // SQL文の準備
        $sql = $pdo->prepare('select * from product where id=?');
        // SQL文の実行
        $sql->execute([
            $_REQUEST['id']
        ]);

        // HTMLの生成、出力
        foreach ($sql as $row) {
            $price = number_format($row['price']);
            // ヒアドキュメント1つ目
            echo <<<END
    <form action="cart-input.php" method="post" class="detail_menu">
    <div class="flex_item1">
    <img alt="image" src="common/images/{$row['id']}.png" class="detail_img">
    </div>
    <div class="flex_item2">
    <p class="detail_submenu">{$row['name']}</p>
    <p class="detail_explain">{$row['description']}</p>
    <p class="detail_money">税込&emsp;&yen;{$price}<span class="detail_favorite"><a href="#!"><img src="common/images/heart.png" alt="お気に入りボタン"></a></span>
    </p>

 <div class="detail_buy">
 <div>
  <input type="text" name="count" pattern="^[0-9]{1,9}$" class="detail_text">
  <span>個</span>
 </div>
 <input type="submit" class="cart_input" value="カートに入れる">
</div>

<input type="hidden" name="id" value="{$row['id']}">
<input type="hidden" name="name" value="{$row['name']}">
<input type="hidden" name="price" value="{$row['price']}">
</div>
</form>
END;
        }

        ?>
    </main>
    <?php require 'includes/footer.php'; ?>