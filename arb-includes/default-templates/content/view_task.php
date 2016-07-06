<?php
    // get task id
    $task_id = _clr($_GET['id']);

    // user data list
    $task_data = new data_class();
    $task = $task_data->get_single_task($task_id);

    if($task){

    // show result
    echo"<h2 class=\"li-title\">".strtoupper($task->task_name)."</h2>";
    echo"<p><strong>Time Left:</strong> ".time_left($task->time)."</p>";
    echo"<p>".strip_tags(html_entity_decode($task->task_desc), '<h2><p><ul><li>')."</p>";

    } else {
        echo"<p>Sorry, This task isn't exist.</p>";
    }