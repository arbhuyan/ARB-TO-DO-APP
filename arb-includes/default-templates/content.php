<?php
    // logical conditions for diferent tasks
    
    if(isset($_GET['page_id'])){
        $pageid = $_GET['page_id'];
    } else {
        $pageid = "";
    }

    if(isset($_POST)){
        require_once("content/content-process.php");
    }

    if($pageid == "create_new"){
        // process create new page
        
        require_once("content/create_new.php");
    
    } elseif($pageid == "edit_task"){
        // process create new page
        
        require_once("content/edit_task.php");
    
    } elseif($pageid == "view_task"){
        // process create new page
        
        require_once("content/view_task.php");
    
    } elseif($pageid == "delete_task"){
        // process create new page
        
        require_once("content/delete_task.php");
    
    } elseif($pageid == "settings"){
        // process settings page
        
        require_once("content/settings.php");
    
    } else {
        // process dashboard
        
        require_once("content/dashboard.php");
    }
