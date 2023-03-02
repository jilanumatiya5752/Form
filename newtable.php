<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete multiple data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<script type="text/javascript">  
            function selects(){  
                var ele=document.getElementsByName('checkbox');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=true;  
                }  
			}
			</script>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Delete Multiple Data or record using Checkbox in PHP MySQL</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-12">

                <?php 
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                ?>

                <div class="card mt-4">
                    <div class="card-body">
                        <form action="delete2.php" method="POST">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th>
                                        <button type="submit" name="stud_delete_multiple_btn" class="btn btn-danger">Delete</button>
                                            <a href="add.php">ADD</a>
                                            <input type="checkbox" id="select_all"  name="checkbox[]" value="<?= $row['id']; ?>">   
                                        </th>
                                        <th>Id</th>
				                        <th>Name</th>
				                        <th>Email</th>
				                        <th>Password</th>
				                        <th>cPassword</th>
                                        <th>city</th>
				                        <th>Image</th>
				                        <th>Gender</th>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <?php
                                        $db = mysqli_connect("localhost:3306","root","Root#123","jilan");

                                        $query = "SELECT * FROM register";
                                        $query_run  = mysqli_query($db, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                <tr>
                                                    <td style="width:10px; text-align: center;">
                                                    <input type="checkbox" class="checkbox"  name="checkbox[]" value="<?= $row['id']; ?>">
                                                        
                                                    </td>
                                                    <td><?= $row['id']; ?></td>
                                                    
				                                    <td><?= $row['name'];?></td>
				                                    <td><?= $row['email'];?></td>
				                                    <td><?= $row['password'];?></td>
				                                    <td><?= $row['cpassword'];?></td>
                                                    <td><?= $row['city'];?></td>
                                                    <td><img src="upload/<?= $row['image'];?>" height='50px' width="50px"></td>
                                                    <td><?= $row['gender'];?></td>
                                                   
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="9">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
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
    });
</script>
</body>
</html>