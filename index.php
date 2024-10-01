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
  <main>

    <?php
    require 'includes/header.php';
    ?>

    <!-- パンくず -->
    <nav class="navigator">
      <ol class="bread_crumb">
        <li><a href="index.php">TOP</a></li>
        <li>商品一覧</li>
      </ol>
    </nav>
    <hr class="brown_line">

    <!-- ようこそユーザー名 -->
    <div class="navigator">

      <?php
      session_start();
      // データベース接続、SQL文の準備・実行
      require 'includes/database.php';
      $sql = $pdo->prepare('select * from customer where login=?');
      // ログインしていたらユーザー名表示、していなければゲスト様を表示
      if (isset($_SESSION['customer'])) {
        echo '<p class="greeting">ようこそ　', $_SESSION['customer']['name'], '様</p>';
      } else {
        echo '<p class="greeting">ようこそ　ゲスト様</p>';
      }
      ?>

    </div>
    <hr class="brown_line">

    <!-- hero画像 -->
    <h1>
      <img src="common/images/top-hero-sp.png" alt="topページhero画像" class="hero_sp">
      <img src="common/images/top-hero-pc.png" alt="topページhero画像" class="hero_pc">
    </h1>

    <!-- セクション１ -->
    <section class="sec_1">
      <div class="grid">
        <a href="" class="new_item">
          <img src="common/images/5.png" alt="新商品の画像">
          <div class="new_mark">
            <p>新商品</p>
          </div>
        </a>
        <a href="#" class="donuts_life">
          <img src="common/images/top-dounutslife.png" alt="ドーナツのある生活画像">
        </a>
        <a href="product.php" class="banner">
          <img src="common/images/top-banner.png" alt="商品一覧へ行くバナー">
        </a>
      </div>
      </div>

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
          <h2>philosophy</h2>
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
      <section>
        <h3 class="title">人気ランキング</h3>
      </section>
      <div class="back_to_top">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-square top_btn" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 9.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z" />
        </svg>
        <!-- <img src="common/images/top-btn.svg" alt="ページトップへ戻るボタン" class="top_btn"> -->
      </div>
  </main>
  <!-- パンくずJsonLD-->

  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [{
          "@type": "ListItem",
          "position": 1,
          "name": "TOP",
          "item": "index.php"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "商品一覧",
          "item": "product.php"
        }
      ]
    }
  </script>

  <?php
  require 'includes/footer.php';
  ?>

</html>