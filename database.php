<?php
    error_reporting(0);
    $connect = mysqli_connect('localhost', 'root', '', 'cv_maker');
    if (!$connect) {
        echo "Database connection error :(";
    }
?>