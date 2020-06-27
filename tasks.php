
<?php
    function getTasks($db) 
    {
        $sql = "SELECT * FROM tasks";
        $result = $db->query($sql);
        foreach ($result as $task) {
            $id = $task["id"];
            $array[$id]["title"] = $task['title'];
            $array[$id]["description"] = $task['description'];
        }
        echo json_encode($array, JSON_UNESCAPED_UNICODE);
    }

    function createTask($db)
    {
        if(!empty($_POST)) {
            $title = $_POST['title'];
            $description = $_POST['description'];
        
            $msg = array();
        
            if(empty($err_msg)) {
                mb_language('japanese');
                mb_internal_encoding('UTF-8');
        
                $sql = "INSERT INTO tasks (title, description) VALUES ('$title', '$description')";
                $result = $db->query($sql);
                if($result) {
                    unset($_POST);
                    $msg["text"] = "Create new task.";
                    header('Location: http://localhost:3000/tasks');
                } else {
                    $msg = "失敗しました。";
                }
            }
        }
    }

    function getTask($db,$id)
    {
        $sql = "SELECT * FROM tasks WHERE id=$id";
        $result = $db->query($sql);
        foreach ($result as $task) {
            $id = $task["id"];
            $array[$id]["title"] = $task['title'];
            $array[$id]["description"] = $task['description'];
            echo json_encode($array, JSON_UNESCAPED_UNICODE);
        }
        
        //$arrayが空の時の処理必要

    }

    function updateTask($db,$id)
    {
        if(!empty($_POST))
        {
            $title = $_POST['title'];
            $description = $_POST['description'];
            try {
                $sql = "UPDATE tasks SET title='$title', description='$description' WHERE id=$id";
                $result = $db->query($sql);
                echo '変更しました' . PHP_EOL;
            } catch (PDOException $e) {
                echo "変更できませんでした" . PHP_EOL;
                echo $e->getMessage();
                exit;
            }
        }
    }

    function deleteTask($db,$id)
    {
        try {
            $sql = "DELETE FROM tasks WHERE id=$id";
            $result = $db->query($sql);
            echo '消去できました。' . PHP_EOL;
        } catch (PDOException $e) {
            echo "消去できませんでした。" . PHP_EOL;
            echo $e->getMessage();
            exit;
        }
    }
?>

