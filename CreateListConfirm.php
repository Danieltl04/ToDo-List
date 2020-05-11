<?php
    include("views/header.php");
    //var_dump($_POST);
    CreateNewList($_POST);
    header("Location: index.php");
?>