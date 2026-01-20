<?php
$user_type = $_POST['user_type'] ?? '';
$name      = $_POST['name'] ?? '';
$user_id   = $_POST['user_id'] ?? '';
$user_pw   = $_POST['user_pw'] ?? '';

if ($name == "" || $user_id == "" || $user_pw == "") {
    exit('未入力の項目があります。戻って入力してください。');
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録内容の確認 - いってら〜A高校〜</title>
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
            <h3 class="confirm-title">登録内容の確認</h3>
            <p class="confirm-subtitle">以下の内容で登録しますか？</p>
            
            <table class="confirm-table">
                <tr>
                    <th>所属</th>
                    <td><?= htmlspecialchars($user_type, ENT_QUOTES) ?></td>
                </tr>
                <tr>
                    <th>お名前</th>
                    <td><?= htmlspecialchars($name, ENT_QUOTES) ?></td>
                </tr>
                <tr>
                    <th>ユーザーID</th>
                    <td><?= htmlspecialchars($user_id, ENT_QUOTES) ?></td>
                </tr>
                <tr>
                    <th>パスワード</th>
                    <td>******** (セキュリティのため非表示)</td>
                </tr>
            </table>

            <form action="insert.php" method="post">
                <input type="hidden" name="user_type" value="<?= htmlspecialchars($user_type, ENT_QUOTES) ?>">
                <input type="hidden" name="name" value="<?= htmlspecialchars($name, ENT_QUOTES) ?>">
                <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id, ENT_QUOTES) ?>">
                <input type="hidden" name="user_pw" value="<?= htmlspecialchars($user_pw, ENT_QUOTES) ?>">

                <div class="form-actions">
                    <button type="button" class="btn-modern btn-back" onclick="history.back()">修正する</button>
                    <button type="submit" class="btn-modern btn-submit">この内容で登録する</button>
                </div>
            </form>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2026 A高校 Official Store. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>