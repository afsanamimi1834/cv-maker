<?php
require_once('functions/function.php');
needLogged();
get_header();
get_sidebar();

$id = $_GET['id'];
$user = "SELECT * FROM project WHERE id = '$id'";
$query = mysqli_query($connect, $user);
$data = mysqli_fetch_assoc($query);

if(!empty($_POST)){
  // $uid = $_POST['uid'];
  $user_id = $_SESSION['id'];
  $name = $_POST['name'];
  $details = $_POST['details'];
  $link = $_POST['link'];

  if (!empty($name)) {
    $update = "UPDATE project SET user_id='$user_id', name='$name', details='$details', link='$link' WHERE id='$id'";
    
    if (mysqli_query($connect, $update)) {
      echo '<div class="alert alert-success"><strong>Success!</strong> Info update success. </div>';
      header("Refresh: 2;");
    } else {
      echo '<div class="alert alert-danger"><strong>Error!</strong> Info update failed. </div>';
    }
    
  } else {
    echo '<div class="alert alert-warning"><strong>Error!</strong> Please enter project name. </div>';
  }
}
?>

<div class="col-md-12">
  <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="col-md-9 heading_title">
          Edit Project
        </div>
        <div class="col-md-3 text-right">
          <a href="all_cv_info.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All Project</a>
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
          <label for="" class="col-sm-3 control-label">Details</label>
          <div class="col-sm-8">
            <textarea id="details" name="details" rows="2" cols="50" class="form-control"><?= $data['details'] ?></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Link</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="link" value="<?= $data['link'] ?>">
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