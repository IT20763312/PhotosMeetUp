<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PhotosMeetUp-Home</title>
	<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.3.1.js"></script>
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet">
	<link href="css/basicStyle.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
<ul class="nav nav-tabs">
  <li class="nav-item"> <a class="nav-link active" href="#">Home</a> </li>
  <li class="nav-item"> <a class="nav-link" href="PhotosMeetUP-AddPhoto.php">Add Photo</a> </li>
  <li class="nav-item"> <a class="nav-link" href="PhotosMeetUP-Register.php">Register</a> </li>
  <li class="nav-item"> <a class="nav-link" href="PhotosMeetUP-Login.php">Login</a> </li>
  </ul>
	  <img src="images/PhotosMeetUp.jpg" width="1100" height="323" alt=""/>
		<p>&nbsp;</p>
		<div class="container">
			<?php 
			$con = mysqli_connect("localhost","root","","photosmeetup");
					if(!$con)
					{
						die("Cannot conect to the database server");
					}
					
					$sql = "SELECT * FROM tblimage";
					$results = mysqli_query($con,$sql);
				
					if(mysqli_num_rows($results)>0)
					{
						while($row = mysqli_fetch_assoc($results))
						{
			?>
			
    	<div class="col-md-4">
             <div class="card">
                <img class="card-img-top"  src="<?php echo $row['path']?>" alt="Card image cap" height="300">
                <div class="card-body">
                   <h4 class="card-title"><?php echo $row['title']?></h4>
                   <p class="card-text"><?php echo $row['description']?></p>
                   <br><br>
                   <a href="<?php echo $row['path']?>" class="btn btn-primary">Preview</a>
                </div>
             </div>
          </div>
			<?php
						}
					}
			mysqli_close($con);
			?>
			<br>
       <hr>
       
          <div class="text-center col-lg-6 offset-lg-3">
             <p>Copyright &copy; 2021 &middot; All Rights Reserved &middot; <a href="#" >My Website</a></p>
          </div>
       
		</div>
	</div>	
  </body>
</html>
