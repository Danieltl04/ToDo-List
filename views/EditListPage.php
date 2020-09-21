<?php
    include("Templates/header.php");
    $list = GetList($_GET["id"]);
    //var_dump($list);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $name = $_POST['name'];
        if (empty($name)) {
            echo "Name is empty";
        } else {
            UpdateList($_POST);
            header("Location: index.php");
        }
    }
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <input type="hidden" name="id" value="<?= $list["list_id"]?>">
    <h3>name: <input type="text" name="name" value="<?php echo $list["list_name"] ?>" required></h3>
    <input type="submit" value="Versturen">
</form>