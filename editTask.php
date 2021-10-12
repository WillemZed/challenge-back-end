<?php
    include("dataplayer.php");
    createDatabase();
    //gets id from the url and puts it in a variable
    $id = $_GET["id"];
    //gets the task from the database with the same id as the one in $id and puts it in a variable
    $task = readTask($id);
    //gets the name from $tasks and puts it in a variable
    $taskName = $task["name"];

    //checks if there has been a POST request
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nameErr = "";
        $name = "";

        /*checks if $_POST["taskName] is empty(no value) and inserts an error message in $nameErr if it is
        otherwise inserts that value $name and does a validation check */
        if(empty($_POST["taskName"])) {
            $nameErr = "Vul alstublieft de naam in.";
        } else {
            $name = $_POST["taskName"];
        }

        //checks if $name is not empty and updates the name of the task and redirects the user back to the index
        if(!empty($name)) {
            updateTask($id);
            header("Location: index.php");
        }
    }
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
<body>
    <h1>Edit task name</h1>

    <form action="" method="POST">
        <label for="name">What do you want to call this task?</label>
        <p style="color: red"><? if(isset($nameErr)) echo $nameErr;?></p>
        <input name="taskName" type="text" value="<? if(isset($taskName)) echo $taskName; ?>">
        <input type="submit" value="update">
    </form>
</body>
</html>