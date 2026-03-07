<?php

require 'db.php';

$id = (int)($_GET['id'] ?? 0);

if ($id > 0) {

    $sql = "
        UPDATE todos
        SET is_done = NOT is_done
        WHERE id = :id
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $id
    ]);
}

header('Location: index.php');
exit;