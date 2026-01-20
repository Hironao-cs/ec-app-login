<!-- 会員登録フォーム -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>いってら会員登録フォーム</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header class="header">
        <div class="container">
            <h1 class="logo">いってら〜A高校〜</h1>
        </div>
    </header>
    <main class="main-content">
        <div class="form-container">
            <h3>〜A高校〜いってら会員登録フォーム</h3>
        
            <form action="post_confirm.php" method="post">
            <div class="form-group">
                <label class="required">所属</label>
                <select name="user_type">
                    <option value="">所属を選択してください</option>
                    <!-- ✅所属を選択させるphpを書く -->
                     <?php
                        // 選択肢の配列を作成
                        $types = ["教員", "生徒（1年生）", "生徒（2年生）", "生徒（3年生）", "卒業生", "保護者"];
                        // PHPでループしてoptionタグを生成
                        foreach($types as $type){
                            echo "<option value='{$type}'>{$type}</option>";
                        }
                        ?>
                </select>
            </div>
            <div class="form-group">
                <label class="required">お名前</label>
                <input type="text" name="name" placeholder="山田　太郎"required>
            </div>

            <div class="form-group">
                <label class="required">ユーザーID</label>
                <input type="text" name="user_id" placeholder="半角英字と数字を組み合わせてください">
            </div>

            <div class="form-group">
                <label class="required">パスワード</label>
                <input type="text" name="user_pw" placeholder="半角英字と数字を組み合わせてください">
            </div>
            <button type="submit" class="submit-btn">内容を確認して送信</button>
            </form>
        </div>
    </main>
    <footer class="footer">
        <div class="container">
            <p>&copy; 2026 A高校 Official Store. All Rights Reserved.</p>
        </div>
    </footer>
    <script src="js/main.js"></script>
</body>
</html>