<?php
    include("Templates/header.php");
    $AllLists = GetLists();
    $MaxSizeOfLists = sizeof($AllLists);
    //var_dump($AllLists);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $name = $_POST['name'];
        $dur = $_POST['duration'];
        $status = $_POST['duration'];
        if (empty($name) || empty($dur) || empty($status)) {
            echo "Name is empty";
        } else {
            CreateNewTask($_POST);
            header("Location: index.php");
        }
    }
?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="taskform">

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