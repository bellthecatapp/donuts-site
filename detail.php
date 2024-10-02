<?php

//記述ココ

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
    <form action="cart.php" method="post" class="product_menu">
    <p class="product_img"><img alt="image" src="common/images/{$row['id']}.png"></p>
    <p class="product_submenu">{$row['name']}</p>
    <p class="product_money">税込 &yen;{$row['price']}<span class="product_favorite"><img src="common/images/heart.png" alt="favorite"></span></p>
 <p><select name="count"> 
END;

    // セレクトボックスの個数をループで出力
    for ($i = 1; $i <= 10; $i++) {
        echo '<option value="', $i, '">', $i, '</option>';
    }

    // ヒアドキュメント2つ目
    echo <<<END
 </select>個
</p>
<input type="hidden" name="id" value="{$row['id']}">
<input type="hidden" name="name" value="{$row['name']}">
<input type="hidden" name="price" value="{$row['price']}">
 <input type="submit" class="product_submit" value="カートに入れる">
</form>
END;
}
