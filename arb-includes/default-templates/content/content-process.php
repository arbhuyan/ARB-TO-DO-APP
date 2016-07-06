<?php

    // process content
    if(isset($_POST['submit_new_task'])){

        if(!empty($_POST['title']) && !empty($_POST['time']) && !empty($_POST['description'])){
            
            $title = _clr($_POST['title']);
            $time = _clr($_POST['time']);
            $description = _clr($_POST['description']);
            $uid = _clr($_SESSION['uid']);

            $insert_task = new data_class();
            $insert_db = $insert_task->insert_new_task($uid,$title,$description,$time);

            if($insert_db){
                $_SESSION['msg'] = "<i class=\"icofont icofont-ui-check\"></i> New task added to the list.";
                redirect_to("index.php");
            } else {
                $_SESSION['msg'] = "<i class=\"icofont icofont-ui-close\"></i> Something is not right, please try again.";
            }

        } else {
            $_SESSION['msg'] = "<i class=\"icofont icofont-warning\"></i> You have to fillup all fields.";
            redirect_to('?page_id=create_new');
        }
    } elseif(isset($_POST['submit_edit_task'])){
        
        $title = _clr($_POST['title']);
        $time = _clr($_POST['time']);
        $description = _clr($_POST['description']);
        $progress = _clr($_POST['progress']);
        $uid = _clr($_SESSION['uid']);
        $id = _clr($_POST['id']);

        $update_task = new data_class();
        $update_db = $update_task->update_task($id,$uid,$title,$description,$time,$progress);

        if($update_db){
            $_SESSION['msg'] = "<i class=\"icofont icofont-ui-check\"></i> Task updated successfully.";
            redirect_to("index.php");
        } else {
            $_SESSION['msg'] = "<i class=\"icofont icofont-ui-close\"></i> Something is not right, please try again.";
        }
    } elseif(isset($_POST['submit_new_pass'])){
        // get current pass
        if(isset($_POST['current_pass']) && isset($_POST['new_pass'])){
            $uid = _clr($_SESSION['uid']);
            $current_pass = _clr($_POST['current_pass']);
            $new_pass = _clr($_POST['new_pass']);

            $user_data = new main_class();
            $user_validate = $user_data->get_user_info($uid, $current_pass);

            if($user_validate){
                $user_update_data = new main_class();
                $user_update_data_verify = $user_update_data->update_user_info($uid, $new_pass);

                if($user_update_data_verify){
                    $_SESSION['msg'] = "<i class=\"icofont icofont-ui-check\"></i> Password changed successfully.";
                }
                
            } else {
                $_SESSION['msg'] = "<i class=\"icofont icofont-ui-close\"></i> Sorry, Updating password is not successfull, Try again.";
            }

        } else {
            echo"<p><i class=\"icofont icofont-warning\"></i>Please enter current password and new password.</p>";
        }
        
    } elseif(isset($_POST['delete'])){
        if($_POST['delete'] == "yes"){

            $delete_data = new data_class();
            $delete_info = $delete_data->delete_task($_GET['id']);

            if($delete_info){
                $_SESSION['msg'] = "<i class=\"icofont icofont-ui-check\"></i> Task is successfully deleted.";
            } else {
                $_SESSION['msg'] = "<i class=\"icofont icofont-ui-close\"></i> Sorry, Something wrong, Try again.";
            }

            // redirect to index
            redirect_to('index.php');

        } elseif($_POST['delete'] == "no"){
            // redirect to index
            redirect_to('index.php');
        }
    }