<?php
    require("model/DataLayer.php");
    require("views/Templates/header.php");

    $page = $_GET['Showing'];
 
    if ($_GET['Action'] === 'Show') {
        if ($page === 'All') {
            require("views/read/MainPage.php");
        } else if ($page === 'List') {
            require("views/read/ShowAssignedTasksPage.php");
        }
    } else if ($_GET['Action'] === 'Create') {
        require("views/create/Create" . $page . "Page.php");
    } elseif ($_GET['Action'] === 'Edit') {
        require("views/edit/Edit" . $page . "Page.php");
    } elseif ($_GET['Action'] === 'Delete') {
        require("views/delete/Delete" . $page . "Page.php");
    } else {
        require("views/read/MainPage.php");
    }
