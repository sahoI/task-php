<?php
// header("Content-Type: application/json; charset=UTF-8");
// echo $_SERVER["REQUEST_METHOD"];
// $url = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
// echo $url.'<br>';
require_once "tasks.php";
$db = new PDO('mysql:host=localhost;dbname=sampleDB', 'root', '');
switch ($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        if($_SERVER["REQUEST_URI"] = '/tasks') {
            getTasks($db);
        } elseif($_SERVER["REQUEST_URI"] = '/tasks/:id') {
            // $get_id = $_GET["id"];
            // echo $get_id;
            getTask($db,$id);
        } 
        break;
    case 'POST':
        if($_SERVER["REQUEST_URI"] = '/tasks') {
            createTask($db);
        }
        break;
    case 'PUT':
        if($_SERVER["REQUEST_URI"] = '/tasks/:id') {
            updateTask($db,$id);
        }
        break;
    case 'DELETE':
        if($_SERVER["REQUEST_URI"] = '/tasks/:id') {
            deleteTask($db,$id);
        }
        break;
}

?>
<html>
    <body>
        <p>Create Task</p>
        <form action="create.php" method="post">
            Task：<input class="title" type="text" name="title"><br><br>
            Description：<textarea class="description" name="description" rows="2" cols="40"></textarea><br>
            <input type="submit" value="送信">
        </form> 
    </body>
</html>

