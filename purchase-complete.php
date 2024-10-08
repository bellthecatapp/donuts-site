<?php session_start(); ?>
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
    <title>ご購入完了｜C.C.Donuts</title>
</head>

<body>
    <header>
        <div class="customer_wrapper"><a href="index.php"><img src="common/images/logo.svg" alt="c.c.donutsのロゴ"></a></div>
    </header>

    <!-- コンテンツ -->
    <main>
        <?php require 'includes/database.php';
        $purchase_id = 1;
        foreach ($pdo->query('select max(id) from purchase') as $row) {
            $purchase_id = $row['max(id)'] + 1;
        }
        $sql = $pdo->prepare('insert into purchase values(?,?)');
        if ($sql->execute([$purchase_id, $_SESSION['customer']['id']])) {
            foreach ($_SESSION['product'] as $product_id => $product) {
                $sql = $pdo->prepare('insert into purchase_detail values(?,?,?)');
                $sql->execute([$purchase_id, $product_id, $product['count']]);
            }
            unset($_SESSION['product']);
            echo <<<END
        <div class="result_box">
<p>ご購入が完了しました。</p>
    <p>今後ともご愛顧の程、宜しくお願いいたします。</p>
    </div>
    <p><a href="index.php">TOPページに戻る</a></p>
END;
        } else {
            echo <<<END
            <div class="result_box">
    <p>エラーが発生しました。</p>
        <p>恐れ入りますが、もう一度お手続きをお願いいたします。</p>
         <p class="link_pr"><a href="cart-show.php">カートへ戻る</a></p>
         </div>
END;
        }




        ?>
    </main>
    <?php require 'includes/footer.php'; ?>