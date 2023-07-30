<?php
	session_start();
	
	$conn=mysqli_connect("localhost","root","","pardhu");
	if(!isset($_SESSION['username'])){
		header("location:login.php");
	}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="juniorstyle.css">
</head>
<body>
	<nav class="a">
		<div class="b">
			<a href="#home" id="c">Interview Query System</a>
			<ul class="d">
				<li class="e">
					<a href="logout.php" class="f" id="home-page">Log out</a>
				</li>
				<li class="e">
					<a href="logout.php" class="f" id="home-page"><?php
				echo $_SESSION['username']; ?></a>
				</li>
				


				<li>
					
				</li>
				
			</ul>
		</div>
	</nav>
	<div>
		<div class="left">
			
		</div>
		<div class="content">
			<div class="hi">
				<?php
			
				$sql="SELECT * from question ORDER BY id DESC;";
				$result=mysqli_query($conn,$sql);
				$resultcheck=mysqli_num_rows($result);
				if($resultcheck>0)
				{	echo "  <br><br><br>";
					while($row=mysqli_fetch_assoc($result))
					{	
						echo "<h2>";
						echo "--> ";
						echo $row['question'];
						echo "</h2>";
						echo $row['answer'];
						echo "<br>";
						echo "<br>";
					}
				}


			?>
			</div>
		</div>
		<div class="right">
			
		</div>
	</div>
</body>
</html>