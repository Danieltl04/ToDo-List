<?php
    include("views/header.php");
    var_dump($_GET["id"]);
    DeleteList($_GET["id"]);
    header("Location: index.php");
?>