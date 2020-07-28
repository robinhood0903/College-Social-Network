
<?php
require('login/db.php');
include("login/auth.php");
?>

<?php
$profilerec = mysqli_query($con,"SELECT * FROM users WHERE email ='$_SESSION[user_email]'");

while($row = mysqli_fetch_array($profilerec))
  {
$user_id  = $row["user_id"];
$name = $row["name"];
$department = $row["department"];
$phone = $row["phone"];
  }
 $_SESSION['user_name'] = $name;


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
  <style>
  h1,p{
    font-family:'Dancing Script', cursive;

  }

    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar-custom {
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 800px}

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }

    /

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }

	.navbar-custom{
	background-color:skyblue;
	}

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

  <header class="container">
       <h2>Header</h2>
    </header>
    <nav class="navbar navbar-custom container-fluid navbar-fixed-top">
        <div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <form class="navbar-form navbar-left" role="search">
                  <div class="form-group-sm">
                      <div class="input-group">
                          <input type="text"

                          class="form-control" name="search" placeholder="Search">
                          <span class="input-group-btn">
                              <button class="btn btn-success btn-sm"><a href="#">Go!</a></button>
                          </span>
                      </div>
                  </div>

              </form>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="Home.html">

                    <li><a href="check.php">
                    <span class="glyphicon glyphicon-user"></span>
                    <?php echo $_SESSION['user_name'];?>     </a></li>



                </ul>
                <ul class="nav navbar-nav navbar-right">

								<li ><a href="login/kiet_home.php">
                      <span></span>Logout</a></li>


                            </ul>


            </div><!-- /.navbar-collapse -->
			<div class="row">

			</div>
			<div class="row">
			</div>
        </div><!-- /.container-fluid -->
    </nav>

	<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-3 sidenav">

    <h1>Hello <br> <p style="margin-bottom:1.5em"> <?php echo $_SESSION['user_name']; ?> </p></h1>

    <ul class="pager">
    <li><a href="member_list1.php">Members</a></li><br>
    <li><a href="clubs2.php">College Clubs</a></li><br>

    </ul>



	    </div>
    <div class="col-sm-7 text-left">
	<p><b>Write Something...</b></p>
	<form action="create_post.php" method="post">


	<textarea name="post" rows="2" cols="80"></textarea><br>

	<input type="submit" class="btn btn-success" name="button" value="post it"/>
	</form>

	<hr>

	<u><h1>Daily News Feed ! </h1></u><br>
	<?php
      $qry = "SELECT * from post ";
      $result = mysqli_query($con,$qry);
      if ($result->num_rows > 0) {
      		while($row = $result->fetch_assoc()) {
				echo '<b><h4>New Post</b></h4>';
          echo   '<u>'.$row['created_by']."<br/>".'</u>';
          echo  $row['content']."<br/>";
		  echo $row['Pub_date']."<br/>";


          echo '<form action="comment.php" method="POST">
		        <input type="hidden" name="post_id" value='.$row['post_id'].'>
				<input type="text" name="comment_content"/>
		        <input type="submit"  class="btn btn-success" name="comment" value="comment"/>
			    <input type="submit" class="btn btn-warning" name="commentid" value="viewcomment"/>


				</form>';
			 echo $row['uplikes']."<br/>";
          echo $row['dislikes']."<br/>";

      		}


        }
        ?>


	</div>
    <div class="col-sm-2 sidenav">
	<div class="well">
        <p><a href="https://www.kiet.edu/ERP.php">ERP</p>
      </div>
      <div class="well">
        <p><a href="https://www.facebook.com/uptunews/">AKTU UPDATES</p>
		</div>




    </div>
  </div>
</div>

      
  </body>
</html>
