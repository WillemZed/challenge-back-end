<?php

function createDatabase(){
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $dbname = "back end";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
}

function readLists(){
    $dbConn = createDatabase();
    $stmt = $dbConn->prepare("SELECT * FROM `Lists`");
    $stmt->execute();
    $result=$stmt->fetchAll();
    $dbConn=null;
    return $result;
}

function addList() {
    $dbConn = createDatabase();
    $stmt = $dbConn->prepare("INSERT INTO Lists (name) VALUES ('$_POST[listName]')");
    $stmt->execute();
    $dbConn=null;
}

function updateList($id) {
    $dbConn = createDatabase();
    $stmt = $dbConn->prepare("UPDATE Lists SET `name`= '$_POST[listName]' WHERE id=$id");
    $stmt->execute();
    $dbConn=null;
}

function readList($id) {
    $dbConn = createDatabase();
	$stmt = $dbConn->prepare("SELECT * FROM Lists WHERE id=$id");
	$stmt->execute();
	$result=$stmt->fetch();
	$dbConn=null;
	return $result;
}

function deleteList($id){
	$dbConn = createDatabase();
	$stmt = $dbConn->prepare("DELETE FROM Lists WHERE id=$id");
	$stmt->execute();
	$dbConn=null;
	return $result;
}


?>