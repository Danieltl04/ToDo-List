<?php
function connectToDatabase()
{
    $serverName = "localhost";
    $userName = "root";
    $passWord = "mysql";
    $dataBase = "ToDo_list";
    
    try {
        $conn = new PDO("mysql:host=$serverName;dbname=$dataBase", $userName, $passWord);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
	}
}

function getLists()
{
    $conn = connectToDatabase();
	$query = $conn->query("SELECT * FROM lists");
	$query->execute();
	$result = $query->fetchAll();
	return $result;
}

function getList($id)
{
    $conn = connectToDatabase();
	$query = $conn->prepare("SELECT * FROM lists WHERE list_id=:list_id");
	$query->bindParam(":list_id", $id);
	$query->execute();
	$result = $query->fetch();
	return $result;
}

function getTasksForAssignedList($id)
{
    $conn = connectToDatabase();
	$query = $conn->prepare("SELECT * FROM tasks WHERE task_list_id=:list_id");
	$query->bindParam(":list_id", $id);
	$query->execute();
	$result = $query->fetchAll();
	return $result;
}

function getTasks()
{
    $conn = connectToDatabase();
	$query = $conn->query("SELECT * FROM tasks");
	$query->execute();
	$result = $query->fetchAll();
	return $result;
}

function getTask($id)
{
    $conn = connectToDatabase();
	$query = $conn->prepare("SELECT * FROM tasks WHERE task_id=:task_id");
	$query->bindParam(":task_id", $id);
	$query->execute();
	$result = $query->fetch();
	return $result;
}

function createNewList($data)
{
	$conn = connectToDatabase();
	$query = $conn->prepare("INSERT INTO lists (list_name) VALUES (:list_name);");
	$query->bindParam(":list_name", $data['name']);
	$query->execute();
}

function createNewTask($data) 
{
	$conn = connectToDatabase();
    $query = $conn->prepare("INSERT INTO tasks (task_list_id, task_name, task_duration, task_status) VALUES (:task_list_id, :task_name, :task_duration, :task_status);");
    $query->bindParam(":task_list_id", $data['list_id']);
    $query->bindParam(":task_name", $data['name']);
    $query->bindParam(":task_duration", $data['duration']);
    $query->bindParam(":task_status", $data['status']);
	$query->execute();
}

function updateList($data)
{
	$conn = connectToDatabase();
    $query = $conn->prepare("UPDATE lists SET list_name = :list_name WHERE list_id=:list_id");
    $query->bindParam(":list_id", $data['id']);
    $query->bindParam(":list_name", $data['name']);
	$query->execute();
}

function updateTask($data)
{
	$conn = connectToDatabase();
    $query = $conn->prepare("UPDATE tasks SET task_list_id = :task_list_id, task_name = :task_name, task_duration = :task_duration, task_status = :task_status WHERE task_id=:task_id");
    $query->bindParam(":task_id", $data['id']);
    $query->bindParam(":task_list_id", $data['task_list_id']);
    $query->bindParam(":task_name", $data['task_name']);
    $query->bindParam(":task_duration", $data['task_duration']);
    $query->bindParam(":task_status", $data['task_status']);
	$query->execute();
}

function deleteList($data)
{
	$conn = connectToDatabase();
	$query = $conn->prepare('DELETE FROM lists WHERE list_id=:list_id');
	$query->bindParam(":list_id", $data);
	$query->execute();
}

function deleteTask($data)
{
	$conn = connectToDatabase();
	$query = $conn->prepare('DELETE FROM tasks WHERE task_id=:task_id');
	$query->bindParam(":task_id", $data);
	$query->execute();
}