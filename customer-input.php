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
    <header><img src="common/images/logo.svg" alt="c.c.donutsのロゴ"></header>

    <main>
        <h1>会員登録</h1>

        <form action="customer-confirm.php" method="post">
            <fieldset>
                <legend>お名前<span>(必須)</span></legend>
                <input type="text" required>
            </fieldset>
            <fieldset>
                <legend>お名前(フリガナ)<span>(必須)</span></legend>
                <input type="text" required>
            </fieldset>
            <fieldset>
                <legend>郵便番号<span>(必須)</span></legend>
                <input type="text" required>
            </fieldset>
            <fieldset>
                <legend>住所<span>(必須)</span></legend>
                <input type="text" required>
            </fieldset>
            <fieldset>
                <legend>メールアドレス<span>(必須)</span></legend>
                <input type="email" required>
            </fieldset>
            <fieldset>
                <legend>パスワード<span>(必須)</span></legend>
                <input type="password" required>
            </fieldset>
            <input type="submit" value="ご入力内容を確認する">
        </form>
    </main>
</body>

</html>