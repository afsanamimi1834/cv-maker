<?php
    require_once('functions/function.php');
    $id = $_GET['id'];
    $delete = "DELETE FROM project WHERE id = '$id'";
    // echo print_r($delete); exit();
    if(mysqli_query($connect, $delete)){
        header('Location: all_cv_info.php');
    }
?>
