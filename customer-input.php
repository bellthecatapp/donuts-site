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
    <title>会員登録｜donuts-site</title>
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
            <h1>会員登録</h1>

            <form action="customer-confirm.php" method="post">
                <fieldset>
                    <legend>お名前<span class="customer_req">(必須)</span></legend>
                    <input type="text" name="cus_name" required>
                </fieldset>
                <fieldset>
                    <legend>お名前(フリガナ)<span class="customer_req">(必須)</span></legend>
                    <input type="text" name="cus_ruby" required>
                </fieldset>
                <fieldset class="customer_addnum">
                    <legend>郵便番号<span class="customer_req">(必須)</span></legend>
                    <input type="text" name="cus_addnum" required>
                </fieldset>
                <fieldset>
                    <legend>住所<span class="customer_req">(必須)</span></legend>
                    <input type="text" name="cus_address" required>
                </fieldset>
                <fieldset>
                    <legend>メールアドレス<span class="customer_req">(必須)</span></legend>
                    <input type="email" name="cus_mail" required>
                </fieldset>
                <fieldset>
                    <legend>パスワード<span class="customer_req">(必須)</span></legend>
                    <p class="customer_pass"><small>A-Z、a-z、0-9を少なくとも各１つは含めて８文字以上で入力してください。</small></p>
                    <input type="password" name="cus_pass" required>
                </fieldset>
                <!-- ボタンクラス　共通のやつつける、あとで -->
                <div class="form_submit"><input type="submit" value="ご入力内容を確認する"></div>
            </form>
        </div>
    </main>
    <?php require 'includes/footer.php'; ?>