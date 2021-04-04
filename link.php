<?php
require_once('functions/function.php');
needLogged();
get_header();
get_sidebar();

if (!empty($_POST)) {
  $user_id = $_SESSION['id'];
  $github = $_POST['github'];
  $linkedin = $_POST['linkedin'];
  $stack_overflow = $_POST['stack_overflow'];
  $facebook = $_POST['facebook'];
  
  $insert = "INSERT INTO link(user_id, github, linkedin, stack_overflow, facebook) VALUES('$user_id', '$github', '$linkedin', '$stack_overflow', '$facebook')";
  
  if (mysqli_query($connect, $insert)) {
    echo '<div class="alert alert-success"><strong>Success!</strong> Info save success. </div>';
    header("Refresh: 2;");
  } else {
    echo '<div class="alert alert-danger"><strong>Error!</strong> Info save failed. </div>';
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
          Importent Links
        </div>
        <div class="col-md-3 text-right">
          <!-- <a href="skill.php" class="btn btn-sm btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a> -->
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-body">
        <div class="row">
            <div class="col-md-6" style="padding-right: 30px; padding-left: 30px;">
              <div class="form-group">
                <label for="">GitHub Link</label>
                <input type="text" class="form-control" name="github" placeholder="GitHub Link">
              </div>

              <div class="form-group">
                <label for="">LinkedIn Link</label>
                <input type="text" class="form-control" name="linkedin" placeholder="LinkedIn Link">
              </div>
            </div>

            <div class="col-md-6" style="padding-right: 30px; padding-left: 30px;">
              <div class="form-group">
                <label for="">Stack Overflow Link</label>
                <input type="text" class="form-control" name="stack_overflow" placeholder="Stack Overflow Link">
              </div>

              <div class="form-group">
                <label for="">Facebook Link</label>
                <input type="text" class="form-control" name="facebook" placeholder="Facebook Link">
              </div>
            </div>
        </div>
        <!-- <div class="col-md-6">
          <div class="form-group col-md-12">
            <label for="">Site Name</label>
            <select class="form-control" id="" name="name">
              <option>Select Site</option>
              <option value="GitHub">GitHub</option>
              <option value="LinkedIn">LinkedIn</option>
              <option value="Stack Overflow">Stack Overflow</option>
            </select>
          </div>                    
        </div> -->

      </div>
      <div class="panel-footer text-center">
        <button class="btn btn-sm btn-success">Save</button>
        <!-- <button class="btn btn-sm btn-primary">Create CV</button> -->
        <a href="cv.php" class="btn btn-sm btn-primary">Create CV</a>
      </div>
    </div>
  </form>
</div>
<!--col-md-12 end-->

<?php
get_footer();
?>