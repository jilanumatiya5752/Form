<?php
include 'server.php';
    $id=$_GET['id'];
  
    
    $url = "SELECT * FROM register WHERE id = '$id'";
    $image = mysqli_query($db, $url);
   
    
    $rows=mysqli_fetch_assoc($image);
    
    $imageUrl ='upload/'.$rows['image'];
    
   if(file_exists($imageUrl)){
    unlink($imageUrl);
    
    $sql = "DELETE FROM register WHERE id='$id'";
    $result = mysqli_query($db, $sql);
   
   }
    header ("location: table.php");

?>