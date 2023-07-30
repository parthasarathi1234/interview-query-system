<?php
	session_start();
	$conn=mysqli_connect("localhost","root","","pardhu");

	if(isset($_POST['register']))
	{
		$full=$_POST['fullname'];
		$username=$_POST['user'];
		$number=$_POST['number'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$cpassword=$_POST['cpassword'];

		if($password==$cpassword)
		{	
			$query="SELECT * from hello WHERE username='$username'";
			$query_run=mysqli_query($conn,$query);

			if(mysqli_num_rows($query_run)>0)
			{
				
			}
			else
			{
				$query="INSERT INTO hello (fullname,username,ph_no,email,password,usertype) VALUES('$full','$username','$number','$email','$password','junior')";
				$query_run=mysqli_query($conn,$query);
				if($query_run)
				{
	
					echo '<script type="text/javascript"> alert("Registration successful") </script>';
				}
				else
				{
					echo '<script type="text/javascript"> alert("Error!") </script>';
				}
			}
		
				
		}
		else
		{

			echo '<script type="text/javascript"> alert("password and confirm password does not match") </script>';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Registration page</title>
	<link rel="stylesheet" type="text/css" href="registerstyle.css">
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
				
			</ul>
		</div>
	</nav>
	<div class="two">
		<form method="post" class="myform" action="register.php">
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
			<input type="submit" name="register" id="sign_btn" value="Sign up"><br>
			<p>
				Already a member ?  <a href="login.php" class="sign_in">Sign in</a>
			</p>

		</form>
	</div>

</body>
</html>