<?php
require_once('functions/function.php');
needLogged();
get_header();
get_sidebar();

if (!empty($_POST)) {
  $user_id = $_SESSION['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $profession = $_POST['profession'];
  $address = $_POST['address'];
  $objective = $_POST['objective'];

  // image name create
  $image = $_FILES['image'];
  // echo print_r($image); exit();
  $imageName = $name. '_' .time(). '_' .rand(10000000,100000000). '.' .pathinfo($image['name'], PATHINFO_EXTENSION);
  $pathName ='upload/cv/'.$imageName;

  if($image['size'] > 1){
    // image upload
    move_uploaded_file($image['tmp_name'], $pathName);
    $insert = "INSERT INTO basic_info(user_id, name, email, phone, profession, address, objective, image) VALUES('$user_id', '$name', '$email', '$phone', '$profession', '$address', '$objective', '$imageName')";
    
    if (mysqli_query($connect, $insert)) {
      echo '<div class="alert alert-success"><strong>Success!</strong> Info save success. </div>';
      header("Refresh: 2;");
    } else {
      echo '<div class="alert alert-danger"><strong>Error!</strong> Info save failed. </div>';
    }
  }else{
    echo '<div class="alert alert-warning"><strong>Error!</strong> Please enter your image. </div>';
  }
}
?>

<style>
  label {
    font-size: 11px;
    font-weight: 600;
  }

  .form-control {
    width: 100%;
    height: 30px;
    font-size: 12px;
    border-radius: 0px;
  }

  .form-group {
    margin-bottom: 10px;
  }
</style>

<div class="col-md-12">
  <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="col-md-9 heading_title">
          Basic Information
        </div>
        <div class="col-md-3 text-right">
          <a href="experience.php" class="btn btn-sm btn btn-primary">Next <i class="fa fa-arrow-right"></i></a>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-6" style="padding-right: 30px; padding-left: 30px;">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" name="name" placeholder="Name">
            </div>

            <div class="form-group">
              <label for="">Email</label>
              <input type="email" class="form-control" name="email" placeholder="Email">
            </div>

            <div class="form-group">
              <label for="">Phone</label>
              <input type="number" class="form-control" name="phone" placeholder="Phone">
            </div>

            <div class="form-group">
              <label for="">Objective</label>
              <textarea id="objective" name="objective" rows="3" cols="50" class="form-control"></textarea>
            </div>
          </div>
          
          <div class="col-md-6" style="padding-right: 30px; padding-left: 30px;">
            <div class="form-group">
              <label for="">Profession</label>
              <input type="text" class="form-control" name="profession" placeholder="Profession">
            </div>
            
            <div class="form-group">
              <label for="">Address</label>
                <textarea id="address" name="address" rows="2" cols="50" class="form-control"></textarea>
            </div>

            <div class="form-group">
              <label for="">Image</label>
                <input type="file" name="image" id="image">
                <div style="padding-top: 10px;">
                  <img id="showImage" src="" style="height: 80px; width: 80px; border: 1px solid black">
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel-footer text-center">
        <button class="btn btn-sm btn-success">Save</button>
      </div>
    </div>
  </form>
</div>

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