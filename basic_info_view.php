<?php
require_once('functions/function.php');
needLogged();
get_header();
get_sidebar();

$id = $_GET['id'];
$user = "SELECT * FROM basic_info WHERE id = '$id'";
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
                <a href="all_cv_info.php" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> All Basic Info</a>
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
                    <tr>
                        <td>Profession</td>
                        <td>:</td>
                        <td><?= $data['profession'] ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td><?= $data['address'] ?></td>
                    </tr>
                    <tr>
                        <td>Objective</td>
                        <td>:</td>
                        <td><?= $data['objective'] ?></td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td>:</td>
                        <td>
                            <?php if($data['image'] == true){ ?>
                            <img width="100px" src="upload/cv/<?= $data['image'] ?>" alt="user_image">
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
?>