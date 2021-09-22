<?php

    include("dataplayer.php");
    createDatabase();
    $id = $_GET["id"];
    $list = readList($id);

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
        echo $list['name'];
    ?>
    <a href="createTask.php?id=<? echo $id ?>">Add a task</a>
    <a href="editList.php?id=<?echo $id?>">edit name</a>
    <a href="deleteList.php?delete=<? echo$list["id"] ?>" onclick="return confirm('Weet je zeker dat je het wilt verwijderen?')">delete list</a>
</body>
</html>