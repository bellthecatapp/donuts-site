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
    <title>ログアウト完了｜C.C.Donuts</title>
</head>

<body>
    <!-- パンくず -->

    <!-- ユーザー名 -->

    <!-- コンテンツ -->
    <main>
        <?php
        // DB接続を行う
        $pdo = new PDO('mysql:host=localhost;dbname=donuts', 'donuts', 'password');

        // ランキングの連想配列 (順位 => 商品ID)
        $ranking = [
            1 => 5,
            2 => 3,
            3 => 8,
            4 => 6,
            5 => 2,
            6 => 9,
        ];

        // ランキングの1位から6位の商品情報を取得し、表示
        foreach ($ranking as $rank => $id) {
            // SQLクエリでIDをもとに商品を取得
            $stmt = $pdo->prepare("SELECT name, price FROM product WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            // 結果を取得
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            // 結果をdivに表示
            if ($product) {
                // 商品IDに対応する画像のファイルパス
                $imagePath = "images/{$id}.png";  // imagesフォルダ内にIDと同名の画像がある前提

                // div構造を出力
                echo "<div class='product'>";
                echo "<img src='{$imagePath}' alt='{$product['name']}' />";
                echo "<h2>{$product['name']}</h2>";
                echo "<p>価格: ¥{$product['price']}</p>";
                echo "</div>";
            } else {
                echo "<div class='product'>Rank {$rank}: 商品が見つかりませんでした。</div>";
            }
        }
        ?>

    </main>
</body>

</html>