<?php
    require_once('functions/function.php');
    $id = $_GET['id'];
    $user = "SELECT * FROM basic_info WHERE id = '$id'";
    $query = mysqli_query($connect, $user);
    $data = mysqli_fetch_assoc($query);
    // echo print_r($data); exit();
    if(!empty($data['image'])){
        unlink("upload/cv/".$data['image']);
    }

    $delete = "DELETE FROM basic_info WHERE id = '$id'";
    // echo print_r($delete); exit();
    if(mysqli_query($connect, $delete)){
        header('Location: all_cv_info.php');
    }
?>
