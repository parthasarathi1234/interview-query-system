<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","pardhu");
	if(!isset($_SESSION['username'])){
		header("location:login.php");
	}
	$question="";
	$answer="";
	if(isset($_POST['update']))
	{
		$question = $_POST['question'];
		$answer = $_POST['answer'];
		$id = $_GET['edit'];
		mysqli_query($conn,"UPDATE question SET question='$question', answer='$answer' WHERE id='$id'");
	}
	if (isset($_GET['edit']))
		{
			$id = $_GET['edit'];
			$result=mysqli_query($conn,"SELECT * FROM question WHERE id='$id'");
			$row = $result->fetch_assoc();
			$question=$row['question'];
			$answer=$row['answer'];
			
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="seniorstyle.css">
</head>
<body>
	<nav class="a">
		<div class="b">
			<a href="#home" id="c">Interview Query System</a>
			<ul class="d">

				
				
				<li class="e">
					<a href="logout.php" class="f" id="home-page">
						username
					</a>
				</li>
				<li class="e">
					<a href="logout.php" class="f" id="home-page">Log out</a>
				</li>

				
			</ul>
		</div>
	</nav>

	<div>
		<div class="left">
			<div class="hello">
				<br>
				<a href="update.php"><button>update your information</button></a>
				<br>
				<br>
				<a href="question.php"><button>post question and answer</button></a>
				<br>
				<br>
				<a href="update.php"><button>your posts</button></a>
			</div>
		</div>
		<div class="content">
			<div class="hi">
				<form method="post">
					<div>
						<label><b>Question : </b></label>
						<textarea rows="5" cols="150" name="question"><?php echo $question ?></textarea>
					</div>
					<div>
						<label><b>Answer : </b></label>
						<textarea rows="10" cols="150" name="answer"><?php echo $answer ?></textarea>
					</div>
					<button name="update">Update</button>
				</form>
			<?php
				$sql="SELECT *FROM question ORDER BY id DESC;";
				$result=mysqli_query($conn,$sql);
			?>
			<?php while($row = $result->fetch_assoc()):  ?>
			<table border="3px">
			<?php
				echo "<h2>";
				echo "--> ";
				echo $row['question'];
			?>
			<button><a href="faculty.php?edit=<?php echo $row['id']; ?>" text-decoration="none";>edit</a></button>
			<button><a href="faculty.php?delete=<?php echo $row['id']; ?>">delete</a></button>
			<?php
				echo "</h2>";
				echo $row['answer'];
				echo "<br>";
				echo "<br>";
			?>
			</table>
			<?php endwhile; ?>
			</div>
		</div>
		<div class="right">
			
		</div>
	</div>
</body>
</html>