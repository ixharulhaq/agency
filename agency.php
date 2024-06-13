<?php 
include('header.php');
$user_id=$_SESSION['id'];
$message5='';
 if(isset($_SESSION['message5'])){
	$message5=$_SESSION['message5'];
	unset($_SESSION['message5']);
	}
?>

 
 	</br>
 	<div class="container">
 		 	
			  <strong><center><?php echo $message5; ?></center></strong><br>
			

 		<form method="POST" action="insertagency.php">

 		<div class="row">
 			
 			<!-- id 	aname 	aphone 	aaddress	astatus 	user_id -->

 			
 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Agency Name</legend>
    				<div class="form-group">
				    <label for="aname">Enter Name:</label>
				    <input type="text" class="form-control" placeholder="Enter Name" name="aname" id="aname">
				  </div>
    			</fieldset>
 			</div>

 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Contact</legend>
    				<div class="form-group">
				    <label for="aphone">Enter Phone:</label>
				    <input type="text" class="form-control" placeholder="Enter Phone" name="aphone" id="aphone">
				  </div>
    			</fieldset>
 			</div>
 		</div></br>

 		<div class="row">
 			<div class="col-12">
 			<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Address</legend>
    				<div class="form-group">
				    <label for="aaddress">Enter Address:</label>
				    <textarea class="form-control" placeholder="Enter Address" name="aaddress" id="aaddress"></textarea> 
				  </div>
    		</fieldset>
    		</div>

 		</div><br>
 		
 		</br><p align="center">
 		<button type="submit" name="submit" class="btn btn-primary">Submit</button>
 		</form></p>
 		<br>

 		<!-- Retriew Data -->
 		<!-- id 	aname 	aphone 	aaddress	astatus 	user_id -->

 		<div class="row">
	 		 
	 		
	 		<div class="table-responsive">
	 			<table class="table table-striped" id="dataTable" style="width: 100%;">
			    <thead>
			      <tr>
			        <th>aname</th>
			        <th>aphone</th>
			        <th width="35%;">aaddress</th>
			        <th>Edit</th>
			        <th>Delete</th>
			      </tr>
			    </thead>
			    <tbody>
			      
			         <?php 
                                   
                                    $query = "SELECT * from agency WHERE user_id=$user_id ORDER BY id DESC";
                                  
			         				
			         				// $query = "SELECT * from expense INNER JOIN expenditure ON expenditure.expense_id= expense.id WHERE expenditure.user_id=expense.user_id AND expenditure.user_id=$user_id ORDER BY expenditure.id DESC";

		    						$result = mysqli_query($conn,$query) or die( mysqli_error($conn));;
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $aname = $row['aname'];
                                        $aphone = $row['aphone'];
                                        $aaddress = $row['aaddress'];
                                        
                                        $id = $row['id'];
                                        
                                    
                            		?>
                                    <tr>
                                        
                                        <td><?php echo $aname ?></td>
                                        <td><?php echo $aphone ?></td>
                                        <td><?php echo $aaddress ?></td>
                                                                               
                                        
                                        
                                        <td><a href="agedit.php?agedit=<?php echo $id; ?>"><span class="btn btn-primary">Edit</span></a></td>
                                        <td><a  href="agdelete.php?agdelete=<?php echo $id; ?>" onclick="return confirm('Security Check! Are you sure you want to delete? This will also delete all the other records linked with this Agency.');"><button type="button" class="btn btn-lg btn-danger" style="font-size: 14px;" disabled>Delete</button></a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?> 
			      
			     </tbody>
			  </table>
	 		</div>
	 	</div>

	</div>
 



<?php include('footer.php'); ?>