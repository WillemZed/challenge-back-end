<?php

    include("dataplayer.php");
    if(isset($_GET["delete"])); {
        $id = $_GET["delete"];
        deleteList($id);
        header("Location: index.php");
    }
    
?>