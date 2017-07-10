<?php
session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#95a5a6">
	<div id = "main-wrapper">
	<center><h2>LogIn</h2>
			<img src="imgs/loginImg.png" class="avatar">
	</center>
	<form class="myform" action="index.php" method="post">
	<label><b>Username: </label><br>
		<input name="username" type="text" class="inputvalues" placeholder="Type your username"/><br>
		<label><b>Password: </label><br>
		<input name="password" type="Password" class="inputvalues" placeholder="Confirm password"><br>
		<input name="login" type="Submit" id="login_btn" value="Login"/><br>
		<a href="signup.php"><input type="button" id="register_btn" value="Sign up"/><br>
	</form>
	<?php
		if(isset($_POST['login']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			$query="select * from user WHERE username='$username' AND password='$password'";
			
			$query_run = mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)>0)
			{
				// valid
				$_SESSION['username']= $username;
				header('location:homepage.php');
			}
			else
			{
				// invalid
				echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
			}
			
		}
		
		
		?>

	</div>

</body>
</html>