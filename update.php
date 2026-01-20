<?php
session_start();
require_once('funcs.php');
loginCheck();

// 1. POSTデータ取得
$user_type = $_POST["user_type"];
$name      = $_POST["name"];
$user_id   = $_POST["user_id"];
$user_pw_new = $_POST["user_pw"]; // 変更用のPW
$id        = $_POST["id"];        // 隠しフィールドのID

// 2. DB接続
$pdo = db_conn();

// 3. パスワードの更新があるかどうかでSQLを分ける
if (!empty($user_pw_new)) {
    // パスワード入力がある場合：ハッシュ化して更新
    $pw_hash = password_hash($user_pw_new, PASSWORD_DEFAULT);
    $sql = "UPDATE gs_userinfo_table SET user_type=:user_type, name=:name, user_id=:user_id, user_pw=:user_pw, teacher_flg=:teacher_flg WHERE id=:id";
} else {
    // パスワード入力がない場合：PW以外を更新
    $sql = "UPDATE gs_userinfo_table SET user_type=:user_type, name=:name, user_id=:user_id, teacher_flg=:teacher_flg WHERE id=:id";
}

$stmt = $pdo->prepare($sql);

// 教員フラグの再判定
$teacher_flg = ($user_type === "教員") ? 1 : 0;

$stmt->bindValue(':user_type',   $user_type,   PDO::PARAM_STR);
$stmt->bindValue(':name',        $name,        PDO::PARAM_STR);
$stmt->bindValue(':user_id',     $user_id,     PDO::PARAM_STR);
$stmt->bindValue(':teacher_flg', $teacher_flg, PDO::PARAM_INT);
$stmt->bindValue(':id',          $id,          PDO::PARAM_INT);

if (!empty($user_pw_new)) {
    $stmt->bindValue(':user_pw', $pw_hash, PDO::PARAM_STR);
}

// 4. 実行
$status = $stmt->execute();

if ($status === false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}