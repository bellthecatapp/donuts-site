<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common/css/reset.css">
    <link rel="stylesheet" href="common/css/common.css">
    <link rel="stylesheet" href="common/css/card.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="">
    <!-- ↑ページ別の.cssをリンク -->
    <title>カード情報登録完了｜C.C.Donuts</title>
</head>

<body>

    <!-- コンテンツ -->

    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=donuts;charset=utf8', 'donuts', 'password');

    $name = htmlspecialchars($_REQUEST['card_name']);
    $company = htmlspecialchars($_REQUEST['card_com']);
    $num = htmlspecialchars($_REQUEST['card_num']);
    $mlimit = htmlspecialchars($_REQUEST['card_mlimit']);
    $ylimit = htmlspecialchars($_REQUEST['card_ylimit']);
    $secnum = htmlspecialchars($_REQUEST['card_secnum']);

    if (!isset($_SESSION['customer'])) {
        echo <<<END
        <h1>エラー！</h1>
  <div class="result_box">
      <p>ログインが確認されませんでした。</p>
      <p class="link_pr"><a href="login-input.php">ログインしてから出直してきてください。</a></p>
  </div>
  END;
    } else {
        // ログインしていたら、既にカードが登録済みか確認
        $sql = $pdo->prepare('select * from card where card_no=?');
        $sql->execute([$num]);
    }

    if (empty($sql->fetchAll())) {
        $sql = $pdo->prepare('insert into card values(?,?,?,?,?,?,?)');
        if ($sql->execute([$_SESSION['customer']['id'], $name, $company, $num, $mlimit, $ylimit, $secnum])) {
            echo <<<END
                      <h1>カード情報登録完了</h1>
                <div class="result_box">
                    <p>クレジットカード情報を登録しました。</p>
                    <p class="link_pr"><a href="purchase-comfirm.php">購入手続きを続ける</a></p>
                </div>
 END;
        } else {
            echo <<<END
                    <h1>エラー！</h1>
              <div class="result_box">
                  <p>会員登録が失敗しました</p>
                  <p class="link_pr"><a href="customer-input.php">入力からやり直してください。</a></p>
              </div>
        END;
        }
    } else {
        echo <<<END
        <h1>エラー！</h1>
    <div class="result_box">
      <p>カードが登録済みです。</p>
      <p class="link_pr"><a href="purchase-confirm.php">購入画面に戻る</a></p>
    </div>
END;
    }

    ?>


    </main>
    <?php require 'includes/footer.php'; ?>