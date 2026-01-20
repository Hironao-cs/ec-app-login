<?php
$db_host = "mysql80.whitemarmot50.sakura.ne.jp";
$db_name = "whitemarmot50_php02";
$db_id   = "whitemarmot50_php02";
$db_pw   = "Green_1670"; // XAMPP/Windowsなら空、MAMP/Macなら "root"


header('Content-Type: application/json; charset=utf-8');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Invalid Request');
    }

    $name    = $_POST['name'] ?? '';
    $product = $_POST['product'] ?? '';
    $email   = $_POST['email'] ?? null;
    $grade   = $_POST['grade'] ?? null;

    if (empty($name) || empty($product)) {
        throw new Exception('必須項目が未入力です');
    }

    $sql = "INSERT INTO gs_bm_table (name, email, grade, product, datetime) 
            VALUES (:name, :email, :grade, :product, sysdate())";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name'    => $name,
        ':email'   => $email,
        ':grade'   => $grade,
        ':product' => $product
    ]);

    echo json_encode(['success' => true]);

} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>