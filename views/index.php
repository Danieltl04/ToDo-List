<?php
    include("Templates/header.php");
    $AllLists = GetLists();
    $AllTasks = GetTasks();
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
                        <a href="CreateListPage.php">
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
                        foreach($AllLists as $Row){
                            ?>
                            <tr>
                                <td><?php echo $Row['list_id']; ?></td>
                                <td><?php echo $Row['list_name']; ?></td>
                                <td style="width:2%;" value="<?php echo $Row['list_id']; ?>">
                                    <a href="ShowAssignedTasksPage.php?id=<?php echo $Row['list_id']; ?>">
                                        <i class="fa fa-align-justify"></i>
                                    </a>
                                </td>
                                <td style="width:2%;" value="<?php echo $Row['list_id']; ?>">
                                    <a href="EditListPage.php?id=<?php echo $Row['list_id']; ?>">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td style="width:2%;" value="<?php echo $Row['list_id']; ?>">
                                    <a href="DeleteListPage.php?id=<?php echo $Row['list_id']; ?>">
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
                    <a href="CreateTaskPage.php">
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
                        foreach($AllTasks as $Row){
                            ?>
                            <tr>
                                <td><?php echo $Row['task_id']; ?></td>
                                <td><?php echo $Row['task_list_id']; ?></td>
                                <td><?php echo $Row['task_name']; ?></td>
                                <td><?php echo $Row['task_duration']; ?></td>
                                <td><?php echo $Row['task_status']; ?></td>
                                <td style="width:2%;" value="<?php echo $Row['task_id']; ?>">
                                    <a href="EditTaskPage.php?id=<?php echo $Row['task_id']; ?>">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td style="width:2%;" value="<?php echo $Row['task_id']; ?>">
                                    <a href="DeleteTaskPage.php?id=<?php echo $Row['task_id']; ?>">
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
<!-- <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create a new list</h4>
        </div>
        <div class="modal-body">
            <form action="NewListPage.php" method="post" >
                <div style="padding:5px;">
                    <div class="col-sm-2"><p>name:</p></div>
                    <div class="col-sm-10"><input class="form-control" type="text" name="name" required></div>
                </div>
                <input style="margin-left:45%; margin-top: 5px;" class="btn btn-default" type="submit" value="Versturen">
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
</div> -->
</body>
<!-- <script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script> -->