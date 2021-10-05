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

function taskFromIdList($id) {
    $dbConn = createDatabase();
    $stmt = $dbConn->prepare("SELECT * FROM `tasks` WHERE Tasks.list_id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result=$stmt->fetchAll();
    $dbConn=null;
    return $result;
} 
function sortedTask($id, $sortCol, $sortOrder) {
    $dbConn = createDatabase();

    if($sortOrder == 'descending') {
        $sortOrder = 'desc';
    } else {
        $sortOrder = 'asc';
    }

    if($sortCol == 'status') {
        $sortCol = 'status';
    } else {
        $sortCol = 'time';
    }

    $dbConn = createDatabase();
    $stmt = $dbConn->prepare("SELECT * FROM `tasks` WHERE Tasks.list_id = $id ORDER BY $sortCol $sortOrder");
    $stmt->execute();
    $result=$stmt->fetchAll();
    $dbConn=null;
    return $result;
}

function innerJoinTables() {
    $dbConn = createDatabase();
    $stmt = $dbConn->prepare("SELECT Tasks.* , Lists.name AS listName, Lists.id AS listId FROM Tasks INNER JOIN Lists ON Tasks.list_id = lists.id");
    $stmt->execute();
    $result=$stmt->fetchAll();
    $dbConn=null;
    return $result;
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
    $stmt = $dbConn->prepare("UPDATE Lists SET `name`= '$_POST[listName]' WHERE id=:id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $dbConn=null;
}

function readList($id) {
    $dbConn = createDatabase();
	$stmt = $dbConn->prepare("SELECT * FROM Lists WHERE id=:id");
    $stmt->bindParam(":id", $id);
	$stmt->execute();
	$result=$stmt->fetch();
	$dbConn=null;
	return $result;
}

function deleteList($id){
	$dbConn = createDatabase();
	$stmt = $dbConn->prepare("DELETE FROM Lists WHERE id=:id");
    $stmt->bindParam(":id", $id);
	$stmt->execute();
	$dbConn=null;
	return $result;
}

function addTask($id) {
    $dbConn = createDatabase();
    $stmt = $dbConn->prepare("INSERT INTO Tasks (name, list_id, time, status) VALUES ('$_POST[taskName]', :id, '$_POST[taskTime]', 'Ongoing')");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $dbConn=null;
}

function readTasks() {
    $dbConn = createDatabase();
    $stmt = $dbConn->prepare("SELECT name FROM `Tasks`");
    $stmt->execute();
    $result=$stmt->fetchAll();
    $dbConn=null;
    return $result;
}

function readTask($id) {
    $dbConn = createDatabase();
	$stmt = $dbConn->prepare("SELECT * FROM Tasks WHERE id=:id");
    $stmt->bindParam(":id", $id);
	$stmt->execute();
	$result=$stmt->fetch();
	$dbConn=null;
	return $result;
}

function updateTask($id) {
    $dbConn = createDatabase();
    $stmt = $dbConn->prepare("UPDATE Tasks SET `name`= '$_POST[taskName]' WHERE id=:id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $dbConn=null;
}

function deleteTask($id){
	$dbConn = createDatabase();
	$stmt = $dbConn->prepare("DELETE FROM Tasks WHERE id=:id");
    $stmt->bindParam(":id", $id);
	$stmt->execute();
	$dbConn=null;
	return $result;
}

function sortTimeDesc() {
    $dbConn = createDatabase();
	$stmt = $dbConn->prepare("SELECT * FROM `Tasks` ORDER BY time DESC");
	$stmt->execute();
    $result=$stmt->fetchAll();
	$dbConn=null;
	return $result;
}

function sortTimeAsc() {
    $dbConn = createDatabase();
	$stmt = $dbConn->prepare("SELECT * FROM `Tasks` ORDER BY time ASC");
	$stmt->execute();
    $result=$stmt->fetchAll();
	$dbConn=null;
	return $result;
}


?>