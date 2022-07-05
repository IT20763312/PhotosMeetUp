<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PhotosMeetUp-Register</title>
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet">
	<link href="css/basicStyle.css" rel="stylesheet">
  <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.3.1.js"></script>
	<script type="text/javascript">
	  function validateFullName()
	{
		var fname = document.getElementById("txtFullName").value;
	
	
	
		 if(fname=="  "|| fname==null)
		    {
				alert("Please enter the full name");
				return false;
			}
	      return true;
			 
	}
		
		
		
		function validateEmail()
	{
		var email= document.getElementById("txtEmail").value;
		
		var at= email.indexOf("@");
		var dt= email.lastIndexOf(".");
		var len= email.length;
		
		if((at<2) || (dt-at <2) || (len-dt<2))
			{
				alert("Plese enter a valid email address")
				return false;
			}
		return true;
	}
		
		
		
		
		
		function validatePassword()
    {
	  var pwd=document.getElementById("txtPassword").value;
	  var cpwd=document.getElementById("txtConfirmPassword").value;
	  
	  if((pwd.length<5) || (pwd!= cpwd))
		  {
			  alert("Please enter correct password and matching confirm password");
			  return false;
		  }
	  return true;
    }
		
		
		
		
		function validate()
{
      if(validateFullName()  && validateEmail() && validatePassword())
	      {
			  alert("You are registered");
		  }
          else
	      {
			 event.preventDefault(); 
		  }
}
	  
  </script>
  </head>
	
  <body bgcolor="#FFFFFF">
	  <div class="container">
	<ul class="nav nav-tabs">
  <li class="nav-item"> <a class="nav-link" href="PhotosMeetUP-Home.php">Home</a> </li>
  <li class="nav-item"> <a class="nav-link" href="PhotosMeetUP-AddPhoto.php">Add Photo</a> </li>
  <li class="nav-item"> <a class="nav-link active" href="#">Register</a> </li>
  <li class="nav-item"> <a class="nav-link" href="PhotosMeetUP-Login.php">Login</a> </li>
  </ul> 
	  <img src="images/PhotosMeetUp.jpg" width="1100" height="200" alt=""/>
		  <p>&nbsp;</p>
		  <form action="PhotosMeetUP-Register.php" method="post">
      
      <table width="460" border="1" align="center">
      <tr>
        <td colspan="2"><img src="images/icon4.png"></td>
      </tr>
      <tr>  
        <td colspan="2"><h1><span style="color: #000000">Register</span></h1></td>
        </tr>
      <tr>
        <td width="146">Full Name</td>
        <td width="304"><input name="txtFullName" type="text" autofocus="autofocus" required="required" id="txtFullName" /></td>
      </tr>
      <tr>
        <td>Email Address</td>
        <td><input name="txtEmail" type="text" required="required" id="txtEmail"/></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input name="txtPassword" type="password" required="required" class="datalist" id="txtPassword"/></td>
      </tr>
      <tr>
        <td>Confirm Password</td>
        <td><input name="txtConfirmPassword" type="password" required="required" class="datalist" id="txtConfirmPassword" /></td>
      </tr>
      
      <tr>
        <td colspan="2"><blockquote>
        
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
             <input name="btnSubmit" type="submit" class="button" id="btnSubmit" value="Register" onclick="validate()"/>
             <input name="btnReset" type="reset" class="button" id="btnReset" value="Cancel"   />
        </blockquote></td>
        </tr>
		<tr>
        <td colspan="2"><blockquote>
        
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
             <center><p>If already registered <a href="PhotosMeetUP-Login.php">LOGIN</a></p></center>
        </blockquote></td>
        </tr>
    </table>
    </form>
	  </div>
	  <?php
	if(isset($_POST["btnSubmit"]))
	{
		$fullName = $_POST["txtFullName"];
		$email = $_POST["txtEmail"];
		$password = $_POST["txtPassword"];
		
		$con = mysqli_connect("localhost","root","","photosmeetup");
					if(!$con)
					{
						die("Cannot conect to the database server");
					}
					
					$sql = "INSERT INTO tbluser (fullname,email,password) VALUES ('$fullName','$email','$password')";
		
					mysqli_query($con,$sql);
		
					mysqli_close($con);
		
					header('Location:PhotosMeetUP-Login.php');
	}
?>
  </body>
</html>
