<?php
include'server.php';
 
if(isset($_POST['login'])){
 
	$u=$_POST['email'];
	$p=$_POST['pass'];
	$s= "select * from register where email='$u' and password= '$p'";
	$qu= mysqli_query($db, $s);
 
	if(mysqli_num_rows($qu)>0){
		$f= mysqli_fetch_assoc($qu);
		$_SESSION['id']=$f['id'];
		
		header ('location:index.php');
	}
	else{
		echo 'Email or password does not exist';
	}
}
?>
<html>
	<head>
		<title> Login Form</title>
		<link rel="stylesheet" type="text/css"  href="style.css">
	</head>
	<body>
		<form method="POST" enctype="multipart/form-data">

		<center><h2> Login Form</h2>
		<br>
		<br>	
		<table>
				<tr>
					<td>
						Email:
						<input type="text" name="email">
					</td>
				</tr>
				<tr>
					<td>
						password:
						<input type="password" name="pass">
					</td>
				</tr>
				<tr>
					<td>
						<center><input type="submit" name="login" value="submit">
					</center>
					</td>
				</tr>
				</center>
			</table>
			<p>  new account? <a href="registration.php">Register here</a></p>
		</form>
	</body>
</html>