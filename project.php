<?php
require_once('functions/function.php');
needLogged();
get_header();
get_sidebar();

if (!empty($_POST)) {
  $user_id = $_SESSION['id'];
  $name = $_POST['name'];
  $details = $_POST['details'];
  $link = $_POST['link'];

  if (!empty($name)) {
    $insert = "INSERT INTO project(user_id, name, details, link) VALUES('$user_id', '$name', '$details', '$link')";
    
    if (mysqli_query($connect, $insert)) {
      echo '<div class="alert alert-success"><strong>Success!</strong> Info save success. </div>';
      header("Refresh: 2;");
    } else {
      echo '<div class="alert alert-danger"><strong>Error!</strong> Info save failed. </div>';
    }
    
  } else {
    echo '<div class="alert alert-danger"><strong>Error!</strong> Please enter project name. </div>';
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
          Projects
        </div>
        <div class="col-md-3 text-right">
          <!-- <a href="experience.php" class="btn btn-sm btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a> -->
          <a href="skill.php" class="btn btn-sm btn btn-primary">Next <i class="fa fa-arrow-right"></i></a>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-body">
          <div class="col-md-12" style="padding-right: 30px; padding-left: 30px;">
            <div class="form-group">
              <label for="">Project Name</label>
              <input type="text" class="form-control" name="name">
            </div>

            <div class="form-group">
              <label for="">Project Details</label>
              <textarea id="details" name="details" rows="3" cols="50" class="form-control"></textarea>
            </div>

            <div class="form-group">
              <label for="">Project Link</label>
              <input type="text" class="form-control" name="link">
            </div>
          </div>

      </div>
      <div class="panel-footer text-center">
        <button class="btn btn-sm btn-success">Save</button>
      </div>
    </div>
  </form>
</div>
<!--col-md-12 end-->

<?php
get_footer();
?>