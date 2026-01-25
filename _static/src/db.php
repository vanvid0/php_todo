<?php 
$config = require __DIR__ . '/config.php';


$dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";

try {
    $pdo = new PDO(
        $dsn,
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // エラーを例外で出す
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // 配列で取得
            PDO::ATTR_EMULATE_PREPARES => false, // SQLを本物のpreparedで実行
        ]
    );
} catch (PDOException $e) {
    exit('DB接続エラー: ' . $e->getMessage());
}
?>