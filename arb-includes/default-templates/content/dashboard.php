<h2 class="li-title"><i class="icofont icofont-dashboard-web"></i> To Do List</h2>
<?php
    if(get_message()){
        echo show_message();
    }
?>

<ul class="list-table">
    <li class="list-li list-header">
        <div class="col-2">Task Name</div>
        <div class="col-4">Task Description</div>
        <div class="col-2">Progress</div>
        <div class="col-2">Time Left</div>
        <div class="col-2">Action</div>
    </li> <!-- /.list-li -->
    <?php
        $data = todo_list();

        if($data){

            foreach ($data as $task) { ?>
                <li class="list-li">
                    <div class="col-2"><?php echo $task->task_name; ?></div>
                    <div class="col-4"><?php echo substr($task->task_desc,0,100); ?>...</div>
                    <div class="col-2"><?php $task_progress = str_replace("%", "", $task->progress); if($task_progress == 100){echo"Completed.";} elseif($task_progress == null) { echo"0%"; } else { echo $task_progress."%"; } ?></div>
                    <div class="col-2"><?php echo time_left($task->time); ?></div>
                    <div class="col-2"><a href="?page_id=view_task&amp;id=<?php echo $task->id; ?>"><i class="icofont icofont-world"></i></a> / <a href="?page_id=edit_task&amp;id=<?php echo $task->id; ?>"><i class="icofont icofont-edit"></i></a> / <a href="?page_id=delete_task&amp;id=<?php echo $task->id; ?>"><i class="icofont icofont-trash"></i></a></div>
                </li> <!-- /.list-li -->
            <?php
            }
        } else {
            echo "<p>No task listed. <a href=\"?page_id=create_new\">Create New</a></p>";
        }
    ?>
</ul> <!-- /.side-nav -->