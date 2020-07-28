
<?php
require('login/db.php');
include("login/auth.php");
?>

<?php

if (isset($_REQUEST['comment'])){

  $date = date("Y-m-d H:i:s");
  $commented_by = $_SESSION['user_email'];
  $comment_content = stripslashes($_REQUEST['comment_content']);
	$comment_content = mysqli_real_escape_string($con,$comment_content);
  $post_id = stripslashes($_REQUEST['post_id']);
	$post_id = mysqli_real_escape_string($con,$post_id);
  $query = "INSERT into comment(post_id,comment,commented_by,comment_date)
VALUES ('$post_id','$comment_content','$commented_by','$date')";
        $result = mysqli_query($con,$query);
        if($result){
        echo  "";

			}
    }
    else{
      echo "";
      	}
?>
<?php


$qry = "SELECT * from comment WHERE post_id=$_REQUEST[post_id]";
  $result = mysqli_query($con,$qry);
  
  if ($result->num_rows > 0) {

      while($row = $result->fetch_assoc()) {
          echo '<h4><b>comment</b></h4>';

      echo  $row['commented_by']."<br/>";
      echo $row['comment']."<br/>";
      echo $row['comment_date']."<br/>";
    }
  }
      ?>
	  
		  