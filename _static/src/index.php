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
        <li class="<?= $todo['is_done'] ? 'done' : '' ?>">

          <form action="toggle.php" method="get" style="display:inline;">
            <input
              type="checkbox"
              name="id"
              value="<?= $todo['id'] ?>"
              onchange="this.form.submit()"
              <?= $todo['is_done'] ? 'checked' : '' ?>>
          </form>

          <?= htmlspecialchars($todo['title'], ENT_QUOTES, 'UTF-8'); ?>

          <a href="delete.php?id=<?= $todo['id'] ?>">削除</a>

        </li>
      <?php endforeach; ?>
    <?php endif; ?>
  </ul>

  <form action="create.php" method="post">
    <input type="text" name="title" placeholder="やることを入力" required>
    <button type="submit">追加</button>
  </form>
</body>

</html>