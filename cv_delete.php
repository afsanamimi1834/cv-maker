<?php
    require_once('functions/function.php');
    $user_id = $_SESSION['id'];
    // echo $user_id; exit();
    
    $delete = "DELETE basic_info, experience, project, skill, link FROM basic_info
    INNER JOIN experience
    ON experience.user_id = basic_info.user_id
    INNER JOIN project
    ON project.user_id = basic_info.user_id
    INNER JOIN skill
    ON skill.user_id = basic_info.user_id
    INNER JOIN link
    ON link.user_id = basic_info.user_id
    WHERE basic_info.user_id = '$user_id'";

    if(mysqli_query($connect, $delete)){
        header('Location: index.php');
    }


?>
