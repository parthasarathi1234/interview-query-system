<?php
	session_start();
	$conn=new mysqli("localhost","root","","pardhu");
	
	if(isset($_POST['login']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		//$password=sha1('password');
		$usertype=$_POST['usertype'];
		$sql = "SELECT * FROM hello WHERE username='$username' AND password='$password' AND usertype='$usertype'";
		

		$query_run=mysqli_query($conn,$sql);
	

		if(mysqli_num_rows($query_run)>0)
		{	
			
			
			
			if($usertype=='junior')
			{	$_SESSION['username']=$username;
				header('location:junior.php');}
			else if($usertype=='senior')
			{	$_SESSION['username']=$username;
				header('location:senior.php');}
			else if($usertype=='faculty')
			{	$_SESSION['username']=$username;
				header('location:faculty.php');}

		}
		else
		{
			echo '<script type="text/javascript"> alert(" invalid username and password") </script>';
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>login page</title>
	<link rel="stylesheet" type="text/css" href="loginstyle1.css">
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
		<div>
			<img src="image1.jpg">
		</div>
		<div class="login">
			<form method="post" class="myform">
				<h1 class="header"><b>Login Form</b></h1><br>
				<div>
					<label>Username</label><br><br>
					<input type="text" name="username" class="input" placeholder="username" required><br><br>
				</div>
				<div>
					<label>Password : </label><br><br>
					<input type="password" name="password" class="input" placeholder="password" required><br><br><br>
				</div>
				<div>
					<label for="usertype"><b>I am : </b></label><br>
					<input type="radio" name="usertype" value="junior" required>junior | 
					<input type="radio" name="usertype" value="senior" required>senior | 
					<input type="radio" name="usertype" value="faculty" required>faculty<br><br>

				</div>
				<div>
					<input type="submit" name="login" id="login_btn" value="Sign in">

				</div>
			</form>
			
		</div>
	</div>

</body>
</html>