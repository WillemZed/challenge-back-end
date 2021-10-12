<?php
    include("dataplayer.php");
    createDatabase();
    $id = $_GET["id"];
    $list = readList($id);
    $listName = $list["name"];

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
            updateList($id);
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
    <h1>Edit list name</h1>

    <form action="" method="POST">
        <label for="name">What do you want to call this list?</label>
        <p style="color: red"><? if(isset($nameErr)) echo $nameErr;?></p>
        <input name="listName" type="text" value="<? if(isset($listName)) echo $listName; ?>">
        <input type="submit" value="update">
    </form>
</body>
</html>