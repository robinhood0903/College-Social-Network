
<?php
require('login/db.php');
include("login/auth.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <title></title>
    <style media="screen">
	body{
	background-color:skyblue;
}
    #rcorners1{

      margin-top:50px;
      margin-left:150px;
      border-radius:25px;
      width:350px;
      height:120px;
      }
    </style>
  </head>
  <body>




  </body>
</html>

<?php

$friends_sql = mysqli_query($con,"SELECT * FROM club  ");
if ($friends_sql->num_rows > 0) {
while($friend_row = $friends_sql->fetch_assoc()){
  echo '<form action="club2.php" method ="post">
   <center><input id="rcorners1" type="submit" name="button" class="btn btn-primary" value= '.$friend_row["club_name"].' ></center></br>
   </form>';

}
}
 ?>
