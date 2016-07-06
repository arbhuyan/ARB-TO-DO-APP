<h2 class="li-title"><i class="icofont icofont-key"></i> Change Passwords</h2>
<?php
    if(get_message()){
        echo show_message();
    }
?>
<div class="form-box">
    <form action="?page_id=settings&amp;change_pass=yes" id="form" method="post">
        <div class="form-group">
            <label for="current_pass">Current Password:</label>
            <input type="text" name="current_pass" placeholder="Current Password">
        </div> <!-- /.form-group -->

        <div class="form-group">
            <label for="new_pass">New Password:</label>
            <input type="text" name="new_pass" placeholder="New Password">
        </div> <!-- /.form-group -->

        <div class="form-group">
            <input type="submit" class="submit" name="submit_new_pass" value="Change Password">
        </div> <!-- /.form-group -->

    </form> <!-- /#form -->
</div> <!-- /.form-box -->