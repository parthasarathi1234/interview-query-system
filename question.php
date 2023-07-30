

<?php
	session_start();
	$conn=mysqli_connect("localhost","root","","pardhu");
	if(!isset($_SESSION['username'])){
		header("location:login.php");
	}
	




	if(isset($_POST['pos']))
	{	$user = $_SESSION['username']; 
		$ques = $_POST['question'];
		$ans = $_POST['answer'];
		$query = "INSERT INTO question(question,answer,username) VALUES('$ques','$ans','$user')";
		$query_run = mysqli_query($conn,$query);
		
		if($query_run)
		{
			echo '<script type="text/javascript"> alert("posted successfully") </script>'; 

		}
		else
		{
			echo '<script type="text/javascript">alert("failed") </script>'; 
		}
	

	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="questionstyle.css">
</head>
<body>
<div>
	<form class="hello" method="post" action="question.php">
		<div class="question">
			<label><b>Question : </b></label><br>
			<textarea rows="5" cols="40" placeholder="type question" name="question" required></textarea>
		</div><br>
		<div class="question">
			<label><b>Answer : </b></label><br>
			<textarea rows="8" cols="40" placeholder="type answer" name="answer" required></textarea>
			
		</div><br><br>
		<button class="input" name="pos">post</button>
		<a href="senior.php">back</a>
		
	</form>
</div>
</body>
</html>