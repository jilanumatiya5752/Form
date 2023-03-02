<?php

include('db.php');

if(isset($_POST['sub'])){
	$fullName=$_POST['fullName'];
	$emailAddress=$_POST['emailAddress'];
	$city=$_POST['city'];
	$country=$_POST['country'];

}
// if(!empty($fullName) && !empty($emailAddress) && !empty($city) && !empty($country)){
//     "insert into `user`('fullname','emailAddress','city','country')values('$fullName','$emailAddress', '$city',' $country')";
// }else{
//  echo "All fields are required";
// }
 
function legal_input($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

//  function insert_data($fullName,$emailAddress, $city, $country){
 
    //  global $db;

      $query="insert into user('fullname','emailAddress','city','country')values('$fullName','$emailAddress','$city',' $country')";

     $execute=mysqli_query($db,$query);
     if($execute==true)
     {
       echo "User data was inserted successfully";
     }
     else{
      echo  "Error: " . $execute . "<br>" . mysqli_error($db);
     }


?>