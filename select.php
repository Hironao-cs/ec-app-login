<!-- 登録内容一覧画面 -->
<?php
session_start();
require_once('funcs.php');

// 1. ログインチェック（funcs.phpに定義した関数を呼び出す）
loginCheck();

// 2. DB接続
$pdo = db_conn();

// 3. データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_userinfo_table");
$status = $stmt->execute();

// 4. データ表示
$view = "";
if ($status == false) {
    sql_error($stmt);
} else {
    while ($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<tr>';
        $view .= '<td>' . h($res["user_type"]) . '</td>';
        $view .= '<td>' . h($res["name"]) . '</td>';
        $view .= '<td>' . h($res["user_id"]) . '</td>';
        
        // --- 権限判定：teacher_flg が 1 の時だけボタンを表示 ---
        if ($_SESSION['kanri_flg'] == 1 || $_SESSION['teacher_flg'] == 1) {
            $view .= '<td>';
            $view .= '<a class="btn-edit" href="detail.php?id=' . h($res["id"]) . '">更新</a> ';
            $view .= '<a class="btn-delete" href="delete.php?id=' . h($res["id"]) . '" onclick="return confirm(\'本当に削除しますか？\')">削除</a>';
            $view .= '</td>';
        } else {
            $view .= '<td><span class="lock-icon">閲覧のみ</span></td>';
        }
        
        $view .= '</tr>';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>会員一覧 - いってら〜A高校〜</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="header">
        <div class="container header-flex">
            <h1 class="logo">いってら〜A高校〜</h1>
            <div class="user-info">
                <span>ようこそ、<?= h($_SESSION['name']) ?> さん</span>
                <a href="logout.php" class="logout-link">ログアウト</a>
            </div>
        </div>
    </header>

    <main class="main-content main-full"> 
        <div class="container">
            <h2 class="confirm-title">会員一覧</h2>
            
            <table class="confirm-table">
                <thead>
                    <tr>
                        <th>所属</th>
                        <th>お名前</th>
                        <th>ユーザーID</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $view ?>
                </tbody>
            </table>
            
            <div class="center-link">
                <a href="index.php">新規登録画面へ戻る</a>
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