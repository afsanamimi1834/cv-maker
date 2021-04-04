<?php
    require_once('functions/function.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Panel :: Register </title>
        <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css"/>
        <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <div class="container">
            <div style="margin-top:100px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Sign Up</div>
                        <div style="float:right; font-size: 85%; position: relative; top:-10px">
                            <a href="login.php">Sign In</a>
                        </div>
                    </div>  
                    <div class="panel-body" >

                        <?php     
                            if (!empty($_POST)) {
                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $phone = $_POST['phone'];
                                $password = md5($_POST['password']);
                                // echo $password; exit();
                                $confirm_password = md5($_POST['confirm_password']);

                                if ($password == $confirm_password) {
                                    $insert = "INSERT INTO user(name, email, phone, password) VALUES('$name', '$email', '$phone', '$password')";
                                    
                                    if (mysqli_query($connect, $insert)) {
                                        echo '<div class="alert alert-success"><strong>Success!</strong> User registration success. </div>';
                                        header("Refresh: 2;");
                                    } else {
                                        echo '<div class="alert alert-danger"><strong>Error!</strong> User registration failed. </div>';
                                    }
                                    
                                } else {
                                    echo '<div class="alert alert-warning"><strong>Error!</strong> Password did not match. </div>';
                                }
                            }
                        ?>

                        <form class="form-horizontal" action="" method="POST">
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" name="name" value="" placeholder="Name">                                        
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input type="email" class="form-control" name="email" value="" placeholder="Email Address">                                        
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input type="number" class="form-control" name="phone" value="" placeholder="Phone Number">                                        
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" class="form-control" name="password" value="" placeholder="Password">                                        
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" class="form-control" name="confirm_password" value="" placeholder="Confirm Password">                                        
                            </div>

                            <div style="margin-top:10px" class="form-group">
                                <div class="col-sm-12 controls">
                                    <button id="btn-login" class="btn btn-success">Sign Up</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
    </body>
</html>