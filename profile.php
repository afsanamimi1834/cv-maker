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
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  // image name create
  $image = $_FILES['image'];
  // echo $image['size']; exit();
  $imageName = $name. '_' .time(). '_' .rand(10000000,100000000). '.' .pathinfo($image['name'], PATHINFO_EXTENSION);
  $pathName ='upload/user/'.$imageName;

  // Image update
  if($image['size'] > 1){
    if(file_exists("upload/user/".$_SESSION['image']) && !empty($_SESSION['image'])){
      unlink("upload/user/".$_SESSION['image']);
    }
    move_uploaded_file($image['tmp_name'], $pathName);
    $update = "UPDATE user SET name='$name', email='$email', phone='$phone', image='$imageName' WHERE id = '$id'";
  }else{
    $update = "UPDATE user SET name='$name', email='$email', phone='$phone' WHERE id = '$id'";
  }

  if(mysqli_query($connect, $update)){
    echo '<div class="alert alert-success"><strong>Success!</strong> Profile update success. </div>';
    header("Refresh: 2;");
  }else{
    echo '<div class="alert alert-danger"><strong>Error!</strong> Profile update failed. </div>';
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
          <label for="" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="name" value="<?php if(empty($_SESSION)){echo $_SESSION['name'];
            }else{
              echo $data['name'];
            }
            ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-8">
            <input type="email" class="form-control" name="email" value="<?php if(empty($_SESSION)){echo $_SESSION['email'];
            }else{
              echo $data['email'];
            }
            ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Phone</label>
          <div class="col-sm-8">
            <input type="number" class="form-control" name="phone" value="<?php if(empty($_SESSION)){echo $_SESSION['phone'];
            }else{
              echo $data['phone'];
            }
            ?>">
          </div>
        </div>

        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Image</label>
          <div class="col-sm-8">
            <input type="file" name="image" id="image">
            <div style="padding-top: 10px;">
              <?php if($_SESSION['image'] == true){ ?>
                <img id="showImage" src="upload/user/<?php if(empty($_SESSION)){echo $_SESSION['image'];
            }else{
              echo $data['image'];
            }
            ?>" style="height: 100px; width: 100px; border: 1px solid black">
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