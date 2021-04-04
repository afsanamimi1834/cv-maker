<?php
require_once('functions/function.php');
needLogged();
get_header();
get_sidebar();
?>

<?php 
  if($_SESSION['role'] == '2'){
?>
<div class="col-md-12">
    Welcome to <strong><?= $_SESSION['name'] ?></strong> dashboard.
</div>
<?php } ?>


<?php 
  if($_SESSION['role'] == '1'){
?>
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6" style="background-color: darkgrey;
      margin-left: 35px; border-radius: 2%;">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div style="font-size: 50px; color:green;">
                <i class="fa fa-users fa-10x"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers" style="margin-top: 13px;">
                <p class="card-category" style="font-size: 20px; font-weight:bold; color:white;">Total Users</p>
                <?php
                $users = "select count(*) FROM user";
                $query = mysqli_query($connect, $users);
                $row = mysqli_fetch_array($query);
                $total = $row[0];
              //   echo $total; exit();
                ?>
                <p class="card-title" style="font-size: 16px; font-weight: bold; color:white;"><?= $total ?><p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <!-- <div class="stats">
            <i class="fa fa-refresh"></i>
            Update Now
          </div> -->
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<?php
get_footer();
?>