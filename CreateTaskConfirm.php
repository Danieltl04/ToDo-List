<?php
    include("views/header.php");
    var_dump($_POST);
    CreateNewTask($_POST);
    header("Location: index.php");
?>