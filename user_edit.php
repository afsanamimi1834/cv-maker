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

if(!empty($_POST)){
  // $uid = $_POST['uid'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $role = $_POST['role'];

  // image name create
  $image = $_FILES['image'];
  $imageName = $name. '_' .time(). '_' .rand(10000000,100000000). '.' .pathinfo($image['name'], PATHINFO_EXTENSION);
  $pathName ='upload/user/'.$imageName;

  // Image update
  if($image['size'] > 1){
    if(file_exists("upload/user/".$data['image']) && !empty($data['image'])){
      unlink("upload/user/".$data['image']);
    }
    move_uploaded_file($image['tmp_name'], $pathName);
    $update = "UPDATE user SET name='$name', email='$email', phone='$phone', role_id='$role', image='$imageName' WHERE id='$id'";
  }else{
    $update = "UPDATE user SET name='$name', email='$email', phone='$phone', role_id='$role' WHERE id='$id'";
  }

  if(mysqli_query($connect, $update)){
    echo '<div class="alert alert-success"><strong>Success!</strong> User update success. </div>';
    header("Refresh: 2;");
  }else{
    echo '<div class="alert alert-danger"><strong>Error!</strong> User update failed. </div>';
  }
}
?>

<div class="col-md-12">
  <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="col-md-9 heading_title">
          Edit User
        </div>
        <div class="col-md-3 text-right">
          <a href="user_all.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All User</a>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-body">
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-8">
            <!-- <input type="hidden" name="uid" value="<?= $data['id'] ?>"> -->
            <input type="text" class="form-control" name="name" value="<?= $data['name'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-8">
            <input type="email" class="form-control" name="email" value="<?= $data['email'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Phone</label>
          <div class="col-sm-8">
            <input type="number" class="form-control" name="phone" value="<?= $data['phone'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">User Role</label>
          <div class="col-sm-4">
            <select class="form-control select_cus" name="role">
              <option>Select User Role</option>
              <?php
                $roles = "SELECT * FROM role ORDER BY role_id ASC";
                $query = mysqli_query($connect, $roles);
                while($datas = mysqli_fetch_assoc($query)){
              ?>
                <option value="<?= $datas['role_id'] ?>"  <?php if($datas['role_id']==$data['role_id']) 
                echo 'selected="selected"' ?> >
                  <?= $datas['role_name'] ?>
                </option>
              <?php
                }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Image</label>
          <div class="col-sm-8">
            <input type="file" name="image" id="image">
            <div style="padding-top: 10px;">
              <?php if($data['image'] == true){ ?>
                <img id="showImage" src="upload/user/<?= $data['image'] ?>" style="height: 100px; width: 100px; border: 1px solid black">
              <?php }else{ ?>
                <img id="showImage" src="images/avatar.png" style="height: 100px; width: 100px; border: 1px solid black">
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="panel-footer text-center">
        <button class="btn btn-sm btn-primary">Update</button>
      </div>
    </div>
  </form>
</div>
<!--col-md-12 end-->

<?php
get_footer();
}else{
  echo 'Access Denied! You have no permission access this page';
}
?>

<script type="text/javascript">
  $(document).ready(function(){
    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src', e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>