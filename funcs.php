<!-- 関数登録ファイル -->

<?php
// XSS対策: エスケープ処理
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// DB接続関数
function db_conn() {
    try {
    $db_name = "";
    $db_id   = "";
    $db_pw   = ""; // XAMPP/Windowsなら空、MAMP/Macなら "root"
    $db_host = "";
    $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
    return $pdo;
} catch (PDOException $e) {
    exit('DB Connection Error: ' . $e->getMessage());
}
}
//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
}

//リダイレクト
function redirect($file_name)
{
    header('Location: ' . $file_name);
    exit();
}

function loginCheck(){
    // 1. セッション変数がない、または現在のIDと一致しない場合
    if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] !== session_id()){
        exit('LOGIN ERROR');
    } else {
        // 2. 一致した場合は、セキュリティのためにIDを新しくして同期し直す
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id();
    }
}
