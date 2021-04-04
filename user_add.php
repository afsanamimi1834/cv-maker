<?php
require_once('functions/function.php');
needLogged();

if($_SESSION['role'] == '1'){

get_header();
get_sidebar();

if (!empty($_POST)) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $role = $_POST['role'];
  $password = md5($_POST['password']);
  $confirm_password = md5($_POST['confirm_password']);

  // image name create
  $image = $_FILES['image'];
  // echo print_r($image); exit();
  $imageName = $name. '_' .time(). '_' .rand(10000000,100000000). '.' .pathinfo($image['name'], PATHINFO_EXTENSION);
  $pathName ='upload/user/'.$imageName;

  if ($password == $confirm_password) {

    // image upload
    if($image['size'] > 1){
      move_uploaded_file($image['tmp_name'], $pathName);
      $insert = "INSERT INTO user(name, email, phone, role_id, password, image) VALUES('$name', '$email', '$phone', '$role', '$password', '$imageName')";
    }else{
      $insert = "INSERT INTO user(name, email, phone, role_id, password) VALUES('$name', '$email', '$phone', '$role', '$password')";
    }
    
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

<div class="col-md-12">
  <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="col-md-9 heading_title">
          Add User
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
            <input type="text" class="form-control" name="name">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-8">
            <input type="email" class="form-control" name="email">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Phone</label>
          <div class="col-sm-8">
            <input type="number" class="form-control" name="phone">
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
                while($data = mysqli_fetch_assoc($query)){
              ?>
              <option value="<?= $data['role_id'] ?>"><?= $data['role_name'] ?></option>
              <?php
                }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" name="password">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Confirm Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" name="confirm_password">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Image</label>
          <div class="col-sm-8">
            <input type="file" name="image" id="image">
            <div style="padding-top: 10px;">
              <img id="showImage" src="" style="height: 100px; width: 100px; border: 1px solid black">
            </div>
          </div>
        </div>
      </div>
      <div class="panel-footer text-center">
        <button class="btn btn-sm btn-primary">Create</button>
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