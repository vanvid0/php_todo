<?php

require 'db.php';

$id = (int)($_POST['id'] ?? 0);

if ($id > 0) {

    $sql = "UPDATE todos SET is_done = IF(is_done = 1, 0, 1) WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
}

header('Location: index.php');
exit;