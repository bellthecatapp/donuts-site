
    <?php
    if (!isset($_SESSION['customer'])) {
        echo '<div  class="result_box">';
        echo '<p>ログインされていません。</p>';
        echo '<p class="link_pr"><a href="login-input.php">ログインしてから出直してきてください。</a></p>';
        echo '</div>';
    } else {
        if (!empty($_SESSION['product'])) {
            $total = 0;
            foreach ($_SESSION['product'] as $id => $product) {
                echo <<<END
<div class="product_box">
<div class="product_img"><img alt="商品画像" src="common/images/{$id}.png"></div>
 <div class="pr_box">
<p class="product_name">{$product['name']}</p>
<div>
<p class="product_price">税込 &yen;
END;
                echo number_format($product['price']);
                echo <<<END
 </p>
<p class="count"><span>数量</span>{$product['count']}個</p>
</div>
<p class="cart_delete"><a href="cart-delete.php">削除する</a></p>
</div>
</div>
END;
                $subtotal = $product['price'] * $product['count'];
                $total += $subtotal;
            }
            echo <<<END
                <div class="total_box">
<p class="total_price">ご注文合計：<span>税込 &yen;
END;
            echo number_format($total);
            echo <<<END
</span></p>
<p><button class="common_btn_cart"><a href="purchase-confirm.php">ご購入確認へ進む</a></button></p>
</div>
<div class="continue"><button class="common_btn_cart"><a href="product.php">買い物を続ける</a></button></div>
END;
        } else {
            echo '<div class="result_box">';
            echo '<p>カートに商品がありません。</p>';
            echo '<p class="link_pr"><a href="product.php">商品一覧に戻る</a></p>';
            echo '</div>';
        }
    }

    ?>