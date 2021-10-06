<?php
    //takes the id of a row in table "lists" and puts it in a variable
    $id = $list["id"];

    //takes the value of the url and puts them in  a variable
    $sortCol = $_GET['sortColumn']; 
    $sortOrder = $_GET['sortOrder'];
    $status = $_GET["status"];

    //takes all the data from table "tasks" that has the same id as the id from the table "lists" 
    //and puts them in a variable
    $tasksLists = taskFromIdList($id);

    /*checks if $sortCol and $sortOrder have a value, and overwrites the data taken from the previous function
    
    to display the same data, but with a certain order, or to display the same data, with a filtered option

    */
    if(isset($sortCol) && isset($sortOrder)) {
        $tasksLists = sortedTask($id, $sortCol, $sortOrder);

    } 
    
    if(isset($status)) {
        $tasksLists = filterStatus($id, $status);
    }
?>



<div class="border" class="container p-3 my-3 bg-primary" class="listContainer" >
    <p> <? echo $list["name"]; ?> </p>
    <div>
        <? 
        //checks if $tasksLists has values and creates a loop if there is a value
        if (isset($tasksLists)) {
            foreach ($tasksLists as $task) {
                include "taskTask.php";
            }
        }
        ?>
    </div>
    <a class="linkColor" href="list.php?id=<?echo $list['id']?>">view list</a>
</div>