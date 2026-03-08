<?php 

require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
  header('Location: index.php');
  exit;
}

$title = trim($_POST['title'] ?? '');

if ($title === ''){
  header('Location: index.php');
  exit;
}

$sql = 'INSERT INTO todos (title) VALUES (:title)';
$stmt = $pdo->prepare($sql);
$stmt->execute([
  ':title' => $title,
]);

header('Location: index.php');
exit;
?>