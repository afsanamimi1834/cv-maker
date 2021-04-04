<?php
require_once('functions/function.php');
needLogged();
get_header();
get_sidebar();

if (!empty($_POST)) {
  $user_id = $_SESSION['id'];
  $name = $_POST['name'];
  $title = $_POST['title'];
  $details = $_POST['details'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  $location = $_POST['location'];

  if (!empty($name)) {
    $insert = "INSERT INTO experience(user_id, name, title, details, start_date, end_date, location) VALUES('$user_id', '$name', '$title', '$details', '$start_date', '$end_date', '$location')";
    
    if (mysqli_query($connect, $insert)) {
      echo '<div class="alert alert-success"><strong>Success!</strong> Info save success. </div>';
      header("Refresh: 2;");
    } else {
      echo '<div class="alert alert-danger"><strong>Error!</strong> Info save failed. </div>';
    }
    
  } else {
    echo '<div class="alert alert-warning"><strong>Error!</strong> Please enter institution name. </div>';
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
          Job Experience
        </div>
        <div class="col-md-3 text-right">
          <!-- <a href="basic_info.php" class="btn btn-sm btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a> -->
          <a href="project.php" class="btn btn-sm btn btn-primary">Next <i class="fa fa-arrow-right"></i></a>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-6" style="padding-right: 30px; padding-left: 30px;">
            <div class="form-group">
              <label for="">Institution Name</label>
              <input type="text" class="form-control" name="name" placeholder="Institution Name">
            </div>

            <div class="form-group">
              <label for="">Job Title</label>
              <input type="text" class="form-control" name="title" placeholder="Job Title">
            </div>

            <div class="form-group">
              <label for="">Job Details</label>
              <textarea class="form-control" id="details" name="details" rows="4"></textarea>
            </div> 
          </div>

          <div class="col-md-6" style="padding-right: 30px; padding-left: 30px;">
            <div class="form-group">
              <label for="">Start Date</label>
              <input type="text" class="form-control" name="start_date" placeholder="Start Date">
              <small id="emailHelp" class="form-text text-muted">Ex: Jan 2005</small>
            </div>

            <div class="form-group">
              <label for="">End Date</label>
              <input type="text" class="form-control" name="end_date" placeholder="End Date">
              <small id="emailHelp" class="form-text text-muted">Ex: Jan 2009, or Present</small>
            </div>

            <div class="form-group">
              <label for="">Job Location</label>
              <input type="text" class="form-control" name="location" placeholder="Job Location">
              <small id="emailHelp" class="form-text text-muted">Ex: Dhaka, Bangladesh</small>
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
<!--col-md-12 end-->

<?php
get_footer();
?>