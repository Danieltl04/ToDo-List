<?php
    include("views/header.php");
    $AllLists = GetLists();
    $MaxSizeOfLists = sizeof($AllLists);
    //var_dump($AllLists);
?>

<form action="CreateTaskConfirm.php" method="post" id="taskform">

    <h3>List_id:</h3>
        <select name="list_id" id="status2" >
            <?php foreach ($AllLists as $test) { ?>
                <option value="<?php echo $test['list_id']; ?>"><?php echo $test['list_id'] . ": ". $test['list_name']; ?></option>
            <? } ?>
        </select>

    <h3>Name: <input type="text" name="name" required></h3>
    <h3>Duration: <input type="number" name="duration" required></h3>
    <h3>Status: <input type="text" name="status" required></h3>
    <!-- <h3>Status: 
        <select name="status">
            <option value="gedaan">gedaan</option>
            <option value="niet gedaan">niet gedaan</option>
        </select>
    </h3> -->
    <input type="submit" value="Versturen">
</form>