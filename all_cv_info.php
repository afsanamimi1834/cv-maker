<?php
require_once('functions/function.php');
needLogged();
get_header();
get_sidebar();
?>

<div class="col-md-12">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <div class="col-md-9 heading_title">
        Basic Information
      </div>
      <div class="col-md-3 text-right">
        <!-- <a href="basic_info.php" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> Add Basic Info</a> -->
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="panel-body">
      <table class="table table-responsive table-striped table-hover table_cus">
        <thead class="table_head">
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Profession</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $user_id = $_SESSION['id'];
            $basics = "SELECT * FROM basic_info WHERE user_id = '$user_id' ORDER BY id DESC";
            $query = mysqli_query($connect, $basics);
            while ($data = mysqli_fetch_assoc($query)) {
          ?>
            <tr>
              <td><?= $data['name'] ?></td>
              <td><?= $data['email'] ?></td>
              <td><?= $data['phone'] ?></td>
              <td><?= $data['profession'] ?></td>
              <td>
                <?php if($data['image'] == true){ ?>
                <img width="50px" src="upload/cv/<?= $data['image'] ?>" alt="user_image">
                <?php }else{ ?>
                <img width="50px" src="images/avatar.png" alt="user_image">
                <?php } ?>
              </td>
              <td>
                <a href="basic_info_view.php?id=<?= $data['id'] ?>"><i class="fa fa-plus-square fa-lg"></i></a>
                <a href="basic_info_edit.php?id=<?= $data['id'] ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                <a href="basic_info_delete.php?id=<?= $data['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash fa-lg"></i></a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--col-md-12 end-->

<div class="col-md-12">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <div class="col-md-9 heading_title">
        Experience
      </div>
      <div class="col-md-3 text-right">
        <!-- <a href="basic_info.php" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> Add Experience</a> -->
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="panel-body">
      <table class="table table-responsive table-striped table-hover table_cus">
        <thead class="table_head">
          <tr>
            <th>Institution Name</th>
            <th>Job Title</th>
            <th>Job Details</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $user_id = $_SESSION['id'];
            $experiences = "SELECT * FROM experience WHERE user_id = '$user_id' ORDER BY id DESC";
            $query_experience = mysqli_query($connect, $experiences);
            while ($datas = mysqli_fetch_assoc($query_experience)) {
          ?>
            <tr>
              <td><?= $datas['name'] ?></td>
              <td><?= $datas['title'] ?></td>
              <td><?= $datas['details'] ?></td>
              <td><?= $datas['start_date'] ?></td>
              <td><?= $datas['end_date'] ?></td>
              
              <td>
                <!-- <a href="experience_view.php?id=<?= $datas['id'] ?>"><i class="fa fa-plus-square fa-lg"></i></a> -->
                <a href="experience_edit.php?id=<?= $datas['id'] ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                <a href="experience_delete.php?id=<?= $datas['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash fa-lg"></i></a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--col-md-12 end-->

<div class="col-md-12">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <div class="col-md-9 heading_title">
        Project
      </div>
      <div class="col-md-3 text-right">
        <!-- <a href="basic_info.php" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> Add Experience</a> -->
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="panel-body">
      <table class="table table-responsive table-striped table-hover table_cus">
        <thead class="table_head">
          <tr>
            <th>Name</th>
            <th>Details</th>
            <th>Link</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $user_id = $_SESSION['id'];
            $projects = "SELECT * FROM project WHERE user_id = '$user_id' ORDER BY id DESC";
            $query_project = mysqli_query($connect, $projects);
            while ($pro = mysqli_fetch_assoc($query_project)) {
          ?>
            <tr>
              <td><?= $pro['name'] ?></td>
              <td><?= $pro['details'] ?></td>
              <td><?= $pro['link'] ?></td>
              
              <td>
                <!-- <a href="project_view.php?id=<?= $pro['id'] ?>"><i class="fa fa-plus-square fa-lg"></i></a> -->
                <a href="project_edit.php?id=<?= $pro['id'] ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                <a href="project_delete.php?id=<?= $pro['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash fa-lg"></i></a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--col-md-12 end-->

<div class="row">
  <div class="col-md-6">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="col-md-9 heading_title">
            Skill
          </div>
          <div class="col-md-3 text-right">
            <!-- <a href="basic_info.php" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> Add Experience</a> -->
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="panel-body">
          <table class="table table-responsive table-striped table-hover table_cus">
            <thead class="table_head">
              <tr>
                <th>Skill</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $user_id = $_SESSION['id'];
                $skills = "SELECT * FROM skill WHERE user_id = '$user_id' ORDER BY id DESC";
                $query_skill = mysqli_query($connect, $skills);
                while ($skill = mysqli_fetch_assoc($query_skill)) {
              ?>
                <tr>
                  <td><?= $skill['skill'] ?></td>
                  <td>
                    <!-- <a href="skill_view.php?id=<?= $skill['id'] ?>"><i class="fa fa-plus-square fa-lg"></i></a> -->
                    <a href="skill_edit.php?id=<?= $skill['id'] ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                    <a href="skill_delete.php?id=<?= $skill['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash fa-lg"></i></a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  <!--col-md-12 end-->
  </div>

  <div class="col-md-6">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="col-md-9 heading_title">
            Link
          </div>
          <div class="col-md-3 text-right">
            <!-- <a href="basic_info.php" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> Add Experience</a> -->
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="panel-body">
          <table class="table table-responsive table-striped table-hover table_cus">
            <thead class="table_head">
              <tr>
                <th>GitHub</th>
                <th>LinkedIn</th>
                <th>Stack Overflow</th>
                <th>Facebook</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $user_id = $_SESSION['id'];
                $links = "SELECT * FROM link WHERE user_id = '$user_id' ORDER BY id DESC";
                $query_link = mysqli_query($connect, $links);
                while ($link = mysqli_fetch_assoc($query_link)) {
              ?>
                <tr>
                  <td><?= $link['github'] ?></td>
                  <td><?= $link['linkedin'] ?></td>
                  <td><?= $link['stack_overflow'] ?></td>
                  <td><?= $link['facebook'] ?></td>
                  
                  <td>
                    <!-- <a href="link_view.php?id=<?= $link['id'] ?>"><i class="fa fa-plus-square fa-lg"></i></a> -->
                    <a href="link_edit.php?id=<?= $link['id'] ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                    <a href="link_delete.php?id=<?= $link['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash fa-lg"></i></a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  <!--col-md-12 end-->
  </div>
</div>

<div class="text-center">
  <a href="cv.php"  class="btn btn-primary btn-sm btn-block">Create CV</a> <br>
</div>

<?php
get_footer();
?>