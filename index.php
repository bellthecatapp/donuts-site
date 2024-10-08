<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>C.C.Donuts</title>
  <link rel="stylesheet" href="common/css/reset.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="common/css/common.css">
  <link rel="stylesheet" href="common/css/top.css">
</head>

<body>
  <?php
  require 'includes/header.php';
  ?>
  <main>

    <!-- ようこそユーザー名 -->
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
    <!-- <hr class="brown_line"> -->

    <!-- hero画像 -->
    <h1>
      <img src="common/images/top-hero-sp.png" alt="topページhero画像" class="hero_sp">
      <img src="common/images/top-hero-pc.png" alt="topページhero画像" class="hero_pc">
    </h1>

    <!-- セクション１ -->
    <section class="sec_1">
      <div class="grid">
        <h2 class="h2_new">サマーシトラス</h2>
        <?php
        require 'includes/database.php';
        $pdo->query('select * from product where id');
        echo <<<END
        <a href="detail.php?id=5" class="new_item">
          <img src="common/images/5.png" alt="新商品の画像">
          <div class="new_mark">
            <p>新商品</p>
          </div>
        </a>
END;

        ?>
        <h2 class="h2_life">ドーナツのある生活</h2>
        <a href="#" class="donuts_life">
          <img src="common/images/top-dounutslife.png" alt="ドーナツのある生活画像">
        </a>
        <h2 class="h2_banner">商品一覧</h2>
        <a href=" product.php" class="banner">
          <img src="common/images/top-banner.png" alt="商品一覧へ行くバナー">
        </a>
      </div>
      </div>
    </section>

    <!-- セクション2 -->
    <section class="sec_2">
      <!-- SP用背景 -->
      <div class="bg_sp">
        <img src="common/images/top-bg-sp.png" alt="">
      </div>
      <!-- PC用背景 -->
      <div class="bg_pc">
        <img src="common/images/top-bg-pc.png" alt="">
      </div>

      <div class="container">
        <h2 class="h2_sec2">philosophy</h2>
        <div>
          <p class="sub_title">私たちの信念</p>
        </div>
        <div class="inner">
          <p class="main_text">"creating connections"</p>
          <p class="sub_text">ドーナツでつながる</p>
        </div>
      </div>
    </section>

    <!-- セクション3 -->
    <section class="sec_3">
      <h2 class="common_title">人気ランキング</h2>
      <form action="cart-input.php" method="post" class="common_product_form">
        <ol class="common_product_content">
          <?php
          // データベース接続
          require 'includes/database.php';
          // ランキングの連想配列 (順位 => 商品ID)
          $ranking = [
            1 => 1,
            2 => 7,
            3 => 8,
            4 => 2,
            5 => 9,
            6 => 6,
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
              $imagePath = "common/images/{$id}.png";
              $price = number_format($product['price']);
              // HTMLに出力

              echo '<li class="common_product_items">';
              if ($rank == 1) {
                echo '<div class="ranking_num yellow">', $rank, '</div>';
              } else {
                echo '<div class="ranking_num pink">', $rank, '</div>';
              }
              echo <<<END
                <a href="detail.php?id={$id}" class="common_products_imglink"> 
                 <img src='{$imagePath}' alt='{$product['name']}' class="common_produts_img"/>
                </a>
                <a href="detail.php?id={$id}" class="flex_grow">
                 <p class="common_products_name">{$product['name']}</p>
                </a>
                <div class="common_pricearea">
                 <p class="common_price">税込み　 ¥{$price}</p>
                 <a href="#!">
                 <img src="common/images/heart.png" alt="お気に入りボタン" class="common_heart">
                 </a>
                </div>
                <div class="common_btn_cart">
                <input type="hidden" name="id" value="{$id}">
                <input type="hidden" name="name" value="{$product['name']}">
                <input type="hidden" name="price" value="{$product['price']}">
                <input type="submit" value="カートに入れる">
                </div>
              </li>
END;
            }
          }
          ?>
        </ol>
      </form>
    </section>
  </main>
  <?php
  require 'includes/footer.php';
  ?>

</html>