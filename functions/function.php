<?php session_start();
    require_once('database.php');
    
    function get_header(){
        require_once('includes/header.php');
    }

    function get_sidebar()
    {
        require_once('includes/sidebar.php');
    }

    function get_footer()
    {
        require_once('includes/footer.php');
    }

    function needLogged(){
        $check = $_SESSION['id'] ? true : false;
        if($check == false){
            header('Location: login.php');
        }
    }
?>