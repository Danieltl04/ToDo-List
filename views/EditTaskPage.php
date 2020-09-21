<?php
    include("Templates/header.php");
    $AllLists = GetLists();
    $MaxSizeOfLists = sizeof($AllLists);
    $task = GetTask($_GET["id"]);
    //var_dump($task);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $name = $_POST['task_name'];
        $dur = $_POST['task_duration'];
        $status = $_POST['task_status'];
        if (empty($name) || empty($dur) || empty($status)) {
            echo "Name is empty";
        } else {
            UpdateTask($_POST);
            header("Location: index.php");
        }
    }
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <input type="hidden" name="id" value="<?= $task["task_id"]?>">
    <h3>List_id: <input type="number" name="task_list_id" min="1" max="<? echo($MaxSizeOfLists); ?>" value="<?= $task["task_list_id"]?>" required></h3>
    <h3>Name: <input type="text" name="task_name" value="<?= $task["task_name"]?>" required></h3>
    <h3>Duration: <input type="number" name="task_duration" value="<?= $task["task_duration"]?>" required></h3>
    <h3>Status: <input type="text" name="task_status" value="<?= $task["task_status"]?>" required></h3>
    <!-- <h3>Status: 
        <select name="task_status">
            <option value="gedaan">gedaan</option>
            <option value="niet gedaan">niet gedaan</option>
        </select>
    </h3> -->
    <input type="submit" value="Versturen">
</form>