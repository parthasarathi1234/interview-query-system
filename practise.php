<?php
	session_start();
	$conn=mysqli_connect("localhost","root","","parthu");
	$question = "";
	$answer = "";
	$id = "";
?>
<?php
		
	if(isset($_POST['save']))
	{
		$question=$_POST['question'];
		$answer=$_POST['answer'];
		#$id = $_POST['id'];
		$id=$_GET['edit'];
		mysqli_query($conn,"UPDATE data SET question='$question',answer='$answer' where id='$id'");
		#mysqli_query($conn,"INSERT INTO data (question,answer) VALUES('$answer','$question')");

			echo '<script type="text/javascript"> alert("saved") </script>';
			header("location:practise.php");
			
	}
	$result=mysqli_query($conn,"SELECT * FROM data");
		/*while($row=$result->fetch_assoc())
		{
			echo $row['question'];
			echo ' ';
			echo $row['answer'];

			echo '<br>';
		}*/

		/*function pre_r($array){
			echo '<pre>';
			print_r($array);
			echo '</pre>';
		}*/
	
?>
<?php	while ($row = $result->fetch_assoc()):   ?>

<?php 
	echo $row['question'];
	echo '  -   ';
	echo $row['answer'];
?>	
 <a href="practise.php?edit=<?php echo $row['id']; ?>">edit</a>
 <a href="practise.php?delete=<?php echo $row['id']; ?>">update</a>
<?php 
	echo "<br>";
	endwhile;
?>

<?php 
	if (isset($_GET['delete']))
	{
		$id = $_GET['delete'];
		mysqli_query($conn,"DELETE FROM data WHERE id='$id'");

		echo '<script type="text/javascript"> alert("deleted") </script>';
		header("location:practise.php");
	}
?>
<?php
	if (isset($_GET['edit']))
	{
		$id=$_GET['edit'];
		$result=mysqli_query($conn,"SELECT * FROM data WHERE id='$id'");
			
		$row =$result->fetch_array();
		$question = $row['question'];
		$answer = $row['answer'];
		$id = $row['id'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
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


	<div class="row">
	<form action="" method="post">
		<div class="hello">
			<label>question</label>
			<input type="text" name="question"
			value="<?php echo $question; ?>" 
			 style="height: 200px; width: 400px;">
		</div>
		<div>
			<label>answer</label>
			<input type="text" name="answer"
			value="<?php echo $answer; ?>"
			>
		</div>
		<button type="submit" name="save">Save</button>

	</form>
	</div>



</body>
</html>