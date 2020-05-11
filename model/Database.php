<?php
function ConnectToDatabase(){
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $database = "ToDo_list";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        return $conn;
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
}

function GetLists(){
    $conn = ConnectToDatabase();
	$query = $conn->query("SELECT * FROM lists");
	$query->execute();
	$result = $query->fetchAll();
	return $result;
}

function GetList($id){
    $conn = ConnectToDatabase();
	$query = $conn->prepare("SELECT * FROM lists WHERE list_id=:list_id");
	$query->bindParam(":list_id", $id);
	$query->execute();
	$result = $query->fetch();
	return $result;
}

function GetTasksForAssignedList($id){
    $conn = ConnectToDatabase();
	$query = $conn->prepare("SELECT * FROM tasks WHERE task_list_id=:list_id");
	$query->bindParam(":list_id", $id);
	$query->execute();
	$result = $query->fetchAll();
	return $result;
}

function GetTasks(){
    $conn = ConnectToDatabase();
	$query = $conn->query("SELECT * FROM tasks");
	$query->execute();
	$result = $query->fetchAll();
	return $result;
}

function GetTask($id){
    $conn = ConnectToDatabase();
	$query = $conn->prepare("SELECT * FROM tasks WHERE task_id=:task_id");
	$query->bindParam(":task_id", $id);
	$query->execute();
	$result = $query->fetch();
	return $result;
}

function CreateNewList($data){
	$conn = ConnectToDatabase();
	$query = $conn->prepare("INSERT INTO lists (list_name) VALUES (:list_name);");
	$query->bindParam(":list_name", $data['name']);
	$query->execute();
}

function CreateNewTask($data){
	$conn = ConnectToDatabase();
    $query = $conn->prepare("INSERT INTO tasks (task_list_id, task_name, task_duration, task_status) VALUES (:task_list_id, :task_name, :task_duration, :task_status);");
    $query->bindParam(":task_list_id", $data['list_id']);
    $query->bindParam(":task_name", $data['name']);
    $query->bindParam(":task_duration", $data['duration']);
    $query->bindParam(":task_status", $data['status']);
	$query->execute();
}

function UpdateList($data){
	$conn = ConnectToDatabase();
    $query = $conn->prepare("UPDATE lists SET list_name = :list_name WHERE list_id=:list_id");
    $query->bindParam(":list_id", $data['id']);
    $query->bindParam(":list_name", $data['name']);
	$query->execute();
}

function UpdateTask($data){
	$conn = ConnectToDatabase();
    $query = $conn->prepare("UPDATE tasks SET task_list_id = :task_list_id, task_name = :task_name, task_duration = :task_duration, task_status = :task_status WHERE task_id=:task_id");
    $query->bindParam(":task_id", $data['id']);
    $query->bindParam(":task_list_id", $data['task_list_id']);
    $query->bindParam(":task_name", $data['task_name']);
    $query->bindParam(":task_duration", $data['task_duration']);
    $query->bindParam(":task_status", $data['task_status']);
	$query->execute();
}

function DeleteList($data){
	$conn = ConnectToDatabase();
	$query = $conn->prepare('DELETE FROM lists WHERE list_id=:list_id');
	$query->bindParam(":list_id", $data);
	$query->execute();
}

function DeleteTask($data){
	$conn = ConnectToDatabase();
	$query = $conn->prepare('DELETE FROM tasks WHERE task_id=:task_id');
	$query->bindParam(":task_id", $data);
	$query->execute();
}

?>