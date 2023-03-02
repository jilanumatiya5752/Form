<?php
include 'server.php';
session_start();

$id=$_POST['id'];
$sql = "SELECT * FROM register ORDER BY '$id'";
$result = $db->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>GFG User Details</title>
	
</head>

<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript">  
            function selects(){  
                var ele=document.getElementsByName('checkbox');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=true;  
                }  
			}
			</script>
	<section>
		<center>

		

		<h2>Table</h2>
		<form action="delete.php" method="post">
		
		<table border="1" class = "table">
		<tr>
		<th>
		<input type="checkbox" onclick='selects()'  id="select_all" name="checkbox[]" value=".$row[0]."/>
		</th>
		
                <th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Password</th>
				<th>cPassword</th>
                <th>city</th>
				<th>Image</th>
				<th>Gender</th>
                <!-- <th><a href="delete2.php?id=<?php
				//  echo $rows['id'];
				 ?>"></a></th> -->
				
</tr>
			
			<?php
				while($rows=$result->fetch_assoc())
				{
			?>

			
			<tr>
			<td><input type="checkbox" id="select_all" name="checkbox" value=".$row[0]."></td>
			<!-- <td><input type="checkbox" class="checkbox" name="ids[]" value="<?php
			//  echo $row['id'];
			 ?>"/></td> -->

            <td><?php echo $rows['id'];?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['email'];?></td>
				<td><?php echo $rows['password'];?></td>
				<td><?php echo $rows['cpassword'];?></td>
                <td><?php echo $rows['city'];?></td>
                <td><img src="upload/<?php echo $rows['image'];?>" height='50px' width="50px"></td>
                <td><?php echo $rows['gender'];?></td>
                <td><a href="delete.php?id=<?php echo $rows['id'];?>">DELETE</a></td>
			</tr>
			<?php
				}
			?>
		</table>
		</form>
		</center>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
	$('#select_all').on('click',function(){
	if(this.checked){
	$('.checkbox').each(function(){
	this.checked = true;
});
}else{
$('.checkbox').each(function(){
this.checked = false;
});
}
});
$('.checkbox').on('click',function(){
if($('.checkbox:checked').length == $('.checkbox').length){
$('#select_all').prop('checked',true);
}else{
$('#select_all').prop('checked',false);
}
});
});
</script>
</body>

</html>
