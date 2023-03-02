<?php include 'server.php';
if(!isset($_SESSION["update_profile"])) 
{
    // header("location:login.php"); 
}

$id=$_SESSION["id"];
$findresult = mysqli_query($db, "SELECT * FROM register WHERE id= '$id'");
if($res = mysqli_fetch_array($findresult))
{
$t = $res['text']; 
$u =$res['email']; 
$c = $res['city'];   
$g = $res['gen'];  
$image= $res['image'];
}
 ?> 
 <!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
   
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
           
     <form action="" method="POST" enctype='multipart/form-data'>
  <div class="login_form">

<?php 
 if(isset($_POST['update_profile'])){
$t=$_POST['text'];
$u=$_POST['email'];
$c=$_POST['city'];
$g=$_POST['gen']; 
 $folder='upload/';
 $file = $_FILES['f1']['tmp_name'];  
$file_name = $_FILES['f1']['name']; 
$file_name_array = explode(".", $file_name); 
 $extension = end($file_name_array);
 $new_image_name ='profile_'.rand() . '.' . $extension;
  if ($_FILES["image"]["size"] >1000000) {
   $error[] = 'Sorry, your image is too large. Upload less than 1 MB in size .';
 
}
 if($file != "")
  {
if($extension!= "jpg" && $extension!= "png" && $extension!= "jpeg"
&& $extension!= "gif" && $extension!= "PNG" && $extension!= "JPG" && $extension!= "GIF" && $extension!= "JPEG") {
    
   $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';   
}

}

$sql="SELECT * from register where id='$id'";
      $res=mysqli_query($db,$sql);
   if (mysqli_num_rows($res) > 0) {
$row = mysqli_fetch_assoc($res);

   if($oldusername!=$username){
     if($username==$row['username'])
     {
           $error[] ='Username alredy Exists. Create Unique username';
          } 
   }
}
    if(!isset($error)){ 
          if($file!= "")
          {
            $stmt = mysqli_query($db,"SELECT image FROM  register WHERE id='$id'");
            $row = mysqli_fetch_array($stmt); 
            $deleteimage=$row['image'];
            unlink($folder.$deleteimage);
            move_uploaded_file($file, $folder . $new_image_name); 
            mysqli_query($db,"UPDATE register SET image='$new_image_name' WHERE id='$id'");
          }
           $result = mysqli_query($db,"UPDATE register SET name='$t',email='$u',city='$c' WHERE id='$id'");
           if($result)
           {
       header("location:index.php?update_profile=1");
           }
           else 
           {
            $error[]='Something went wrong';
           }
    }
    $sql ="SELECT * FROM `register` WHERE `id`='$id'";
    $result=mysqli_query($db,$sql);

     $rows = mysqli_num_rows($result);

    if($rows != 0){ 

	 header("Location: http://localhost/jilanumatiya/form/index.php? msg=Edit Succesfull");
  
   }else{
	 $query = "insert into register(name,email,city,image)values('$t','$u','$c','$img')";

	 header("Location: http://localhost/jilanumatiya/form/editprofile.php? msg= Edit not succesfull");
		 
    }

    $_SESSION['registration'] = true;

   $_SESSION['name'] = $name;
        }    
        if(isset($error)){ 

foreach($error as $error){ 
  echo '<p class="errmsg">'.$error.'</p>'; 
}
}
        ?> 
     <form method="post" enctype='multipart/form-data' action="">
          <div class="row">
            <div class="col"></div>
           <div class="col-6"> 
            <center>
            <?php if($image==NULL)
                {
                 echo '<img src="http://localhost/jilanumatiya/form/upload/pic.png">';
                } else { echo '<img src="upload/thumbnail'.$image.'" style="height:80px;width:auto;border-radius:50%;">';}?> 
                <div class="form-group">
                <label>Change Image &#8595;</label>
                <input class="form-control" type="file" name="f1" style="width:100%;" >
            </div>
                <br>
                
  </center>
           </div>
            
          </div>

          <div class="form-group">
          <div class="row"> 
            <div class="col-3">
                <label>Name</label>
            </div>
             <div class="col">
                <input type="text" name="text" value="<?php echo $t;?>" class="form-control">
            </div>
          </div>
      </div>
      
      <br>
      <div class="form-group">
 <div class="row"> 
            <div class="col-3">
                <label>Email</label>
            </div>
             <div class="col">
                <input type="text" name="email" value="<?php echo $u;?>" class="form-control">
            </div>
          </div>
      </div>
      <br>
    
      <div class="form-group">
 <div class="row"> 
            <div class="col-3">
                <label>city</label>
            </div>
             <div class="col">
                <input type="select" name="city" value="<?php echo $c;?>" class="form-control">
            </div>
          </div>
      </div>
      <br>
      
           <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
<button  class="btn btn-success" name="update_profile"  >Save Profile</button>
            </div>
           </div>
           <br>
      
       </form>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
</div> 
<div class="col"><p><a href="logout.php"><span style="color:red;">Logout</span> </a></p>
</div>

<?php



?>
</body>

</html>


