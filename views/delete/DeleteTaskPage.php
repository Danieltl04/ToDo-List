<?php
    deleteTask($_GET["Id"]);
    header("Location: Index.php?Action=Show&Showing=All");