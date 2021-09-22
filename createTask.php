<?php
    include("dataplayer.php");
    createDatabase();
    $id = $_GET["id"];
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nameErr = "";
        $name = "";

        $timeErr = "";
        $time = "";

        if(empty($_POST["taskName"])) {
            $nameErr = "Vul alstublieft de naam in.";
        } else {
            $name = $_POST["taskName"];

            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "U kunt alleen letters en spaties invullen";
            } 
        }

        if(empty($_POST["taskTime"])) {
            $timeErr = "Vul alstublieft de tijd in.";
        } else {
            $time = $_POST["taskTime"];
        }
        

        if(!empty($name) && !empty($time)) {
            addTask($id);
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
</head>
<body>
    <h1>Create a new task</h1>

    <a href="list.php?id=<? echo $id?>">Back</a>
    <form action="" method="POST">
        <label for="name">What do you want to call this task?</label>
        <p style="color: red"><? if(isset($nameErr)) echo $nameErr;?></p>
        <input name="taskName"type="text" value="<? echo $name?> ">

        <br>
        <br>


        <label for="name">When will you have finished this task?</label>
        <p style="color: red"><? if(isset($timeErr)) echo $timeErr;?></p>
        <input name="taskTime"type="time">

        <br>

        <br>

        <input type="submit" value="Create">


    </form>
</body>
</html>