<html>
<head></head>
<body>

<form method="post" action="index1.php" enctype="multipart/form-data">
<input type="file" name="img1" required="required"/>
<input type="submit" name="submit" value="upload"/>
</form>

</body>
</html>

<?php

  if(isset($_POST['submit'])){
	  $imagename = $_FILES['img1']['name'];
	  $tempimgname = $_FILES['img1']['tmp_name'];
	  
	  $conn = mysqli_connect('localhost','root','','college_network') or die(mysql_error());
	  
	  move_uploaded_file($tempimgname,"images$imagename");
	  
	  $sql = "INSERT INTO `users`(`images`) VALUES ('$imagename')";
	  $run = mysqli_query($conn,$sql);
	  if($run == true){
		  
	   echo "upload";
	  }
  }
  ?>