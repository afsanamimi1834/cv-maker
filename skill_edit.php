<?php
require_once('functions/function.php');
needLogged();
get_header();
get_sidebar();

$id = $_GET['id'];
$user = "SELECT * FROM skill WHERE id = '$id'";
$query = mysqli_query($connect, $user);
$data = mysqli_fetch_assoc($query);

if(!empty($_POST)){
  // $uid = $_POST['uid'];
  $user_id = $_SESSION['id'];
  $skill = $_POST['skill'];

  if (!empty($skill)) {
    $update = "UPDATE skill SET user_id='$user_id', skill='$skill' WHERE id='$id'";
    
    if (mysqli_query($connect, $update)) {
      echo '<div class="alert alert-success"><strong>Success!</strong> Info update success. </div>';
      header("Refresh: 2;");
    } else {
      echo '<div class="alert alert-danger"><strong>Error!</strong> Info update failed. </div>';
    }
    
  } else {
    echo '<div class="alert alert-warning"><strong>Error!</strong> Please enter your skill. </div>';
  }
}
?>

<div class="col-md-12">
  <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="col-md-9 heading_title">
          Edit Skill
        </div>
        <div class="col-md-3 text-right">
          <a href="all_cv_info.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All Skill</a>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-body">

        <div class="form-group">
          <label for="" class="col-sm-3 control-label">Technical Skills</label>
          <div class="col-sm-8">
            <textarea id="body" name="skill" rows="2" cols="50" class="form-control"><?= $data['skill'] ?></textarea>
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