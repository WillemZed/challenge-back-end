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
    <?php
        echo $list['name'];
    ?>
    <a href="editList.php?id=<?echo $id?>">edit name</a>
    <a href="deleteList.php?delete=<? echo$list["id"] ?>">delete list</a>
</body>
</html>