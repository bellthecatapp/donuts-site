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
    <link rel="stylesheet" href="">
    <!-- ↑ページ別の.cssをリンク -->
    <title>ご入力内容の確認｜donuts-site</title>
</head>

<body>
    <!-- パンくず -->

    <!-- ユーザー名 -->

    <!-- コンテンツ -->
    <header>
        <div class="customer_wrapper"><img src="common/images/logo.svg" alt="c.c.donutsのロゴ"></div>
    </header>
    <main>
        <div class="customer_wrapper">
            <h1>ご入力内容の確認</h1>
            <?php
            $datalist = [
                'cus_name' => 'お名前',
                'cus_ruby' => 'お名前（フリガナ）',
                'cus_addnum' => '郵便番号',
                'cus_address' => '住所',
                'cus_mail' => 'メールアドレス',
                'cus_pass' => 'パスワード'
            ];

            if (isset($_REQUEST)) {
                // 入力 あり　true
                if (!preg_match('/^(?=.[a-z])(?=.[A-Z])(?=.[0-9])[a-zA-Z0-9]{8,}$/', $_REQUEST['cus_pass'])) {
                    // パスワード入力不備 true　エラー表示
                    echo <<<END
                <p>パスワードの入力を確認してください。再入力をお願いいたします。</p>
                    <a href="customer-input.php">入力ページへ戻る</a>
END;
                } else {
                    // 全部の入力問題なし　false
                    echo <<< END
            <form action="customer-complete.php" method="post">
<input type="hidden" value={$name}>
<input type="hidden" value={$ruby}>
<input type="hidden" value={$addnum}>
<input type="hidden" value={$address}>
<input type="hidden" value={$mail}>
<input type="hidden" value={$pass}>

                <div class="form_submit"><input type="submit" value="ご入力内容を確認する"></div>
            </form>?>
        </div>
END;
                }
            } else {
                // 入力が確認できない場合 エラーメッセージ
                echo '
<p>パスワードの入力を確認してください。再入力をお願いいたします。</p>
<a href="customer-input.php">入力ページへ戻る</a>';
            }
            ?>
    </main>
    <?php require 'includes/footer.php'; ?>