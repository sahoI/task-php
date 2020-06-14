<html>
    <header>
        <title>getTasks</title>
    </header>

    <body>        
        <p>Create Task</p>
        <form action="create.php" method="post">
            Task：<input type="text" name="title"><br><br>
            Description：<textarea name="description" rows="2" cols="40"></textarea><br>
            <input type="submit" value="送信">
        </form> 

        <p>Search Task</p>
        <form action="getTask.php" method="get">
            id:<input type="text" name="id"><br><br>
            <input type="submit" value="送信">
        </form> 

        <?php
            try {
                $db = new PDO('mysql:host=localhost;dbname=sampleDB', 'root', '');
                $sql = "SELECT * FROM tasks";
                $result = $db->query($sql);
                foreach ($result as $task) {
                    echo $task['id'].' : '.$task['title'].' / '.$task['description'];
                    echo '<br>';
                }
                $pdo = null;
            } catch(PDOException $e) {
                echo "データベース接続失敗" . PHP_EOL;
                echo $e->getMessage();
                exit;
            }
        ?>
    </body>
</html>

 

