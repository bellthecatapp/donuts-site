<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common/css/reset.css">
    <link rel="stylesheet" href="common/css/common.css">
    <link rel="stylesheet" href="common/css/customer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <!-- ↑ページ別の.cssをリンク -->
    <title>会員登録完了｜C.C.Donuts</title>
</head>

<body>
    <!-- パンくず -->

    <!-- ユーザー名 -->

    <!-- コンテンツ -->
    <header>
        <div class="customer_wrapper"><a href="index.php"><img src="common/images/logo.svg" alt="c.c.donutsのロゴ"></a></div>
    </header>
    <main>

        <?php
        $pdo = new PDO('mysql:host=localhost;dbname=donuts;charset=utf8', 'donuts', 'password');

        $name = htmlspecialchars($_REQUEST['cus_name']);
        $ruby = htmlspecialchars($_REQUEST['cus_ruby']);
        $addnum = htmlspecialchars($_REQUEST['cus_addnum']);
        $address = htmlspecialchars($_REQUEST['cus_address']);
        $mail = htmlspecialchars($_REQUEST['cus_mail']);
        $pass = htmlspecialchars($_REQUEST['cus_pass']);

        $sql = $pdo->prepare('select * from customer where mail=?');
        $sql->execute([$_REQUEST['cus_mail']]);

        if (empty($sql->fetchAll())) {
            $sql = $pdo->prepare('insert into customer values(null,?,?,?,?,?,?)');
            if ($sql->execute([$name, $ruby, $addnum, $address, $mail, $pass])) {
                echo <<<END
                      <h1>会員登録完了</h1>
                <div class="result_box">
                    <p>会員登録が完了しました</p>
                    <p class="link_pr"><a href="login-input.php">ログイン画面に進む</a></p>
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
  <p>既に登録済みのメールアドレスです。</p>
   <p>どうしてもアカウントを作りたい場合は他のメールアドレスを試してみて下さい。</p>
  <p class="link_pr"><a href="customer-input.php">入力からやり直してください。</a></p>
</div>
END;
        }
        ?>


    </main>
    <?php require 'includes/footer.php'; ?>