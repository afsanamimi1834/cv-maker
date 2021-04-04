<?php
require_once('functions/function.php');
needLogged();

if($_SESSION['role'] == '1'){

get_header();
get_sidebar();

$id = $_GET['id'];
$user = "SELECT * FROM user WHERE id = '$id'";
$query = mysqli_query($connect, $user);
$data = mysqli_fetch_assoc($query);
?>

<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="col-md-9 heading_title">
                View User Information
            </div>
            <div class="col-md-3 text-right">
                <a href="user_all.php" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> All User</a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="col-md-1">
            </div>
            <div class="col-md-9">
                <table class="table table-hover table-striped table-responsive view_table_cus">
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td><?= $data['name'] ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?= $data['email'] ?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td><?= $data['phone'] ?></td>
                    </tr>
                    <!-- <tr>
                        <td>User Role</td>
                        <td>:</td>
                        <td>...</td>
                    </tr> -->
                    <tr>
                        <td>Image</td>
                        <td>:</td>
                        <td>
                            <?php if($data['image'] == true){ ?>
                            <img width="100px" src="upload/user/<?= $data['image'] ?>" alt="user_image">
                            <?php }else{ ?>
                            <img width="100px" src="images/avatar.png" alt="user_image">
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
</div>
<!--col-md-12 end-->

<?php
get_footer();
}else{
    echo 'Access Denied! You have no permission access this page';
  }
?>