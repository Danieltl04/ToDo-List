<?php
    include("views/header.php");
    $AllLists = GetLists();
    $MaxSizeOfLists = sizeof($AllLists);
    $task = GetTask($_GET["id"]);
    var_dump($task);
?>
<form action="EditTaskConfirm.php?id=<?php echo $task['task_id']; ?>" method="post">
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