<?php

session_start(); // ← sessionを利用するので忘れない！

//POST値
$user_id   = $_POST["user_id"] ?? "";
$user_pw   = $_POST["user_pw"] ?? "";

//1.  DB接続します
require_once('funcs.php');
$pdo = db_conn();

// 2. データ登録SQL作成
$sql = "SELECT * FROM gs_userinfo_table WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$status = $stmt->execute();
//3. SQL実行時にエラーがある場合STOP
if($status === false){
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();

//5. 判定 (ハッシュ化パスワードの検証)
if($val && password_verify($user_pw, $val['user_pw'])){
    // Login成功時
    session_regenerate_id(true);
    $_SESSION['chk_ssid']   = session_id(); 
    $_SESSION['kanri_flg']  = $val['kanri_flg'];
    $_SESSION['teacher_flg'] = $val['teacher_flg'];
    $_SESSION['name']       = $val['name'];
    
    if ($_SESSION['teacher_flg'] == 1) {
    redirect('select.php');
    } else {
       redirect('shop.php');
    }
} else {
    // Login失敗時
    redirect('login.php');
}


?>



