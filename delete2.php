<?php
session_start();
$db = mysqli_connect("localhost:3306","root","Root#123","jilan");


$id=$_GET['id'];
  
    
    $url = "SELECT * FROM register WHERE id = '$id'";
    $image = mysqli_query($db, $url);
   
    
    $rows=mysqli_fetch_assoc($image);
    
    $imageUrl ='upload/'.$rows['image'];
    
   if(file_exists($imageUrl)){
    unlink($imageUrl);  

if(isset($_POST['stud_delete_multiple_btn']))
{
    $all_id = $_POST['stud_delete_id'];
    $extract_id = implode(',' , $all_id);
    // echo $extract_id;

    $query = "DELETE FROM register WHERE id IN($extract_id) ";
    $query_run = mysqli_query($db, $query);

    if($query_run != 0)
    {
        $_SESSION['status'] = "Multiple Data Deleted Successfully";
        header("Location: newtable.php");
    }
    else
    {
        $_SESSION['status'] = "Multiple Data Not Deleted";
        header("Location: newtable.php");
    }
}
   }    
?>