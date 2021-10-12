<?php

    include("dataplayer.php");
    if(isset($_GET["delete"])); {
        $id = $_GET["delete"];
        echo $id;
        deleteTask($id);
        header("Location: index.php");
    }
    
?>