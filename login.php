<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['user_email'])){
        // removes backslashes
	$user_email = stripslashes($_REQUEST['user_email']);
        //escapes special characters in a string
	$user_email = mysqli_real_escape_string($con,$user_email);
	$user_password = stripslashes($_REQUEST['user_password']);
	$user_password = mysqli_real_escape_string($con,$user_password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE email='$user_email'
					and password='".($user_password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	       $_SESSION['user_email'] = $user_email;
		     header("Location: ../home.php");
         }else{
	echo "
				<div class='modal fade' id='myModal'>
				<div class='modal-dialog'>
				<div class='modal-content'>

				<!-- Modal Header -->
				<div class='modal-header'>
				<h4 class='modal-title'>Notification</h4>
				<button type='button' class='close' data-dismiss='modal'>&times;</button>
				</div>

				<!-- Modal body -->
				<div class='modal-body'>
				Username/password is incorrect.
				Click here to <a href='login.php'>Login</a>
				</div>

				<!-- Modal footer -->
				<div class='modal-footer'>
				<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
				</div>

				</div>
				</div>
				</div>
				";
	}
    }else{
	}
?>




<html>
   <head>
     <title>Log In</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
   <style media="screen">
   body { padding-top:100px;
        padding-left: 500px;
				background-size: cover;

           }
 .form-control { margin-bottom: 10px; }
 .navbar-custom{
   background-color:#b4bec6;
 }


   </style>
   <body background="317347.jpg">
          <div class="container">

      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-4 well well-sm">

              <legend> Log In!</legend>
              <form action="" method="post" class="form" role="form" name="login">


              <input class="form-control" name="user_email" placeholder="Email" type="email"
                          required autofocus />



              <input class="form-control" name="user_password" placeholder="Password" type="password" />

             <br />
             <br />
             <button class="btn btn-lg btn-primary btn-block" type="submit">
                 Log In</button>
             </form>

       </div>
     </div>
   </body>





	<script type='text/javascript'>
				$(window).on('load',function(){
				$('#myModal').modal('show');
			});
	</script>
		<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

</html>
