<?php
session_start();
require_once('funcs.php');

// ログインチェック
loginCheck();

// 1. GETデータ取得
$id = $_GET['id'];

// 2. DB接続
$pdo = db_conn();

// 3. データ登録SQL作成（指定したIDのレコードを消去）
$stmt = $pdo->prepare("DELETE FROM gs_userinfo_table WHERE id = :id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// 4. データ削除処理後
if ($status === false) {
    sql_error($stmt);
} else {
    // 削除が成功したら一覧画面に戻る
    redirect('select.php');
}