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
  <link rel="stylesheet" href="/css/style.css">
  <title>やることリストver1.0.0</title>
</head>

<body>
  <main class="p_home">
    <section class="p_home-sec01">
      <div class="inner-block">
        <div class="p_home__ttlWrap">
          <h1 class="p_home__ttl">やることリスト<br class="sp">ver1.0.0</h1>
        </div>

        <div class="p_home__formWrap">
          <form action="create.php" method="post">
            <div class="p_home_flex-box">
              <input class="p_home__add" type="text" name="title" placeholder="やることを入力" required>
              <button class="p_home__btn" type="submit">追加</button>
            </div>
          </form>
        </div>

        <ul class="p_home__list">
          <?php if (empty($todos)): ?>
            <li>
              <p class="p_home__list-txt">やることないです。</p>
            </li>
          <?php else: ?>
            <?php foreach ($todos as $todo): ?>
              <li class="p_home__item <?= $todo['is_done'] ? 'done' : '' ?>">

                <form action="toggle.php" method="post" style="display:inline;">
                  <input type="hidden" name="id" value="<?= $todo['id'] ?>">

                  <label class="p_home__checkbox-label">
                    <input
                      class="p_home__checkbox"
                      type="checkbox"
                      onchange="this.form.submit()"
                      <?= $todo['is_done'] ? 'checked' : '' ?>>
                    <span class="p_home__checkbox-ui"></span>
                  </label>
                </form>

                <p class="p_home__txt"><?= htmlspecialchars($todo['title'], ENT_QUOTES, 'UTF-8'); ?></p>

                <a class="p_home__delete-btn" href="delete.php?id=<?= $todo['id'] ?>">削除</a>

              </li>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>


      </div>
    </section>

  </main>

</body>
<script src="/js/lib/jquery-3.7.1.min.js"></script>
<script src="/js/lib/ztext.min.js"></script>
<script src="/js/common.js"></script>

</html>