<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","pardhu");
	$username=$_SESSION['username'];
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
			
		</div>
	</nav>
	<div class="content">
			<div class="hi">
				<?php
			
				$sql="SELECT * from question where username='$username'";
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
</body>
</html>