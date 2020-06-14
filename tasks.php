
<?php

// class Tasks
// {
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
        echo "createTask";
        echo '<br>';
    }

    function getTask($db,$id)
    {
        // $get_id = $_GET["id"];
        
        echo "getTask";
        echo '<br>';
    }

    function updateTask($db,$id)
    {
        // $sql = "UPDATE tasks SET [id=$id, title=$title, description=$description] WHERE =$id";
        echo "updateTask";
        echo '<br>';
    }

    function deleteTask($db,$id)
    {
        $sql = "DELETE FROM tasks WHERE id=$id";
        echo "deleteTask";
        echo '<br>';
    }
// }
?>

