<?php
include 'server.php';

session_start();
// if($_SESSION["id"] != true){
//     echo 'not logged in';
//     header("Location: .php");  
	
// }
if(isset($_POST['sub'])){
	$t=$_POST['text'];
	$u=$_POST['email'];
	$p=$_POST['pass'];
	$q=$_POST['cpass'];
	$c=$_POST['city'];
	$g=$_POST['gen'];
	header ('location:index.php');
	//code for image uploading

	
	if($_FILES['f1']['name']){
		move_uploaded_file($_FILES['f1']['tmp_name'], "upload/".$_FILES['f1']['name']);
		 $img=$_FILES['f1']['name'];
		//  $upload_img = generate_thumb_now('f1','upload/','',TRUE,'upload/thumbnail/','400','320');
	}
	
	md5($p);
	
	 $i="insert into register(name,email,password,cpassword,city,image,gender)values('$t','$u','$p','$q','$c','$img','$g')";	
	 mysqli_query($db, $i);	
	 
    $sql ="SELECT * FROM `register` WHERE (`email`,`password`,`cpassword`)=('$u','$p','$q')";
    $result=mysqli_query($db,$sql);

     $rows = mysqli_num_rows($result);

    if($rows != 0){ 

	
	 header("Location: http://localhost/jilanumatiya/form/index.php? msg= You have logged in");
  
   }else{
	 $query = "insert into register(name,email,password,cpassword,city,image,gender)values('$t','$u','$p','$q','$c','$img','$g')";

	 header("Location: http://localhost/jilanumatiya/form/index.php? msg= new register");
		 
    }

    $_SESSION['registration'] = true;

   $_SESSION['name'] = $name;
}
?>
<html>
	<head>
	<meta charset="UTF-8">
	<title> REGISTRATION FORM</title>
	<link rel="stylesheet" type="text/css"  href="style.css">
	</head>
	<body>

		<form method="POST"  enctype="multipart/form-data">
		<h2>REGISTRATION FORM</h2>
		<br>
		<br>
			<table>
				<tr>
					<td>
						Name:
						<input type="text" name="text">
					</td>
				</tr>
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
						cpassword:
						<input type="cpassword" name="cpass">
					</td>
				</tr>
				<tr>

					<td>
					city:
						<select name="city">
							<option value="">Select</option>
							<option value="knp">kanpur</option>
							<option value="lko">lucknow</option>
							<option value="amd">amdavad</option>
							<option value="jnd">junagadh</option>
							<option value="rj">rajasthan</option>
							<option value="gj">gujarat</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						Gender:
						<input type="radio"name="gen" id="gen" value="male">male
						<input type="radio" name="gen" id="gen" value="female">female
					</td>
				</tr>
				<tr>
					<td>
						Image:
						<input type="file" name="f1">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" value="submit" name="sub">
						
					</td>
					
				</tr>
				
			</table>
			<p>Already have an account? <a href="login.php">Login here</a></p>
		</form>
	</body>
</html>