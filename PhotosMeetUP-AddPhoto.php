<?php session_start(); 
if(!isset($_SESSION["txtEmail"]))
{
	header('Location:PhotosMeetUP-Login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PhotoMeetUp-AddPhoto</title>
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet">
	<link href="css/basicStyle.css" rel="stylesheet">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.3.1.js"></script>
  </head>
  <body>
  <div class="container">
	  <ul class="nav nav-tabs">
      <li class="nav-item"> <a class="nav-link " href="PhotosMeetUP-Home.php">Home</a> </li>
      <li class="nav-item"> <a class="nav-link active" href="#">Add Photo</a> </li>
      <li class="nav-item"> <a class="nav-link" href="PhotosMeetUP-Register.php">Register</a> </li>
      <li class="nav-item"> <a class="nav-link" href="PhotosMeetUP-Login.php">Login</a> </li>
      </ul>
	  <img src="images/PhotosMeetUp.jpg" width="1100" height="200" alt=""/>
	  <p>&nbsp;</p>
	  <form action="PhotosMeetUP-AddPhoto.php" method="post" enctype="multipart/form-data">
      
      <table width="438" border="1" align="center">
      <tr>
        <td colspan="2" bgcolor="#FFFFFF"><div align="center"><img src="images/icon3.png" width="165" height="166" /></div>
          <h1>Add Photo</h1></td>
        </tr>
      <tr>
        <td width="146">Name / Title</td>
        <td width="282"><input name="txtTitle" type="text" autofocus="autofocus" required="required" id="txtFullName" /></td>
      </tr>
      <tr>
        <td>Images</td>
        <td><input name="file" type="file" required="required" id="file" /></td>
      </tr>
      <tr>
        <td>Description</td>
        <td><input name="txtDescription" type="text" required="required" id="txtContact" /></td>
      </tr>
      <tr>
        <td colspan="2"><blockquote>
        
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <p>
               <input name="btnSubmit" type="submit" class="button" id="btnSubmit" value="Add Now"   />
               <input name="btnReset" type="reset" class="button" id="btnReset" value="Cancel"   />
               
             </p>
             
        </blockquote></td>
        </tr>
    </table>
    </form>
  </div>
	  <?php
	  if(isset($_POST['btnSubmit']))
	  {
		  $file = $_FILES['file'];
		  
		  $fileName = $_FILES['file']['name'];
		  $fileTmpName = $_FILES['file']['tmp_name'];
		  $fileSize = $_FILES['file']['size'];
		  $fileError = $_FILES['file']['error'];
		  $fileType = $_FILES['file']['type'];
		  
		  $fileExt = explode('.',$fileName);
		  $fileActualExt = strtolower(end($fileExt));
		  
		  $allowed = array('jpg','jpeg','png');
		  
		  if(in_array($fileActualExt,$allowed))
		  {
			  if($fileError===0)
			  {
				  if($fileSize<500000)
				  {
					  $fileNameNew = uniqid('',true).".".$fileActualExt;
					  $fileDestination = 'Uploads/'.$fileNameNew;
					  move_uploaded_file($fileTmpName,$fileDestination);
					  header('Location:PhotosMeetUP-AddPhoto.php?Upload Success');
				  }
				  else
				  {
					  echo "Your file is too big!";
				  }
			  }
			  else
			  {
				  echo "There was an error uploading your file!";
			  }
		  }
		  else
		  {
			  echo "You cannot upload files of this type!";
		  }
		  
		  $title = $_POST["txtTitle"];
		  $description = $_POST["txtDescription"];
		  $path = $fileDestination;
		  
		  $con = mysqli_connect("localhost","root","","photosmeetup");
					if(!$con)
					{
						die("Cannot conect to the database server");
					}
					
					$sql = "INSERT INTO tblimage (title,description,path) VALUES ('$title','$description','$path')";
		
					mysqli_query($con,$sql);
		
					mysqli_close($con);
		
					header('Location:PhotosMeetUP-Home.php');
	
		  
	  }
	  ?>
  </body>
</html>
