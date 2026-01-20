<!-- ログアウトフォーム -->
 <?php
session_start();

// 1. セッション変数を空にする
$_SESSION = array();

// 2. クッキーに保存してあるSessionIDを破棄（ブラウザ側の鍵を捨てる）
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}

// 3. サーバー側のセッションを完全に破壊
session_destroy();

// 4. ログイン画面へリダイレクト
header("Location: login.php");
exit();