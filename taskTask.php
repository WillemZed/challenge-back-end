<div class="container p-3 my-3 bg-dark border border-dark" class="listContainer" >
    <p class="text-white" href="task.php?id=<? echo $tasks["id"]; ?>"><? echo $tasks["name"] ?></p>
    <p class="text-white"><? echo $tasks["time"] ?></p>
    <p class="text-white"><? echo $tasks["status"] ?></p>
    <a class="text-primary" href="task.php?id=<? echo $tasks["id"]; ?>">view task</a>
</div>