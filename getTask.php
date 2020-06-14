<?php
$get_id = $_GET["id"];
if(isset($get_id) && !preg_match('/[0~9]/', $get_id)) {
    $param = htmlspecialchars($get_id);
    try {
        $db = new PDO('mysql:host=localhost;dbname=sampleDB', 'root', '');
        $sql = "SELECT title, description FROM tasks WHERE id='$get_id';";
        $result = $db->query($sql);
        
        if(!$result) {
            echo '失敗しました。';
            $array["status"] = "no";
        } else {
            echo '成功しました。';
            foreach ($result as $task) {
                $array["status"] = "yes";
                $array["id"] = $get_id;
                $array["title"] = $task["title"];
                $array["description"] = $task["description"];
            }
        }
        $pdo = null;
    } catch(PDOException $e) {
        echo "データベース接続失敗" . PHP_EOL;
        echo $e->getMessage();
        exit;
    }
    
} else {
    $array["status"] = "no";
}

echo json_encode($array, JSON_PRETTY_PRINT);