<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $name = $_POST['name'];
        if (empty($name)) {
            echo "Name is empty";
        } else {
            createNewList($_POST);
            header("Location: Index.php?Action=Show&Showing=All");
        }
    }
    
?>
<form action="Index.php?Action=Create&Showing=List" method="post">
    <h3>name: <input type="text" name="name" required></h3>
    <input type="submit" value="Versturen">
</form>