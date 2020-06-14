<?php
$post_title = $_POST["title"];
$post_description = $_POST["description"];

try {
    $db = new PDO('mysql:host=localhost;dbname=sampleDB', 'root', '');

    $sql = "INSERT INTO tasks (title, description) VALUES ('$post_title', '$post_description')";
    $result = $db->query($sql);
    if(!$result) {
        echo '失敗しました。';
    } else {
        echo '成功しました。';
        header('Location: http://localhost:3000/index.php');
    }
    $pdo = null;
    } catch(PDOException $e) {
        echo "データベース接続失敗" . PHP_EOL;
        echo $e->getMessage();
        exit;
    }
?>