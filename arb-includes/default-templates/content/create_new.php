<h2 class="li-title"><i class="icofont icofont-edit"></i> Create New Task</h2>
<?php
    if(get_message()){
        echo show_message();
    }
?>

<div class="form-box">
    <form action="?page_id=create_new&amp;create_new=update" id="form" method="post">
        <div class="form-group">
            <label for="title">Task Name:</label>
            <input type="text" name="title" placeholder="Title of your project">
        </div> <!-- /.form-group -->

        <div class="form-group">
            <label for="time">Task Time: (dd-mm-yy)</label>
            <input type="text" name="time" placeholder="Time of your project">
        </div> <!-- /.form-group -->

        <div class="form-group">
            <label for="description">Task Description: (Tags Allowed: h2, p, ul, li)</label>
            <textarea name="description" id="description" cols="100" rows="3"></textarea>
        </div> <!-- /.form-group -->

        <div class="form-group">
            <input type="submit" class="submit" name="submit_new_task" value="Add New">
        </div> <!-- /.form-group -->

    </form> <!-- /#form -->
</div> <!-- /.form-box -->