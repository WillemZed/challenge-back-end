<?
    include("dataplayer.php");
    createDatabase();

    $lists = readLists();
    $sortLists = $_GET["sort"];

    $sortCol = $_GET["sortColumn"];
    $sortOrder = $_GET["sortOrder"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Back end</title>
</head>
<body>
    <a href="createList.php">Create new list</a>

    <br>

    <p>sort</p>
    <form action="index.php?sortCol=<? echo $_GET["time"];?>sortOrder="<? $_GET["order"] ?> method="get">
        <select name="sortColumn" id="">
            <option value="time" <? if(!isset($sortCol)) {echo "selected";};?> >Time</option>
            <option value="status" <? if(!isset($sortCol)) {echo "selected";};?> >Status</option>
        </select>
    
        <select name="sortOrder" id="">
            <option value="ascending" <? if(!isset($sortOrder)) {echo "selected";};?>>Ascending</option>
            <option value="descending" <? if(!isset($sortOrder)) {echo "selected";};?>>Descending</option>
        </select>
        <input type="submit" value="Sort">
    </form>

    <?php
    foreach($lists as $list) {
        include("listList.php");
    }
    ?>


</body>
</html>