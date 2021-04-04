<?php
require_once('functions/function.php');
needLogged();
get_header();
get_sidebar();

$id = $_SESSION['id'];
// echo $id; exit();
$user = "SELECT * FROM user WHERE id = '$id'";
$query = mysqli_query($connect, $user);
$data = mysqli_fetch_assoc($query);

if(!empty($_POST)){
  $c_password = md5($_POST['c_password']);
  $password = md5($_POST['password']);
  // echo $password; exit();
  $confirm_password = md5($_POST['confirm_password']);

  if($c_password == $data['password']){
    if($password == $confirm_password){
      $update = "UPDATE user SET password='$password' WHERE id = '$id'";

      if(mysqli_query($connect, $update)){
        echo '<div class="alert alert-success"><strong>Success!</strong> Password update success. </div>';
        header("Refresh: 2;");
      }else{
        echo '<div class="alert alert-danger"><strong>Error!</strong> Password update failed. </div>';
      }
    }else{
      echo '<div class="alert alert-warning"><strong>Error!</strong> New Password and Confirm Password did not match. </div>';
    }
  }else{
    echo '<div class="alert alert-danger"><strong>Error!</strong> Your current password did not match. </div>';
  }
}
?>

<div class="col-md-12">
  <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="col-md-9 heading_title">
          Update Information
        </div>
        <div class="col-md-3 text-right">
    
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-body">

        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Current Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" name="c_password" value="">
          </div>
        </div>

        <div class="form-group">
          <label for="" class="col-sm-3 control-label">New Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" name="password" value="" required>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Confirm Password</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" name="confirm_password" value="" required>
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