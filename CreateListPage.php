<?php
    include("views/header.php");
    
?>
<form action="CreateListConfirm.php?id=<?php echo $list['list_id']; ?>" method="post">
    <h3>name: <input type="text" name="name" required></h3>
    <input type="submit" value="Versturen">
</form>