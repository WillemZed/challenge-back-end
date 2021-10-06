<?
    include("dataplayer.php");
    createDatabase();

    $lists = readLists();//gets everything from table 'lists' and puts it in the variable


    //takes values in the url and puts them in a variable which makes sure the browser knows which option is selected
    $sortCol = $_GET["sortColumn"];
    $sortOrder = $_GET["sortOrder"];
    $status = $_GET["status"];
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

    <form action="index.php?sortCol=<? echo $_GET["time"];?>sortOrder="<? $_GET["order"] ?> method="get">

        <select name="sortColumn" id="">
            <option value="time" <? if(isset($sortCol) && $sortColumn == "time") {echo "selected";};?> >Time</option>
        </select>
    
        <select name="sortOrder" id="">
            <option value="ascending" <? if(isset($sortOrder) && $sortOrder == "ascending") {echo "selected";};?>>Ascending</option>
            <option value="descending" <? if(isset($sortOrder) && $sortOrder == "descending") {echo "selected";};?>>Descending</option>
        </select>

        <input type="submit" value="Sort">
    </form>

    <form action="" method="get">
        <select name="status" id="">
            <option value="Inactive" <? if(isset($status) && $status == "Inactive") {echo "selected";};?>>Inactive</option>
            <option value="Ongoing" <? if(isset($status) && $status == "Ongoing") {echo "selected";};?>>Ongoing</option>
            <option value="Completed" <? if(isset($status) && $status == "Completed") {echo "selected";};?>>Completed</option>
        </select>
        <input type="submit" value="filter">
    </form>
    <a href="index.php">Reset</a>

    <?php
    //loops an include function with all the data that $lists has
    foreach($lists as $list) {
        include("listList.php");
    }
    ?>


</body>
</html>