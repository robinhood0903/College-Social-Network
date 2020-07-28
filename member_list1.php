<?php
require('login/db.php');
include("login/auth.php");
?>




    <?php
  $user_email = $_SESSION['user_email'];
  $friends_sql = mysqli_query($con,"SELECT * FROM users WHERE (email <> '$user_email') ");
  if ($friends_sql->num_rows > 0) {
  while($friend_row = $friends_sql->fetch_assoc()){

    echo '<form action="profile1.php" method="post"><center><input  id="rcorners1" type="submit" name="button" class="btn btn-primary" value='.$friend_row['name'] .'></center></form>';

	echo '<br>';
  }
  }


?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<style>
body{
	background-color:skyblue;
}
#rcorners1{
	margin-top:50px;
	margin-left:150px;
	border-radius:25px;
	width:350px;
	height:70px;
}
</style>
</head>
<body>
  <nav class="navbar navbar-custom container-fluid navbar-fixed-top">
      <div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

              
              <ul class="nav navbar-nav navbar-right">

              <li ><a href="login/kiet_home.php">
                    <span></span>Logout</a></li>


                          </ul>


          </div>



</body>
</html>
