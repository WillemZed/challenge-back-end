<?php

    include("dataplayer.php");
    createDatabase();
    $id = $_GET["id"];
    $task = readTask($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Home</a>
    <?php
        echo $task['name'];
    ?>
    <a href="editTask.php?id=<?echo $id?>">edit name</a>
    <a href="deleteTask.php?delete=<? echo$task["id"] ?>" onclick="return confirm('Weet je zeker dat je het wilt verwijderen?')">delete task</a>
</body>
</html>