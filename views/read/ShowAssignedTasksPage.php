<?php
    $tasks = getTasksForAssignedList($_GET["Id"]);
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
        foreach ($tasks as $task) {
            ?>
            <tr>
              <td><?php echo $task['task_name']; ?></td>
              <td><?php echo $task['task_duration']; ?></td>
              <td><?php echo $task['task_status']; ?></td>
            </tr>
            <?php
        }
      ?>
    </tbody>
  </table>
</div>
