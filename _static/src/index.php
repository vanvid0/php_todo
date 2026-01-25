<?php 
require_once __DIR__ . '/db.php';


$sql = 'SELECT * FROM todos ORDER BY created_at DESC';
$stmt = $pdo->query($sql);
$todos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo アプリ</title>
</head>
<body>
  <h1>Todo アプリ</h1>
  <ul class="p_home__list">
    <?php if (empty($todos)): ?>
      <li>まだTodoがありません</li>
    <?php else: ?>
      <?php foreach ($todos as $todo): ?>
        <li class="<?= $todo['is_done'] ? 'done' : '' ?>"><?= htmlspecialchars($todo['title'], ENT_QUOTES, 'UTF-8');?></li>
      <?php endforeach; ?>
    <?php endif; ?>
  </ul>
</body>
</html>