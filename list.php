<?php

    include("dataplayer.php");
    createDatabase();
    $id = $_GET["id"];
    $list = readList($id);
    $tasks = taskFromIdList($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="text-center">

    <h1><? echo $list["name"]; ?></h1>
    <a class="btn btn-dark border" href="index.php">Home</a>
    <br>
    <a class="btn btn-dark border" href="createTask.php?id=<? echo $id ?>">Add a task</a>
    <br>
    <a class="btn btn-dark border" href="editList.php?id=<?echo $id?>">edit name</a>
    <br>
    <a class="btn btn-dark border" href="deleteList.php?delete=<? echo$list["id"] ?>" onclick="return confirm('Weet je zeker dat je het wilt verwijderen?')">delete list</a>

    <?
    foreach($tasks as $tasks){
        include("taskTask.php");
    }
    ?>
</div>
</body>
</html>