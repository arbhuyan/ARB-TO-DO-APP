<h2 class="li-title"><i class="icofont icofont-pencil"></i> Edit Task</h2>
<?php
    // get task id
    $task_id = _clr($_GET['id']);

    // user data list
    $task_data = new data_class();
    $task = $task_data->get_single_task($task_id);

    if($task){
?>
<div class="form-box">
    <form action="?edit_task=update" id="form" method="post">
        <div class="form-group">
            <label for="id">Task ID: <strong><?php echo $task_id; ?></strong></label>
            <input type="hidden" name="id" value="<?php echo $task_id; ?>">
        </div> <!-- /.form-group -->

        <div class="form-group">
            <label for="title">Task Name:</label>
            <input type="text" name="title" value="<?php echo $task->task_name; ?>">
        </div> <!-- /.form-group -->

        <div class="form-group">
            <label for="time">Task Time: (dd-mm-yy)</label>
            <input type="text" name="time" value="<?php echo $task->time; ?>">
        </div> <!-- /.form-group -->

        <div class="form-group">
            <label for="progress">Task Progress: (in %)</label>
            <input type="text" name="progress" value="<?php echo $task->progress; ?>">
        </div> <!-- /.form-group -->

        <div class="form-group">
            <label for="description">Task Description: (Tags Allowed: h2, p, ul, li)</label>
            <textarea name="description" id="description" cols="100" rows="3"><?php echo $task->task_desc; ?></textarea>
        </div> <!-- /.form-group -->

        <div class="form-group">
            <input type="submit" class="submit" name="submit_edit_task" value="Update data">
        </div> <!-- /.form-group -->

    </form> <!-- /#form -->
</div> <!-- /.form-box -->
<?php
} else {
    echo"<p>Sorry, This task isn't exist.</p>";
}