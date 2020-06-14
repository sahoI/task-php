<?php
// header("Content-Type: application/json; charset=UTF-8");
// echo $_SERVER["REQUEST_METHOD"];
// $url = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
// echo $url.'<br>';
require_once "tasks.php";
$db = new PDO('mysql:host=localhost;dbname=sampleDB', 'root', '');
echo $_SERVER["REQUEST_URI"];

switch ($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        if(preg_match('/[t][a][s][k][s]\/[0-9]/', $_SERVER["REQUEST_URI"])) { ///「/tasks/'数'」正規表現
            $id = preg_replace('/[^0-9]/', '', $_SERVER["REQUEST_URI"]);
            getTask($db,$id);
        } elseif($_SERVER["REQUEST_URI"] == '/tasks') {
            getTasks($db);
        } 
        break;
    case 'POST':
        if($_SERVER["REQUEST_URI"] == '/tasks') {
            '<script src="post.js"></script>';
            createTask($db);
        }
        break;
    case 'PUT':
        if(preg_match('/[t][a][s][k][s]\/[0-9]/', $_SERVER["REQUEST_URI"])) {
            $id = preg_replace('/[^0-9]/', '', $_SERVER["REQUEST_URI"]);
            echo 'putTask';
            '<script src="update.js"></script>';
            updateTask($db,$id);
        }
        break;
    case 'DELETE':
        if(preg_match('/[t][a][s][k][s]\/[0-9]/', $_SERVER["REQUEST_URI"])) {
            $id = preg_replace('/[^0-9]/', '', $_SERVER["REQUEST_URI"]);
            '<script src="delete.js"></script>';
            deleteTask($db,$id);
        }
        break;
}

?>
<html>
    <body>
        <p>Create Task</p>
        <form action="../tasks" method="put">
            Task：<input class="title" type="text" name="title"><br><br>
            Description：<textarea class="description" name="description" rows="2" cols="40"></textarea><br>
            <input type="submit" value="送信">
        </form> 
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <!-- <script src="main.js"></script> -->
    </body>
</html>

