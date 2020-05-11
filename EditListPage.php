<?php
    include("views/header.php");
    $list = GetList($_GET["id"]);
    var_dump($list);
?>
<form action="EditListConfirm.php?id=<?php echo $list['list_id']; ?>" method="post">
    <input type="hidden" name="id" value="<?= $list["list_id"]?>">
    <h3>name: <input type="text" name="name" value="<?php echo $list["list_name"] ?>" required></h3>
    <input type="submit" value="Versturen">
</form>