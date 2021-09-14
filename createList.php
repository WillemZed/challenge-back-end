<?php
    include("dataplayer.php");
    createDatabase();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nameErr = "";
        $name = "";
        if(empty($_POST["listName"])) {
            $nameErr = "Vul alstublieft de naam in.";
        } else {
            $name = $_POST["listName"];

            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "U kunt alleen letters en spaties invullen";
            } 
        }

        if(!empty($name)) {
            addList();
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
    <h1>Create a new list</h1>

    <form action="" method="POST">
        <label for="name">What do you want to call this list?</label>
        <p style="color: red"><? if(isset($nameErr)) echo $nameErr;?></p>
        <input name="listName"type="text">
        <input type="submit" value="Create">
    </form>
</body>
</html>