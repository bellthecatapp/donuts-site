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
    <link rel="stylesheet" href="common/css/login_out.css">
    <!-- ↑ページ別の.cssをリンク -->
    <title>ログイン完了｜C.C.Donuts</title>
</head>

<body>
    <!-- セッション開始 -->
    <?php session_start(); ?>
    <?php
    require 'includes/header.php';
    ?>

    <!-- パンくず -->

    <!-- ユーザー名 -->

    <!-- コンテンツ -->
    <?php
    //既存のセッション破棄
    unset($_SESSION['customer']);
    //データベース接続
    require 'includes/database.php';
    //SQL文の準備
    $sql = $pdo->prepare('select * customer where mail=? and password=?');
    // SQL文の実行
    $sql->execute([
        $_REQUEST['login'],
        $_REQUEST['password']
    ]);
    // 取得したデータをセッションのcustomer変数に保存
    foreach ($sql as $row) {
        $_SESSION['customer'] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'address' => $row['address'],
            'mail' => $row['mail'],
            'password' => $row['password']
        ];
    }
    if (isset($_SESSION['customer'])) {
        echo <<<END


            END;
    } else {
        echo 'ログイン名またはパスワードが違います';
    }
    ?>
    <main>
        <div class="inner">
            <h1 class="common_subpage">ログイン完了</h1>
            <div class="login_wrapper">
                <div class="login_frame_complete">
                    <p class="complete_text">ログインが完了しました。</p>
                </div>
                <div class="login_frame2">
                    <p class="linkedtext"><a href="index.php">TOPページへ戻る</a></p>
                </div>

            </div>
        </div>

    </main>

    <?php
    require 'includes/footer.php';
    ?>