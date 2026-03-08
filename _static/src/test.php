<?php

$dsn = "mysql:host=mysql80.mt15-labo.sakura.ne.jp;dbname=mt15-labo_mt15_test01;charset=utf8mb4";

try {
    $pdo = new PDO(
        $dsn,
        'mt15-labo_mt15_test01',
        'K9vL_Sapy'
    );

    echo "DB接続成功";
} catch (PDOException $e) {
    echo $e->getMessage();
}