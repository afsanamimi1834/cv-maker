<?php
require_once('functions/function.php');
needLogged();
get_header();
get_sidebar();

$id = $_GET['id'];
$user = "SELECT * FROM basic_info WHERE id = '$id'";
$query = mysqli_query($connect, $user);
$data = mysqli_fetch_assoc($query);

if(!empty($_POST)){
  // $uid = $_POST['uid'];
  $user_id = $_SESSION['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $profession = $_POST['profession'];
  $address = $_POST['address'];
  $objective = $_POST['objective'];

  // image name create
  $image = $_FILES['image'];
  $imageName = $name. '_' .time(). '_' .rand(10000000,100000000). '.' .pathinfo($image['name'], PATHINFO_EXTENSION);
  $pathName ='upload/cv/'.$imageName;

  // Image update
  if($image['size'] > 1){
    if(file_exists("upload/cv/".$data['image']) && !empty($data['image'])){
      unlink("upload/cv/".$data['image']);
    }
    move_uploaded_file($image['tmp_name'], $pathName);
    $update = "UPDATE basic_info SET user_id='$user_id', name='$name', email='$email', phone='$phone', profession='$profession', address='$address', objective='$objective', image='$imageName' WHERE id='$id'";
  }else{ 
    $update = "UPDATE basic_info SET user_id='$user_id', name='$name', email='$email', phone='$phone', profession='$profession', address='$address', objective='$objective' WHERE id='$id'";
  }

  if(mysqli_query($connect, $update)){
    echo '<div class="alert alert-success"><strong>Success!</strong> Basic information update success. </div>';
    header("Refresh: 2;");
  }else{
    echo '<div class="alert alert-danger"><strong>Error!</strong> Basic information failed. </div>';
  }
}
?>

<div class="col-md-12">
  <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="col-md-9 heading_title">
          Edit Basic Information
        </div>
        <div class="col-md-3 text-right">
          <a href="all_cv_info.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All Basic Info</a>
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
          <label for="" class="col-sm-3 control-label">Profession</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="profession" value="<?= $data['profession'] ?>">
          </div>
        </div>
        
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Address</label>
          <div class="col-sm-8">
            <textarea id="address" name="address" rows="2" cols="50" class="form-control"><?= $data['address'] ?></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Objective</label>
          <div class="col-sm-8">
            <textarea id="objective" name="objective" rows="3" cols="50" class="form-control"><?= $data['objective'] ?></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Image</label>
          <div class="col-sm-8">
            <input type="file" name="image" id="image">
            <div style="padding-top: 10px;">
              <?php if($data['image'] == true){ ?>
                <img id="showImage" src="upload/cv/<?= $data['image'] ?>" style="height: 100px; width: 100px; border: 1px solid black">
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