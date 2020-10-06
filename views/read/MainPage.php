<?php
    $allLists = getLists();
    $allTasks = getTasks();
?>
<div class="container">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#menu1">Lists</a></li>
        <li><a data-toggle="tab" href="#menu2">Tasks</a></li>
    </ul>
    <div class="tab-content">
        <div id="menu1" class="tab-pane fade in active">
            <div class="container">
                <h2>Lijsten</h2>
                <div>
                    <div class="col-sm-11">
                        <input class="form-control " type="text" id="myInput" placeholder="Search for names.." title="Type in a name">      
                    </div>
                    <div class="col-sm-1">
                        <a href="Index.php?Action=Create&Showing=List">
                            <button type="button" class="btn btn-success btn-sm" >
                                <i class="fa fa-plus"></i>
                            </button>
                        </a>
                    </div>
                </div>
                
                <table id="table_id" class="display table table-striped" >
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        foreach ($allLists as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row['list_id']; ?></td>
                                <td><?php echo $row['list_name']; ?></td>
                                <td style="width:2%;" value="<?php echo $row['list_id']; ?>">
                                    <a href="Index.php?Action=Show&Showing=List&Id=<?php echo $row['list_id']; ?>">
                                        <i class="fa fa-align-justify"></i>
                                    </a>
                                </td>
                                <td style="width:2%;" value="<?php echo $row['list_id']; ?>">
                                    <a href="Index.php?Action=Edit&Showing=List&Id=<?php echo $row['list_id']; ?>">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td style="width:2%;" value="<?php echo $row['list_id']; ?>">
                                    <a href="Index.php?Action=Delete&Showing=List&Id=<?php echo $row['list_id']; ?>">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="menu2" class="tab-pane fade">
            <div class="container">
                <h2>Taken om te doen</h2>     
                <div class="col-sm-9">
                    <input class="form-control" type="text" id="myInput" placeholder="Search for names.." title="Type in a name">
                </div>
                <div class="col-sm-2">
                    <select class="form-control" name="status">
                        <option value="All">Show every status</option>
                        <option value="gedaan">gedaan</option>
                        <option value="niet gedaan">niet gedaan</option>
                    </select>
                </div> 
                <div class="col-sm-1">
                    <a href="Index.php?Action=Create&Showing=Task">
                        <button type="button" class="btn btn-success btn-sm" >
                            <i class="fa fa-plus"></i>
                        </button>
                    </a>
                </div>      
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>List_id</th>
                            <th>Name</th>
                            <th>Duration</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($allTasks as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row['task_id']; ?></td>
                                <td><?php echo $row['task_list_id']; ?></td>
                                <td><?php echo $row['task_name']; ?></td>
                                <td><?php echo $row['task_duration']; ?></td>
                                <td><?php echo $row['task_status']; ?></td>
                                <td style="width:2%;" value="<?php echo $row['task_id']; ?>">
                                    <a href="Index.php?Action=Edit&Showing=Task&Id=<?php echo $row['task_id']; ?>">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td style="width:2%;" value="<?php echo $row['task_id']; ?>">
                                    <a href="Index.php?Action=Delete&Showing=Task&Id=<?php echo $row['task_id']; ?>">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>