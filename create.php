<?php
if(!empty($_POST)) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $msg = array();

    if(empty($err_msg)) {
        mb_language('japanese');
        mb_internal_encoding('UTF-8');

        $db = new PDO('mysql:host=localhost;dbname=sampleDB', 'root', '');
        $sql = "INSERT INTO tasks (title, description) VALUES ('$title', '$description')";
        $result = $db->query($sql);
        if($result) {
            unset($_POST);
            $msg["text"] = "Create new task.";
            header('Location: http://localhost:3000/index.php');
        } else {
            $msg = "失敗しました。";
        }
    }
}
