<?php
require('login/db.php');
include("login/auth.php");
?>
<?php

  $club_name = $_SESSION['club_name'];
  $q = 	"SELECT * FROM users WHERE club_name
									= '$club_name'";
	$rs = mysqli_query($con,$q);
							if (mysqli_num_rows($rs) > 0) {
								while($row = mysqli_fetch_array($rs,true) )
								{
                  echo '<form action="profile2.php" method ="post">
                   <input type="hidden" name="button" value= '.$row["email"].' ></br>
                   <input id="rcorners1" type="submit" name="username" class="btn btn-primary" value= '.$row["name"].' ></br>
                   </form>';

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
<body
