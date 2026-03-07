<?php
require_once __DIR__ . '/db.php';

// id取得
$id = (int)($_GET['id'] ?? 0);

// idが無ければ戻る
if ($id === 0) {
    header('Location: index.php');
    exit;
}

// DELETE
$sql = 'DELETE FROM todos WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':id' => $id
]);

// 一覧へ戻る
header('Location: index.php');
exit;