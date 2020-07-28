

<?php
require('login/db.php');
include("login/auth.php");
?>
<?php

if (isset($_REQUEST['button'])){

    $club_name = $_SESSION['club_name'];
  $qry = "SELECT email from users WHERE club_name = '$club_name'";
  $result = mysqli_query($con,$qry);
  if ($result->num_rows > 0)
  {

  $pub_date = date("Y-m-d H:i:s");
  $created_by = $_SESSION['user_email'];
  $created_by = mysqli_real_escape_string($con,$created_by);
  $post_type = "specific";
  $post_group = $club_name;
  $content = stripslashes($_REQUEST['post']);
	$content = mysqli_real_escape_string($con,$content);
  $query = "INSERT into post(created_by,Pub_date,post_type,post_group,content)
VALUES ('$created_by','$pub_date','$post_type','$post_group','$content')";
        $result = mysqli_query($con,$query);

        if($result){   ?>
    <script>
	alert("Posted Successfully !");

	</script>
<?php
			}
    }else{
      echo "You are not allowed to post";
      	}
}
?>
