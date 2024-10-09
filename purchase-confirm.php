<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common/css/reset.css">
    <link rel="stylesheet" href="common/css/common.css">
    <link rel="stylesheet" href="common/css/purchase.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="">
    <!-- ↑ページ別の.cssをリンク -->
    <title>ご購入確認｜C.C.Donuts</title>
</head>

<body>
    <header>
        <div class="customer_wrapper"><a href="index.php"><img src="common/images/logo.svg" alt="c.c.donutsのロゴ"></a></div>
    </header>
    <main>
        <h1>ご購入確認</h1>

        <?php

        if (!isset($_SESSION['customer'])) {
            echo <<<END
    <div class="result_box">
<p>ログアウト中です。</p>
    <p>購入するにはログインをお願いいたします。</p>
    <p class="link_pr"><a href="login-input.php">ログインページへ</a></p>
    </div>
END;
        } elseif (!isset($_SESSION['product'])) {
            echo <<<END
            <div class="result_box">
        <p>カートに商品がありません。</p>
            <p class="link_pr"><a href="product.php">商品一覧ページへ</a></p>
            </div>
        END;
        } else {
            $total = 0;
            echo '<section class="puc_pro">';

            echo '<h2>ご購入商品</h2>';
            foreach ($_SESSION['product'] as $id => $product) {
                $subtotal = $product['price'] * $product['count'];
                $total += $subtotal;
                echo <<<END
<dl class="product_box">
<div class="flex_box">
<dt>商品名</dt>
<dd class="product_name common_ddline">{$product['name']}</dd>
</div>
<div class="flex_box">
<dt>数量</dt>
<dd class="count common_ddline">{$product['count']}個</dd>
</div>
<div class="flex_box">
 <dt>小計</dt>
 <dd class="product_price common_ddline">税込 &yen;
 
END;
                echo number_format($subtotal);
                echo <<<END
</dd></div>
</dl>
END;
            }
            echo <<<END
<div class="total_box">
<dl class="flex_box">
<dt>合計</dt>
<dd class="total_price common_ddline">税込 &yen;
END;
            echo number_format($total);
            echo <<<END
</dd>
</dl>
</div>
</section>
END;


            echo <<<END
<section class="puc_address">
 <h2>お届け先</h2>
<dl>
<div class="flex_box">
 <dt>お名前</dt><dd class="common_ddline">{$_SESSION['customer']['name']}</dd>
</div>
<div class="flex_box">
<dt>ご住所</dt><dd class="common_ddline">{$_SESSION['customer']['address']}</dd></dl>
</div>
</section>
<section class="puc_method">

<h2>お支払方法</h2>
END;
            $id = $_SESSION['customer']['id'];
            require 'includes/database.php';
            $sql = $pdo->prepare('select * from card where id=?');
            $sql->execute([$id]);
            if (empty($sql->fetchAll())) {
                echo <<<END
    <div class="require_card"><p>お支払方法が選択されていません</p>
    <p>クレジットカード情報を登録してください。</p>    </div>
    <div class="form_submit"><button class="common_form_submit" onclick="location.href='card-input.php'">カード情報を登録する</button>

END;
            } else {
                $sql = $pdo->prepare('select * from card where id=?');
                $sql->execute([$id]);
                echo '<dl>';
                foreach ($sql as $row) {
                    echo <<<END
                    <div class="spflex_box">
<dt>お支払い</dt>
<dd  class="common_ddline">クレジットカード</dd>
</div>
                    <div class="spflex_box">

<dt>カード種類</dt>
<dd  class="common_ddline">{$row['card_type']}</dd>
</div>
                    <div class="spflex_box">

<dt>カード番号</dt>
<dd  class="common_ddline">
END;
                    echo mb_substr($row['card_no'], 0, 6, 'UTF8') . str_repeat('・', mb_strlen($row['card_no'], 'UTF8') - 6);
                    echo <<<END
</dd>
</div>
END;
                }
                echo <<< END
</dl>
</section>
<div class="form_submit"><button class="common_form_submit" onclick="location.href='purchase-complete.php'">購入を確定する</button></a>
END;
            }
        }

        ?>




    </main>
    <?php require 'includes/footer.php'; ?>