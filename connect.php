<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=sampleDB', 'root', '');
    echo 'データベース接続成功';
    $pdo = null;
} catch(PDOException $e) {
    echo "データベース接続失敗" . PHP_EOL;
    echo $e->getMessage();
    exit;
}
