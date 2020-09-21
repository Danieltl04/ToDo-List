<?php
    include("Templates/header.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $name = $_POST['name'];
        if (empty($name)) {
            echo "Name is empty";
        } else {
            echo $name;
            CreateNewList($_POST);
            header("Location: index.php");
        }
    }
    
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <h3>name: <input type="text" name="name" required></h3>
    <input type="submit" value="Versturen">
</form>