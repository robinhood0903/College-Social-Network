<?php
require('login/db.php');
include("login/auth.php");

?>



<?php
  if (isset($_REQUEST['button'])){
	$club_name= stripslashes($_REQUEST['button']);
	$club_name = mysqli_real_escape_string($con,$club_name);
  $qry = "SELECT * from club WHERE club_name = '$club_name'";
  $result = mysqli_query($con,$qry);
  if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$club_name = $row["club_name"];
      $_SESSION['club_name'] = $club_name;
			$about_me=$row["about_me"];
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<style>
	/* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}

    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;}
    }
	</style>
  </head>
  <body>

	<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h1><?php echo $club_name ;?></h1><br><br>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="home.php">Home</a></li>
        <li><a href="member_list2.php">MEMBER LIST</a></li>


      </ul><br><br>

    </div>

    <div class="col-sm-9">
	<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
       <u><h1 align="center">Create Post !</h1></u><br>
      <form action="create_post2.php" method="post">
        <textarea name="post" rows="3" cols="130"></textarea>
        <input type="submit" class="btn btn-success" name="button" value="post it"/>

      </form>
  </body>
</html>
<hr>
      <?php
  $qry = "SELECT * from post WHERE post_type='specific' and post_group='$club_name'";
  $result = mysqli_query($con,$qry);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          echo '<h4>new post</h4>';
      echo  $row['created_by']."<br/>";
      echo $row['content']."<br/>";

      echo $row['Pub_date']."<br/>";
      echo '<form action="comment.php" method="POST">
      <input type="hidden" name="post_id" value= '.$row['post_id'].'>
      <input type="text" name="comment_content"/>
      <input type="submit"  class="btn btn-success"  name="comment" value="comment"/>
        <input type="submit"  class="btn btn-warning" name="commentid" value="viewcomment"/>
      </form>';
	        echo $row['uplikes']."<br/>";
      echo $row['dislikes']."<br/>";
    }
    }
    ?>
    </div>
  </div>
</div>



  </body>
</html>
<?php
  $qry = "SELECT * from post WHERE post_type='specific' and post_group='$club_name'";
  $result = mysqli_query($con,$qry);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          echo '<h4>new post</h4>';
      echo  $row['created_by']."<br/>";
      echo $row['content']."<br/>";
      echo $row['uplikes']."<br/>";
      echo $row['dislikes']."<br/>";
      echo $row['Pub_date']."<br/>";
      echo '<form action="comment.php" method="POST">
      <input type="hidden" name="post_id" value= '.$row['post_id'].'>
      <input type="text" name="comment_content"/>
      <input type="submit" name="comment" value="comment"/>
        <input type="submit" name="comment" value="viewcomment"/>
      </form>';
    }
    }
    ?>
