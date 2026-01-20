<!-- ログインフォーム -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン - いってら〜A高校〜</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <h1 class="logo">いってら〜A高校〜</h1>
        </div>
    </header>

    <main class="main-content">
        <div class="form-container">
            <h3>ログイン</h3>
            
            <form action="login_act.php" method="post">
                <div class="form-group">
                    <label>ユーザーID</label>
                    <input type="text" name="user_id" placeholder="IDを入力してください" required>
                </div>

                <div class="form-group">
                    <label>パスワード</label>
                    <input type="password" name="user_pw" placeholder="パスワードを入力してください" required>
                </div>

                <button type="submit" class="submit-btn">ログイン</button>
            </form>

            <div style="text-align:center; margin-top:20px; font-size:14px;">
                <p>アカウントをお持ちでない方は <a href="index.php" style="color:#b1284b; font-weight:bold;">こちらから新規登録</a></p>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2026 A高校 Official Store. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>