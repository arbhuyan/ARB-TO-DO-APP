<h2 class="li-title"><i class="icofont icofont-warning"></i> Delete Task !</h2>
<?php
    // get task id
    $task_id = _clr($_GET['id']);
    $uid = $_SESSION['uid'];

    // user data list
    $task_data = new data_class();
    $task = $task_data->get_single_task($task_id);

    if($task){ ?>
        <form class="confirmation" action="?page_id=delete_task&amp;id=<?php echo $task->id; ?>" method="POST">
            <label>Are you sure you want to delete this task named <strong><?php echo $task->task_name;?></strong></label>
            <input type="submit" value="yes" name="delete">
            <input type="submit" value="no" name="delete">
        </form> <!-- End .confirmation -->
    <?php } else {
        echo"<p>Sorry, This task isn't exist.</p>";
    }