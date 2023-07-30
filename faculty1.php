<?php
	session_start();
	$conn = mysqli_connect("localhost","root","","parthu");
	$question="";
	$answer="";
	if(isset($_POST['update']))
	{
		$question = $_POST['question'];
		$answer = $_POST['answer'];
		$id = $_GET['edit'];
		mysqli_query($conn,"UPDATE question SET question='$question', answer='$answer' WHERE id='$id'");
	}

?>
<?php
		if (isset($_GET['edit']))
		{
			$id = $_GET['edit'];
			echo $id;
			$result=mysqli_query($conn,"SELECT * FROM question WHERE id='$id'");
			$row = $result->fetch_assoc();
			$question=$row['question'];
			$answer=$row['answer'];
			echo $question;
			
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
						home
					</a>
				</li>
				<li class="e">
					<a href="logout.php" class="f" id="home-page">Log out</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="content">
		<form method="post">
			<div class="question">
				<label><b>Question : </b></label><br>
				<textarea rows="5" cols="150" name="question" required placeholder="type question"><?php echo $question ?></textarea>
			</div><br>
			<div class="question">
				<label><b>Answer : </b></label><br>
				<textarea rows="8" cols="150" placeholder="type answer" name="answer" required><?php echo $answer ?></textarea><br><br>
			<button class="input" name="update">update</button>
			</div>
			
		</form>
		<div class="hi">
			<?php
				$sql="SELECT * from question ORDER BY id DESC;";
				$result=mysqli_query($conn,$sql);
			?>
			<?php while($row = $result->fetch_assoc()):  ?>
			<?php
				echo "<h2>";
				echo "--> ";
				echo $row['question'];
			?>
			<a href="faculty.php?edit=<?php echo $row['id']; ?>">edit</a>
			<a href="faculty.php?delete=<?php echo $row['id']; ?>">delete</a>
			<?php
				echo "</h2>";
				echo $row['answer'];
				echo "<br>";
				echo "<br>";
			?>
			
			<?php endwhile; ?>

		</div>
	</div>
	
</body>
</html>