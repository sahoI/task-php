
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
        echo '<br>';
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
        // $sql = "UPDATE tasks SET [id=$id, title=$title, description=$description] WHERE =$id";
        // $sql = "SELECT * FROM tasks WHERE id=$id";
        // $result = $db->query($sql);
        // foreach ($result as $task) {
        //     $id = $task["id"];
        //     $array[$id]["title"] = $task['title'];
        //     $array[$id]["description"] = $task['description'];
        // }
        // echo json_encode($array, JSON_UNESCAPED_UNICODE);
        echo "updateTask";
        echo '<br>';
    }

    function deleteTask($db)
    {
        if(!empty($_POST)) 
        {
            $id = $_POST['id'];
            echo 'ID :'.$id.'<br>';
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
    }
?>

