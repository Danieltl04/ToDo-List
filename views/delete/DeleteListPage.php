<?php
    deleteList($_GET["Id"]);
    header("Location: Index.php?Action=Show&Showing=All");