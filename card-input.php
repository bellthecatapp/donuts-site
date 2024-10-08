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
    <!-- ↑ページ別の.cssをリンク -->
    <title>カード情報登録｜C.C.Donuts</title>
</head>

<body>



    <header>
        <div class="customer_wrapper"><a href="index.php"><img src="common/images/logo.svg" alt="c.c.donutsのロゴ"></a></div>
    </header>


    <!-- コンテンツ -->

    <main>
        <?php
        if (!isset($_SESSION['customer'])) {
            echo <<<END
            <h1>エラー！</h1>
            <div class="result_box">
                <p>ログインが確認されませんでした。</p>
                <p class="link_pr"><a href="login-input.php">ログインしてから出直してきてください。</a></p>
            </div>
END;
        } else {
            echo <<<END
        <div class="customer_wrapper">
            <h1>カード情報登録</h1>

            <form action="card-confirm.php" method="post">
                <fieldset>
                    <legend>お名前<span class="common_required">(必須)</span></legend>
                    <input type="text" name="card_name" class="common_input" placeholder="DONUTSTARO" required>
                </fieldset>
                <fieldset class="card_company">
                    <legend>カード会社<span class="common_required">(必須)</span></legend>
                    <div>
                        <label> <input type="radio" name="card_com" value="JCB" checked><span>JCB</span></label>
                        <label> <input type="radio" name="card_com" value="Visa"><span>Visa</span></label>
                        <label><input type="radio" name="card_com" value="Mastercard"><span>Mastercard</span></label>
                    </div>
                </fieldset>
                <fieldset class="card_num">
                    <legend>カード番号<span class="common_required">(必須)</span></legend>
                    <input type="text" name="card_num" class="common_input" placeholder="1234123412341234" required>
                </fieldset>
                <fieldset class="card_limit">
                    <legend>有効期限<span class="common_required">(必須)</span></legend>
                    <p><input type="text" name="card_mlimit" class="common_shortinput" placeholder="01" required>月</p>
                    <p><input type="text" name="card_ylimit" class="common_shortinput" placeholder="2030" required>年</p>
                </fieldset>
                <fieldset>
                    <legend>セキュリティコード<span class="common_required">(必須)</span></legend>
                    <input type="text" name="card_secnum" class="common_shortinput" placeholder="123" required>
                </fieldset>
                <!-- ボタンクラス　共通のやつつける、あとで -->
                <div class="form_submit"><input type="submit" value="ご入力内容を確認する" class="common_btn_lg"></div>
            </form>
        </div>
END;
        } ?>
    </main>

    <?php require 'includes/footer.php'; ?>