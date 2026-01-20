<?php
session_start();
require_once('funcs.php');
loginCheck();

// 1. GETでIDを取得
$id = $_GET['id'];

// 2. DB接続
$pdo = db_conn();

// 3. データ登録SQL作成（1件だけ取得）
$stmt = $pdo->prepare("SELECT * FROM gs_userinfo_table WHERE id = :id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// 4. データ表示
if ($status == false) {
    sql_error($stmt);
} else {
    $row = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員情報更新 - いってら〜A高校〜</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="header">
        <div class="container header-flex">
            <h1 class="logo">いってら〜A高校〜</h1>
            <div class="user-info">
                <span>編集モード: <?= h($row['name']) ?> さん</span>
            </div>
        </div>
    </header>

    <main class="main-content">
        <div class="form-container">
            <h3>会員情報の編集</h3>
        
            <form action="update.php" method="post">
                <div class="form-group">
                    <label>所属</label>
                    <select name="user_type" required>
                        <?php
                        $types = ["教員", "生徒（1年生）", "生徒（2年生）", "生徒（3年生）", "卒業生", "保護者"];
                        foreach($types as $type){
                            // 現在の登録内容と一致していたら selected を付ける
                            $selected = ($row['user_type'] === $type) ? "selected" : "";
                            echo "<option value='{$type}' {$selected}>{$type}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>お名前</label>
                    <input type="text" name="name" value="<?= h($row['name']) ?>" required>
                </div>

                <div class="form-group">
                    <label>ユーザーID</label>
                    <input type="text" name="user_id" value="<?= h($row['user_id']) ?>" required>
                </div>

                <div class="form-group">
                    <label>パスワード (変更する場合のみ入力)</label>
                    <input type="password" name="user_pw" placeholder="空欄のままなら変更されません">
                </div>

                <input type="hidden" name="id" value="<?= h($row['id']) ?>">

                <div class="form-actions">
                    <button type="button" class="btn-modern btn-back" onclick="history.back()">戻る</button>
                    <button type="submit" class="btn-modern btn-submit">内容を更新する</button>
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