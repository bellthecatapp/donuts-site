<? session_start(); ?>
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
    <title>ご入力内容の確認｜C.C.Donuts</title>
</head>

<body>

    <!-- コンテンツ -->
    <header>
        <div class="customer_wrapper"><a href="index.php"><img src="common/images/logo.svg" alt="c.c.donutsのロゴ"></a></div>
    </header>
    <main>
        <div class="customer_wrapper">
            <h1>ご入力内容の確認</h1>
            <?php
            $datalist = [
                'card_name' => 'お名前',
                'card_com' => 'カード会社',
                'card_num' => 'カード番号',
                'card_mlimit' => '有効期限',
                'card_secnum' => 'セキュリティコード',
            ];
            // ログインしているかのチェック


            if (isset($_REQUEST)) {
                // 入力 あり　true
                if (!preg_match('/^[0-9]{14,}$/', $_REQUEST['card_num'])) {
                    // カード番号不備 true　エラー表示
                    echo <<<END
                    <div class="result_box">
                <p>カード番号の入力を確認してください。</p>
                <p>再入力をお願いいたします。</p>
                    <p class="link_pr"><a href="card-input.php">入力ページへ戻る</a></p>
                    </div>
END;
                } elseif (!preg_match('/^[A-Z]{1,}$/', $_REQUEST['card_name'])) {
                    // カードの名義チェック
                    echo <<<END
<p>カード名義を確認してください。半角大文字での入力でお願いします。</p>
    <a href="card-input.php">入力ページへ戻る</a>
END;
                } elseif (!preg_match('/^[0-9]{1}$/', $_REQUEST['card_mlimit']) || !preg_match('/^[0-9]{4}$/', $_REQUEST['card_ylimit'])) {
                    // 有効期限が不適切 true
                    echo <<<END
                    <p>カードの有効期限を確認してください</p>
                        <a href="card-input.php">入力ページへ戻る</a>
    END;
                } elseif (!preg_match('/^[0-9]{3,}$/', $_REQUEST['card_secnum'])) {
                    // セキュリティコードが不適切　true
                    echo <<<END
                    <p>セキュリティコードを確認してください</p>
                        <a href="card-input.php">入力ページへ戻る</a>
    END;
                } else {
                    // 全部の入力問題なし　false
                    // 表示
                    echo '<dl>';
                    foreach ($datalist as $key => $data) {
                        echo '<dt>', $data, '</dt>';
                        if ($key == 'card_secnum') {
                            // セキュリティコードだけ隠して表示させてみる
                            echo '<dd class="common_ddline">', str_repeat('・', strlen($_REQUEST['card_secnum'])), '</dd>';
                        } elseif ($key == 'card_mlimit') {
                            echo '<dd class="common_ddline">', sprintf('%02d', $_REQUEST['card_mlimit']), '/', $_REQUEST['card_ylimit'], '</dd>';
                        } else {
                            echo '<dd class="common_ddline">', $_REQUEST[$key], '</dd>';
                        }
                    }
                    echo ' </div">';
                    echo '</dl>';
                    // 隠しデータを送れるように
                    echo ' <form action="card-complete.php" method="post">';
                    foreach ($datalist as $key => $data) {
                        echo '<input type="hidden" name="', $key, '" value="', $_REQUEST[$key], '">';
                        echo '</dl>';
                    }
                    echo '<input type="hidden" name="card_ylimit" value="', $_REQUEST['card_ylimit'], '">';
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