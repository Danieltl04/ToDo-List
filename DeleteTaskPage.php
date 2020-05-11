<?php
    include("views/header.php");
    var_dump($_GET["id"]);
    Deletetask($_GET["id"]);
    header("Location: index.php");
?>