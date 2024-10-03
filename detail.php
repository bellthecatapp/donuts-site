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
    <title>detailpage｜C.C.Donuts</title>
</head>

<body>
    <?php
    require 'includes/header.php';
    ?>
    <!-- パンくず -->

    <!-- ユーザー名 -->

    <!-- コンテンツ -->

    <main>

        <?php
        // データベース接続
        $pdo = new PDO('mysql:host=localhost;dbname=donuts;charset=utf8', 'donuts', 'password');

        // SQL文の準備
        $sql = $pdo->prepare('select * from product where id=?');
        // SQL文の実行
        $sql->execute([
            $_REQUEST['id']
        ]);

        // HTMLの生成、出力
        foreach ($sql as $row) {
            // ヒアドキュメント1つ目
            echo <<<END
    <form action="cart.php" method="post" class="detail_menu">
    <p class="detail_img"><img alt="image" src="common/images/{$row['id']}.png"></p>
    <p class="detail_submenu">{$row['name']}</p>
    <p class="detail_explain">{$row['description']}</p>
    <p class="detail_money">税込&emsp;&yen;{$row['price']}<span class="detail_favorite"><img src="common/images/heart.png" alt="favorite"></span></p>
 <div class="detail_buy">
 </p><input type="text" name="count" pattern="^[0-9]{1,9}$" class="detail_text">
 <span class="detail_span">個</span></p>
<p class="detail_button"><input type="submit" class="detail_submit" value="カートに入れる"></p>
END;

            // ヒアドキュメント2つ目
            echo <<<END
</div>
<input type="hidden" name="id" value="{$row['id']}">
<input type="hidden" name="name" value="{$row['name']}">
<input type="hidden" name="price" value="{$row['price']}">
</form>
END;
        }

        ?>
    </main>
    <?php require 'includes/footer.php'; ?>