<?php
    require_once('functions/function.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Panel :: Login </title>
        <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css"/>
        <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <div class="container">    
            <div style="margin-top:100px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                    </div>     
                    <div style="padding-top:30px" class="panel-body" >
                        <?php
                            if(!empty($_POST)){
                                $email = $_POST['email'];
                                $password = md5($_POST['password']);
                                $user = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
                                $query = mysqli_query($connect, $user);
                                $data = mysqli_fetch_assoc($query);
                                // echo print_r($data); exit();

                                if($data){        
                                    $_SESSION['id'] = $data['id'];    
                                    $_SESSION['role'] = $data['role_id'];    
                                    $_SESSION['name'] = $data['name'];    
                                    $_SESSION['email'] = $data['email'];    
                                    $_SESSION['phone'] = $data['phone'];    
                                    $_SESSION['image'] = $data['image'];    
                                    header('Location: index.php');
                                }else{
                                    echo '<div class="alert alert-danger"><strong>Error!</strong> Email and Password did not match. </div>';
                                }
                            }
                        ?>
                        

                        <form class="form-horizontal" action="" method="post">

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input id="login-email" type="email" class="form-control" name="email" value="" placeholder="email address">                                        
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                            </div>
                            <div style="margin-top:10px" class="form-group">
                                <div class="col-sm-12 controls">
                                    <button id="btn-login" class="btn btn-success">Login  </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 control">
                                    <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                        Don't have an account! 
                                        <a href="register.php">
                                            Sign Up Here
                                        </a>
                                    </div>
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