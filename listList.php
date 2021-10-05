<?php
    $id = $list["id"];
    $sortCol = $_GET['sortColumn']; //?: 'time';
    $sortOrder = $_GET['sortOrder']; //?: 'asc';
    $tasksLists = taskFromIdList($id);
    if(isset($sortCol) && isset($sortOrder)) {
        $tasksLists = sortedTask($id, $sortCol, $sortOrder);

    } 
?>



<div class="container p-3 my-3 bg-primary" class="listContainer" >
    <p> <? echo $list["name"]; ?> </p>
    <div>
        <? if (isset($tasksLists)) {
            foreach ($tasksLists as $task) {
                include "taskTask.php";
            }
        }
        ?>
    </div>
    <a class="linkColor" href="list.php?id=<?echo $list['id']?>">view list</a>
</div>