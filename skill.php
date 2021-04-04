<?php
require_once('functions/function.php');
needLogged();
get_header();
get_sidebar();

if (!empty($_POST)) {
  $user_id = $_SESSION['id'];
  $skill = $_POST['skill'];

  if (!empty($skill)) {
    $insert = "INSERT INTO skill(user_id, skill) VALUES('$user_id', '$skill')";
    
    if (mysqli_query($connect, $insert)) {
      echo '<div class="alert alert-success"><strong>Success!</strong> Info save success. </div>';
      header("Refresh: 2;");
    } else {
      echo '<div class="alert alert-danger"><strong>Error!</strong> Info save failed. </div>';
    }
    
  } else {
    echo '<div class="alert alert-danger"><strong>Error!</strong> Please enter your skill. </div>';
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
          Skills
        </div>
        <div class="col-md-3 text-right">
          <!-- <a href="project.php" class="btn btn-sm btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a> -->
          <a href="link.php" class="btn btn-sm btn btn-primary">Next <i class="fa fa-arrow-right"></i></a>
        </div>
        <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="col-md-12" style="padding-right: 30px; padding-left: 30px;">
          <div class="form-group">
            <label for="">Technical Skills</label>
            <textarea id="body" name="skill" class="form-control"></textarea>
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

<script src="https://cdn.tiny.cloud/1/w6m5jeak1s9ebgmjwb7lu887dy232d378jxqcxbhfyv5rdu9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#body',
        plugins: 'print preview paste importcss searchreplace autolink directionality code visualblocks visualchars image link media codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        imagetools_cors_hosts: ['picsum.photos'],
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | preview | insertfile image media link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        image_advtab: true,
        content_css: '//www.tiny.cloud/css/codepen.min.css',
        importcss_append: true,
        height: 300,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_noneditable_class: "mceNonEditable",
        toolbar_mode: 'sliding',
        contextmenu: "link image imagetools table",
    });

    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.dropify').dropify();
    });
</script>