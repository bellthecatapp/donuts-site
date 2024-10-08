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
    <title>ご入力内容の確認｜C.C.Donuts</title>
</head>

<body>
    <header>
        <div class="customer_wrapper"><a href="index.php"><img src="common/images/logo.svg" alt="c.c.donutsのロゴ"></a></div>
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
                if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{8,}$/', $_REQUEST['cus_pass']) && !preg_match('/^[0-9]{7}$/', $_REQUEST['cus_addnum'])) {
                    echo <<<END
                    <div class="result_box">
                <p>パスワードと郵便番号 の入力を確認してください。</p>
                <p>再入力をお願いいたします。</p>
                    <p class="link_pr"><a href="customer-input.php">入力ページへ戻る</a></p>
                    </div>
END;
                } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{8,}$/', $_REQUEST['cus_pass'])) {
                    // パスワード入力不備 true　エラー表示
                    echo <<<END
                    <div class="result_box">
                <p>パスワードの入力を確認してください。</p><p>再入力をお願いいたします。</p>
                    <p class="link_pr"><a href="customer-input.php">入力ページへ戻る</a></p>
                    </div>
END;
                } elseif (!preg_match('/^[0-9]{7}$/', $_REQUEST['cus_addnum'])) {
                    // 郵便番号が不適切
                    echo <<<END
                    <p>郵便番号の入力を確認してください。ハイフンなしの7桁で再入力をお願いいたします。</p>
                        <a href="customer-input.php">入力ページへ戻る</a>
    END;
                } else {
                    // 全部の入力問題なし　false
                    // 表示
                    echo '<dl>';
                    foreach ($datalist as $key => $data) {
                        echo '<dt>', $data, '</dt>';
                        if ($key == 'cus_pass') {
                            // パスだけ隠して表示させてみる
                            echo '<dd class="common_ddline">', str_repeat('・', strlen($_REQUEST['cus_pass'])), '</dd>';
                        } else {
                            echo '<dd class="common_ddline">', $_REQUEST[$key], '</dd>';
                        }
                    }
                    echo ' </div">';
                    echo '</dl>';
                    // 隠しデータを送れるように
                    echo ' <form action="customer-complete.php" method="post">';
                    foreach ($datalist as $key => $data) {
                        echo '<input type="hidden" name="', $key, '" value="', $_REQUEST[$key], '">';
                        echo '</dl>';
                    }
                    echo <<<END
<div class="form_submit"><input type="submit" value="この内容で登録する"></div>
            </form>
END;
                }
            } else {
                // 入力が確認できない場合 エラーメッセージ
                echo '
<p>再入力をお願いいたします。</p>
<a href="customer-input.php">入力ページへ戻る</a>';
            } ?>
    </main>
    <?php require 'includes/footer.php'; ?>