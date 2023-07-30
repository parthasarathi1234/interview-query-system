<?php
	session_start();
	$conn=mysqli_connect("localhost","root","","padthu");
	if(!isset($_SESSION['username'])){
		header("location:login.php");
	}
	
	if(isset($_POST['update']))
	{
		$full=$_POST['fullname'];
		$username=$_POST['user'];
		$number=$_POST['number'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$cpassword=$_POST['cpassword'];
	

		if($password==$cpassword)
		{
			
			$updat=$_SESSION['username'];
			$sql="UPDATE hello SET fullname='$full', username='$username', ph_no='$number', email='$email', password='$password',usertype='senior' WHERE username='$updat'";
			$query_run=mysqli_query($conn, $sql);
			if($query_run)
			{
				echo '<script type="text/javascript"> alert("Details updated successfull. you logout and login for better experince") </script>';

			}
			else
			{
				echo '<script type="text/javascript"> alert("Error!") </script>';
			}
		
		}			
	}		
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update user information</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav class="a">
		<div class="b">
			<a href="#home" id="c">Interview Query System</a>
			<ul class="d">
				<li class="e">
					<a href="homepage.php" class="f" id="home-page">Home</a>
				</li>
				<li class="e">
					<a href="logout.php" class="f" id="home-page">
						<?php
							echo $_SESSION['username']; 
						?>
					</a>
				</li>
				
			</ul>
		</div>
	</nav>
	<div class="x">
		<h2>information update</h2>
	</div>
	<div class="two">
		<form method="post" class="myform">
			<h1 class="header"><b>Registration Form<b></h1>
			<label>Full name : </label><br>
			<input type="text" name="fullname" class="input" placeholder="Full name" required><br>
			<label>Username : </label><br>
			<input type="text" name="user" class="input" placeholder="Username" required><br>
			<label>Phone number : </label><br>
			<input type="tel" name="number" class="input" placeholder="phone number" required><br>
			<label>Email : </label><br>
			<input type="email" name="email" class="input" placeholder="email" required><br>
			<label>Password : </label><br>
			<input type="password" name="password" class="input" placeholder="password" required><br>
			<label>Confirm Password : </label><br>
			<input type="password" name="cpassword" class="input" placeholder="confirmpassword" required><br>
			
			<input type="submit" name="update" id="sign_btn" value="Update"><br>
			<a href="logout.php" value="logout" name="logout">logout</a>
			
		</form>

	</div>

</body>
</html>