<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PhotosMeetUp-Login</title>
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet">
	<link href="css/loginStyle.css" rel="stylesheet">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.3.1.js"></script>
	<script type="text/javascript">
	
		
	</script>
  </head>
  <body>
  <div class="container">
	  <ul class="nav nav-tabs">
  <li class="nav-item"> <a class="nav-link" href="PhotosMeetUP-Home.php">Home</a> </li>
  <li class="nav-item"> <a class="nav-link" href="PhotosMeetUP-AddPhoto.php">Add Photo</a> </li>
  <li class="nav-item"> <a class="nav-link" href="PhotosMeetUP-Register.php">Register</a> </li>
  <li class="nav-item"> <a class="nav-link active" href="#">Login</a> </li>
  </ul>
	  <img src="images/PhotosMeetUp.jpg" width="1108" height="200" alt=""/>
	  <p>&nbsp;</p>
	  <form action="PhotosMeetUP-Login.php" id="form1" name="form1" method="post">
  <table width="324" height="268" border="1" align="center">
      <tr>
        <td width="294" bgcolor="#FFFFFF"><p class="imgcontainer">&nbsp;</p>
          <p class="imgcontainer"><img src="images/add.png" alt="Avatar" width="63%" height="195" class="avatar" />
            
          </p>
          <div class="container">
            <p>
        <label for="email"><b>Email</b></label>
        <input name="txtEmail" type="text" required placeholder="Enter Email">
        
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="txtPassword" required>
            </p>
            <p>
			  <?php
				if(isset($_POST["btnsubmit"]))
				{
			  		$email = $_POST["txtEmail"]; 
			  		$password = $_POST["txtPassword"];
					
					$con = mysqli_connect("localhost","root","","photosmeetup");
					if(!$con)
					{
						die("Cannot conect to the database server");
					}
					
					$sql = "SELECT * FROM tbluser WHERE email ='$email' AND password ='$password'";
					$results = mysqli_query($con,$sql);
				
					if(mysqli_num_rows($results)>0)
					{
						$_SESSION["txtEmail"] = $email;
						header('Location:PhotosMeetUP-AddPhoto.php');
					}
					else
					{
						echo"Username Or Password is incorrect";
					}
				}
			  ?>
			  </p>
    
      <button type="submit" name="btnsubmit" >Login</button>
      
</div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <p class="psw"><span style="color: #000000">Forgot</span> <a href="#">password?</a></p>
    </div>
    <span style="color: #000000">&nbsp;If you are not registered <a href="PhotosMeetUP-Register.php">REGISTER</a></span></td>
      </tr>
    </table>
</form>
  </div>
  </body>
</html>
