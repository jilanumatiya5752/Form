<?php 
include ('server.php');

session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css"  href="style.css">
</head>
<body>
	<?php 
    $a=$_GET['msg'];
  echo($a);

    if($_SESSION['id'] == ''){ ?>
		<div class="header">
			<h2>Home Page</h2>
		</div>
		<div class="content">
    	<center>
        	<a href="login.php">
    			<input type="submit" class = "btn" name="login" value="Login"  />
   			</a><br><br>
    			<a href="registration.php">
					<input type="submit" class = "btn" name="sub" value="Registration" />
				</a>
		</center>
<?php }else{?>
   
	
    <center>
        <?php
        
        $id=$_SESSION['id'];
    $sqlimage  = "SELECT * FROM register where `id` = '$id'";
    
    $image = mysqli_query($db, $sqlimage);
    while($rows=mysqli_fetch_assoc($image))
    
    {
        $image=$rows['image'];
    
        echo  "<img src = http://localhost/jilanumatiya/form/upload/$image>";
    
    } 
    ?>
    <br>
    <br>
   <?php


$s="select * from register where id='$_SESSION[id]'";
$qu= mysqli_query($db, $s);
$f=mysqli_fetch_assoc($qu);

   ?>
	<table>
		<tr>
			<td>Name : </td>
			<td><?php echo $f['name'];?></td>
		</tr>
    <tr>
			<td>email : </td>
			<td><?php echo $f['email'];?></td>
		</tr>
    <tr>
			<td>city : </td>
			<td><?php echo $f['city'];?></td>
		</tr>
    </table>
    <br>
    <br>	
    <p><a href="logout.php">Log Out Btn</a></p>
    
    <br>
    <br>
    <p><a href="editprofile.php">Edit Profile</a></p>

    <br>
    <br>
    <p><a href="table.php">table</a></p>

    <center>
    <?php } ?>    
        </div>
    </body>
    </html>