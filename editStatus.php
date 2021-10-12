<?php
    include("dataplayer.php");
    createDatabase();
    $id = $_GET["id"];
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $status = $_POST["status"];
        updateStatus($id, $status);
        header("Location: index.php");
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
    <form action="" method="POST">
        <label for="name">What's the status of this task?</label>
            <select name="status" id="">
                <option value="Inactive">Inactive</option>
                <option value="Ongoing">Ongoing</option>
                <option value="Completed">Completed</option>
            </select>
        <input type="submit" value="update">
    </form>
</body>
</html>