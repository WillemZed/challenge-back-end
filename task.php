<?php

    include("dataplayer.php");
    createDatabase();
    
    //takes the id from the url and puts it in the variable
    $id = $_GET["id"];
    //gets the task from the database with the same id as the one in $id and puts it in a variable
    $task = readTask($id);

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
    <h1><? echo $task["name"]; ?></h1>
    <a class="btn btn-dark border" href="index.php">Home</a>
    <br>
    <a class="btn btn-dark border" href="editTask.php?id=<?echo $id?>">edit name</a>
    <br>
    <a class="btn btn-dark border" href="deleteTask.php?delete=<? echo$task["id"] ?>" onclick="return confirm('Weet je zeker dat je het wilt verwijderen?')">delete task</a>
    <br>
    <a class="btn btn-dark border" href="editStatus.php?id=<? echo $id ?>">edit status</a>
</body>
</html>