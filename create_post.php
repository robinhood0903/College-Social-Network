


<?php
require('login/db.php');
include("login/auth.php");
?>
<?php

if (isset($_REQUEST['button'])){
  $pub_date = date("Y-m-d h:i:s");
  $created_by = $_SESSION['user_email'];
  $created_by = mysqli_real_escape_string($con,$created_by);
  $post_type = "general";
  $post_group = "na";
  $content = stripslashes($_REQUEST['post']);
	$content = mysqli_real_escape_string($con,$content);
  $query = "INSERT into post(created_by,Pub_date,post_type,post_group,content)
VALUES ('$created_by','$pub_date','$post_type','$post_group','$content')";
        $result = mysqli_query($con,$query);

        if($result){ ?>
    <script>
	alert("Posted Successfully !");
	window.open('home.php','_self');
	</script>
<?php
			}
    }else{
      echo "";
      	}
?>
