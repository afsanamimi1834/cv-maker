<?php
	require_once('functions/function.php');
	needLogged();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>Resume</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" /> 
	<link rel="stylesheet" type="text/css" href="css/resume.css" media="all" />
</head>

<body>
<div id="doc2" class="yui-t7">
	<div id="inner">
		<div id="hd">
			<div class="yui-gc">
				<div class="yui-u first">
				<?php
					$u_id = $_SESSION['id'];
					$basic_info = "SELECT * FROM basic_info WHERE user_id = '$u_id' ORDER BY id DESC LIMIT 1";
					$query = mysqli_query($connect, $basic_info);
					$basic = mysqli_fetch_assoc($query);
					// echo print_r($basic); exit();
				?>
					<h1 style="font-size: 26px;"><?= $basic['name']?></h1>
					<h2 style="font-size: 14px;"><?= $basic['profession']?></h2>
					<h3 style="font-size: 12px;"><?= $basic['email']?></h3>
					<h3 style="font-size: 12px;"><?= $basic['phone']?></h3>
					<h3 style="font-size: 12px;"><?= $basic['address']?></h3>
				</div>
				<div class="yui-u">
					<div class="contact-info">
					<?php if($basic['image'] == true){ ?>
						<img style="border: 2px solid #ccc; margin-left: 145px;" width="100px" src="upload/cv/<?= $basic['image'] ?>" alt="user_image">
					<?php }else{ ?>
						<img width="50px" src="images/avatar.png" alt="user_image">
                	<?php } ?>
					</div><!--// .contact-info -->
				</div>
			</div><!--// .yui-gc -->
		</div><!--// hd -->

		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">
					<div class="yui-gf">
						<div class="yui-u first">
							<h2 style="font-size: 14px;">Objective</h2>
						</div>
						<div class="yui-u">
							<p style="font-size: 12px;">
								<?= $basic['objective']?>
							</p>
						</div>
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						<div class="yui-u first">
							<h2 style="font-size: 14px;">Skills</h2>
						</div>
						<div class="yui-u">
								<?php
									$skills = "SELECT * FROM skill WHERE user_id = '$u_id' ORDER BY id DESC LIMIT 1";
									$query = mysqli_query($connect, $skills);
									$skill = mysqli_fetch_assoc($query);
									// echo print_r($skill); exit();
								?>
								<p>
									<?= $skill['skill'] ?>
								</p>
						</div>
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						<div class="yui-u first">
							<h2 style="font-size: 14px;">Experience</h2>
						</div><!--// .yui-u -->
						<div class="yui-u">
							<?php
								$experiences = "SELECT * FROM experience WHERE user_id = '$u_id' ORDER BY id DESC";
								$query = mysqli_query($connect, $experiences);
								// echo print_r($query); exit();

								while($experience = mysqli_fetch_assoc($query)){
							?>	
							
							<div class="job">
								<h2 style="font-size: 14px;"> <strong><?= $experience['name'] ?></strong></h2>
								<h3 style="font-size: 12px;"><?= $experience['title'] ?></h3>
								<h4 style="font-size: 12px;"><?= $experience['start_date'] ?>- <?= $experience['end_date'] ?></h4>
								<p style="font-size: 11px;"><?= $experience['details'] ?></p>
							</div>

							<?php
								}
							?>		

						</div><!--// .yui-u -->
					</div><!--// .yui-gf -->


					<div class="yui-gf">
						<div class="yui-u first">
							<h2 style="font-size: 14px;">Project</h2>
						</div><!--// .yui-u -->
						<div class="yui-u">
							<?php
								$projects = "SELECT * FROM project WHERE user_id = '$u_id' ORDER BY id DESC";
								$query = mysqli_query($connect, $projects);
								// echo print_r($query); exit();

								while($project = mysqli_fetch_assoc($query)){
							?>
							<div class="job">
								<h2 style="font-size: 14px;"><strong><?= $project['name'] ?></strong></h2>
								<p style="font-size: 12px;"><?= $project['details'] ?></p>
							</div>
							<?php
								}
							?>
						</div><!--// .yui-u -->
					</div><!--// .yui-gf -->


					<!-- <div class="yui-gf">
						<div class="yui-u first">
							<h2>Education</h2>
						</div>

						<div class="yui-u">
							<div>
								<div>
									<h2>Indiana University - Bloomington, Indiana</h2>
									<h3>Dual Major, Economics and English &mdash; <strong>4.0 GPA</strong> </h3>
								</div>
							</div>
						</div>
					</div> -->


					<div class="yui-gf last">
						<div class="yui-u first">
							<h2 style="font-size: 14px;">Important Link</h2>
						</div>
						<div class="yui-u">
						<?php
							$links = "SELECT * FROM link WHERE user_id = '$u_id' ORDER BY id DESC LIMIT 1";
							$query = mysqli_query($connect, $links);
							$link = mysqli_fetch_assoc($query);
							// echo print_r($link); exit();
						?>
							<h3 style="font-size: 12px;"><?= $link['github'] ?></h3><br>
							<h3 style="font-size: 12px;"><?= $link['linkedin'] ?></h3><br>
							<h3 style="font-size: 12px;"><?= $link['stack_overflow'] ?></h3><br>
							<h3 style="font-size: 12px;"><?= $link['facebook'] ?></h3>
						</div>
					</div><!--// .yui-gf -->

				</div><!--// .yui-b -->
			</div><!--// yui-main -->
			
			<h3><a id='pdf' href="cv_pdf.php" style="margin-left: 210px;">Download PDF</a></h3>
			<h3><a id='pdf' href="all_cv_info.php" style="margin-left: 33px;">Edit CV</a></h3>
		</div><!--// bd -->
	</div><!-- // inner -->
</div><!--// doc -->
</body>
</html>

