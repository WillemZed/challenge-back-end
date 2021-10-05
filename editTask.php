<?php
    include("dataplayer.php");
    createDatabase();
    $id = $_GET["id"];
    $task = readTask($id);
    $taskName = $task["name"];

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nameErr = "";
        $name = "";
        if(empty($_POST["taskName"])) {
            $nameErr = "Vul alstublieft de naam in.";
        } else {
            $name = $_POST["taskName"];

            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "U kunt alleen letters en spaties invullen";
            } 
        }

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