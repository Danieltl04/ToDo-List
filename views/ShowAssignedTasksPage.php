<?php
    include("Templates/header.php");
    $test = GetTasksForAssignedList($_GET["id"]);
    //var_dump($test);

    
?>
<div class="container">        
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Duration</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
    <?php
        foreach ($test as $row) {
            ?>
            <tr>
              <td><? echo $row['task_name']; ?></td>
              <td><? echo $row['task_duration']; ?></td>
              <td><? echo $row['task_status']; ?></td>
            </tr>
            <?php
        }
      ?>
    </tbody>
  </table>
</div>
