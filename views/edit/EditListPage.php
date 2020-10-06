<?php
    $list = getList($_GET["Id"]);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $name = $_POST['name'];
        if (empty($name)) {
            echo "Name is empty";
        } else {
            updateList($_POST);
            header("Location: Index.php?Action=Show&Showing=All");
        }
    }
?>
<form action="Index.php?Action=Edit&Showing=List&Id=<?php echo $list["list_id"] ?>" method="post">
    <input type="hidden" name="id" value="<?php echo $list["list_id"] ?>">
    <h3>name: <input type="text" name="name" value="<?php echo $list["list_name"] ?>" required></h3>
    <input type="submit" value="Versturen">
</form>