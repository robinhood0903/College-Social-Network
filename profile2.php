
<?php
require('login/db.php');
include("login/auth.php");

?>



<?php
if (isset($_REQUEST['button'])){
	$user_email= stripslashes($_REQUEST['button']);
	$user_email = mysqli_real_escape_string($con,$user_email);
  $qry = "SELECT * from users WHERE email = '$user_email'";
  $result = mysqli_query($con,$qry);
  if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$name = $row["name"];
			$department = $row["department"];
			$phone = $row["phone"];
			$email=$row["email"];
			$position=$row["position"];
			$about_me=$row["about_me"];
		}
	}
}
 $_SESSION['user_name'] = $name;

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<style>
body {
  background: #F1F3FA;
}

/* Profile container */
.profile {
  margin: 40px 0;
}

/* Profile sidebar */
.profile-sidebar {
  padding: 20px 0 10px 0;
  background: #fff;

}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 65%;
  height: 35%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}

.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-content {
  padding: 20px;
  background: #fff;
  min-height: 460px;
}

.col-md-8{
	height:;
}
</style>
<body>
<div class="container">
    <div class="row profile">
		<div class="col-md-4">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="profile.jpg" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo  $name."<br/>"; ?>
					</div>
					<div class="profile-usertitle-job">
						<?php echo  $position."<br/>"; ?>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">

					<button type="button" class="btn btn-primary btn-sm">Message</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class=""></i>
							Department :<?php echo $department."<br/>"; ?></a>
						</li>
						<li class="active">
							<a href="#">
							<i class=""></i>
							 Contact No. :<?php echo $phone."<br/>"; ?></a>
						</li>


					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-8">
            <div class="profile-content">
	<h1>About Me:</h1><br><hr>
	<h4><?php  echo  $about_me."<br/>"; ?></h4>
            </div>
		</div>
	</div>
</div>

<br>
<br>
</body>
</html>
