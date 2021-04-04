<div class="container-fluid content_full">
    <div class="row">
        <div class="col-md-2 sidebar pd0">
            <div class="side_user">

                <?php if($_SESSION['image'] == true){ ?>
                    <img class="img-responsive" src="upload/user/<?= $_SESSION['image'] ?>"/>
                <?php }else{ ?>
                    <img class="img-responsive" src="images/avatar.png"/>
                <?php } ?>

                <!-- <img class="img-responsive" src="images/avatar.png"/> -->
                <h4><?= $_SESSION['name'] ?></h4>
                <span><i class="fa fa-circle"></i> Online</span>
            </div>
            <h2>MAIN NAVIGATION</h2>
            <ul>
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <?php
                    if($_SESSION['role'] == '1'){
                ?>
                    <li><a href="user_all.php"><i class="fa fa-user-circle"></i> User</a></li>
                <?php }?>
                <li><a href="basic_info.php"><i class="fa fa-book"></i> Make CV</a></li>
                <li><a href="all_cv_info.php"><i class="fa fa-eye"></i> View CV Info</a></li>
                <li><a href="profile.php"><i class="fa fa-user"></i> Update Profile</a></li>
                <li><a href="change_pass.php"><i class="fa fa-key"></i> Change Password</a></li>
                <li><a href="cv_delete.php" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> Delete CV</a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
        </div><!--sidebar end-->
        <div class="col-md-10 admin-part pd0">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">Dashboard</a></li>
            </ol>