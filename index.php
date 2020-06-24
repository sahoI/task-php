<?php
// header("Content-Type: application/json; charset=UTF-8");
// echo $_SERVER["REQUEST_METHOD"];
// $url = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
require_once "tasks.php";
$db = new PDO('mysql:host=localhost;dbname=sampleDB;charset=utf8mb4', 'root', '');
echo $_SERVER["REQUEST_URI"].PHP_EOL;

$httpdmethod = $_SERVER['REQUEST_METHOD'];
if($httpdmethod === 'POST' && isset($_REQUEST['REQUEST_METHOD'])) 
{
    $request = $_REQUEST['REQUEST_METHOD'];
    if( in_array( $request, array('PUT', 'DELETE'))) {
        $httpdmethod = $request;
    }
    unset($request);
}

switch ($httpdmethod) {
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
            '<script src="update.js"></script>';
            updateTask($db);
        }
        break;
    case 'DELETE':
            '<script src="delete.js"></script>';
            deleteTask($db);
        break;
}

?>
<html>
    <body>
        <hr>
        <a href="http://localhost:3000/tasks">TOP</a>
        <p>Create Task</p>
        <form action="../tasks" method="post">
            Task：<input class="title" type="text" name="title"><br><br>
            Description：<textarea class="description" name="description" rows="2" cols="40"></textarea><br>
            <input type="submit" value="送信">
        </form> 
        <p>Update Task</p>
        <form action="../tasks" method="post">
            Task：<input class="title" type="text" name="title"><br><br>
            Description：<textarea class="description" name="description" rows="2" cols="40"></textarea><br>
            <input type="submit" value="送信">
            <input type="hidden" name="REQUEST_METHOD" value="PUT" />
        </form> 
        <p>Delete Task</p>
        <form action="/tasks" method="post">
            ID：<input class="id" type="text" name="id"><br><br>
            <input type="submit" value="送信">
            <input type="hidden" name="REQUEST_METHOD" value="DELETE" />

        </form> 
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <!-- <script src="main.js"></script> -->
    </body>
</html>

