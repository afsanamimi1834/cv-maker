<?php
    require_once('functions/function.php');
    $id = $_GET['id'];
    $user = "SELECT * FROM user WHERE id = '$id'";
    $query = mysqli_query($connect, $user);
    $data = mysqli_fetch_assoc($query);
    // echo print_r($data); exit();
    if(!empty($data['image'])){
        unlink("upload/user/".$data['image']);
    }

    $delete = "DELETE FROM user WHERE id = '$id'";
    // echo print_r($delete); exit();
    if(mysqli_query($connect, $delete)){
        header('Location: user_all.php');
    }
?>
