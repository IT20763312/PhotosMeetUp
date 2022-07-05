<?php
if(isset($_POST['submit']))
{
	$con = mysqli_connect("localhost","root","","photosmeetup");
					if(!$con)
					{
						die("Cannot conect to the database server");
					}
    $email = $_POST['txtEmail'];
	
    $result = mysqli_query($con,"SELECT * FROM tbluser WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
	$fetch_email=$row['email'];
	$email_id=$row['email'];
	$password=$row['password'];
	if($email==$fetch_email) {
				$to = $email_id;
                $subject = "Password";
                $txt = "Your password is : $password.";
                $headers = "From: minjanaruwanpura@gmail.com" . "\r\n" .
                "CC: somebodyelse@example.com";
                mail($to,$subject,$txt,$headers);
			}
				else{
					echo 'invalid email';
				}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PhotosMeetUP-ForgotPassword</title>
	<link href="css/bootstrap-4.3.1.css" rel="stylesheet">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.3.1.js"></script>
	<link href="css/basicStyle.css" rel="stylesheet">
	<style type="text/css">
 	input{
 		border:1px solid olive;
 		border-radius:5px;
 	}
 	h1{
  		color:darkgreen;
  		font-size:22px;
  		text-align:center;
 	}

	</style>
	
  </head>
  <body>
	  <div class="container">
<ul class="nav nav-tabs">
  <li class="nav-item"> <a class="nav-link" href="PhotosMeetUP-Home.php">Home</a> </li>
  <li class="nav-item"> <a class="nav-link" href="PhotosMeetUP-AddPhoto.php">Add Photo</a> </li>
  <li class="nav-item"> <a class="nav-link" href="PhotosMeetUP-Register.php">Register</a> </li>
  <li class="nav-item"> <a class="nav-link" href="PhotosMeetUP-Login.php">Login</a> </li>
  </ul>
	  <img src="images/PhotosMeetUp.jpg" width="1100" height="323" alt=""/>
		<p>&nbsp;</p>
	<h1>Forgot Password<h1>
<form action='' method='post'>
<table cellspacing='5' align='center'>
<tr><td>Email:</td><td><input type='text' name='txtEmail'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>
</form>
		</div>
  </body>
</html>