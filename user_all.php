<?php
require_once('functions/function.php');
needLogged();

if($_SESSION['role'] == '1'){

get_header();
get_sidebar();

$users = "SELECT * FROM user NATURAL JOIN role ORDER BY id DESC";
$query = mysqli_query($connect, $users);
?>

<div class="col-md-12">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <div class="col-md-9 heading_title">
        All User Information
      </div>
      <div class="col-md-3 text-right">
        <a href="user_add.php" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> Add User</a>
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
            <th>User Role</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            while ($data = mysqli_fetch_assoc($query)) {
          ?>
            <tr>
              <td><?= $data['name'] ?></td>
              <td><?= $data['email'] ?></td>
              <td><?= $data['phone'] ?></td>
              <td><?= $data['role_name'] ?></td>
              <td>
                <?php if($data['image'] == true){ ?>
                <img width="50px" src="upload/user/<?= $data['image'] ?>" alt="user_image">
                <?php }else{ ?>
                <img width="50px" src="images/avatar.png" alt="user_image">
                <?php } ?>
              </td>
              <td>
                <a href="user_view.php?id=<?= $data['id'] ?>"><i class="fa fa-plus-square fa-lg"></i></a>
                <a href="user_edit.php?id=<?= $data['id'] ?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                <a href="user_delete.php?id=<?= $data['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash fa-lg"></i></a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
    <!-- <div class="panel-footer">
      <div class="col-md-4">
      </div>
      <div class="col-md-4">
      </div>
      <div class="col-md-4 text-right">
        <nav aria-label="Page navigation">
          <ul class="pagination pagina_cus">
            <li>
              <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
              <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
      <div class="clearfix"></div>
    </div> -->
  </div>
</div>
<!--col-md-12 end-->

<?php
  get_footer();
  }else{
    echo 'Access Denied! You have no permission access this page';
  }
?>