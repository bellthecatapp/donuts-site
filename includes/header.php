<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../common/css/reset.css">
  <style>
    /* 最大幅時調整用の入れ物 */
    .common_header_bwrapper {
      background: #EDE0D4;
      padding-top: 16px;
      padding-left: 12px;
      padding-right: 12px;
      padding-bottom: 12px;
    }

    .header_gmenu {
      display: flex;
      align-items: center;
      position: relative;
    }

    /* ハンバーガーメニュー */
    .header_navicon,
    .header_navicon::after,
    .header_navicon::before {
      content: " ";
      display: block;
      width: 24px;
      height: 3px;
      background: #7F5539;
      position: absolute;
    }

    .header_navicon::before {
      bottom: 10px;
    }

    .header_navicon::after {
      top: 10px;
    }

    /* 各グローバルメニュー要素の調整 */
    .header_logo {
      min-width: 60px;
      text-align: right;
      flex-basis: 50%;
    }



    .header_icons {
      position: absolute;
      right: 0;
    }

    .header_serch {
      margin-top: 12px;
      margin-bottom: 12px;
      text-wrap: nowrap;
    }

    .header_serch button {
      padding: 8px;
      text-align: center;
      background: #D9D9D9;
      border: 1px solid #7F5539;
      aspect-ratio: 1 / 1;
    }

    .header_serch button img {
      max-width: 100%;
    }

    .header_serch input[type=text] {
      background: #fff;
      border: 1px solid #7F5539;
      width: 90.4%;
      padding: 8px;

    }
  </style>
  <title>Document</title>
</head>

<body>

</body>

</html>
<header>
  <div class="common_header_bwrapper">
    <nav class="header_gmenu">
      <div class="header_hammenu_box">
        <button id="open_button">
          <span class="header_navicon"></span></button>
        <div class="hammenu_close">
          <div class="hammenu_logos"><img src="../common/images/logo.svg" alt="c.c.donutsのロゴ"><button id="hammenu_close_icon"></button></div>
          <ul class="header_hammenu">
            <li><a href="index.php">top</a></li>
            <li><a href="concept.html">商品一覧</a></li>
            <li><a href="#!">よくある質問</a></li>
            <li><a href="#!">問い合わせ</a></li>
            <li><a href="#!">当サイトのポリシー</a></li>
          </ul>
        </div>
      </div>
      <div class="header_logo">
        <a href="../index.php"> <img src="../common/images/logo.svg" alt="c.c.donutsのロゴ"></a>
      </div>
      <div class="header_icons">
        <button><a href="../login-input.php"><img src="../common/images/header-login.svg" alt="ログインアイコン"></a></button>
        <button><a href="../cart-show.php"><img src="../common/images/header-cart.svg" alt="カートアイコン"></a></button>
      </div>
    </nav>
    <div class="header_serch"><button><img src="../common/images/header-vector.svg" alt="検索アイコン"></button><input type="text"></div>
  </div>

</header>

<script>
  const hammenu = document.querySelector('.hammenu_close');
  const openButton = document.getElementById('open_button');
  const closeButton = document.getElementById('hammenu_close_icon');

  openButton.onclick = function() {
    hammenu.classList.remove('hammenu_close');
    hammenu.classList.add('hammenu_open');
  }
</script>