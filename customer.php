<?php 
include('header.php');
$user_id=$_SESSION['id'];
$message6='';
 if(isset($_SESSION['message6'])){
	$message6=$_SESSION['message6'];
	unset($_SESSION['message6']);
	}
?>

 
 	</br>
 	<div class="container">
 		 	
			  <strong><center><?php echo $message6; ?></center></strong><br>
			

 		<form method="POST" action="insertcustomer.php">

 		<div class="row">
 			
 			<!-- id 	cname 	ppno    cmobile     caddress	cstatus 	user_id -->

 			
 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Customer Name</legend>
    				<div class="form-group">
				    <label for="cname">Enter Name:</label>
				    <input type="text" class="form-control" placeholder="Enter Name" name="cname" id="cname">
				  </div>
    			</fieldset>
 			</div>

 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Passport</legend>
    				<div class="form-group">
				    <label for="ppno">Enter Passport:</label>
				    <input type="text" class="form-control" placeholder="Enter Passport Number" name="ppno" id="ppno">
				  </div>
    			</fieldset>
 			</div>

 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Mobile</legend>
    				<div class="form-group">
				    <label for="cmobile">Enter Mpbile:</label>
				    <input type="text" class="form-control" placeholder="Enter Mobile" name="cmobile" id="cmobile">
				  </div>
    			</fieldset>
 			</div>
 		</div></br>

 		<div class="row">
 			<div class="col-12">
 			<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Address</legend>
    				<div class="form-group">
				    <label for="caddress">Enter Address:</label>
				    <textarea class="form-control" placeholder="Enter Address" name="caddress" id="caddress"></textarea> 
				  </div>
    		</fieldset>
    		</div>

 		</div><br>
 		
 		</br><p align="center">
 		<button type="submit" name="submit" class="btn btn-primary">Submit</button>
 		</form></p>
 		<br>

 		<!-- Retriew Data -->
 		<!-- id 	cname 	ppno    cmobile     caddress	cstatus 	user_id -->

 		<div class="row">
	 		 
	 		
	 		<div class="table-responsive">
	 			<table class="table table-striped" id="dataTable" style="width: 100%;">
			    <thead>
			      <tr>
			        <th>cname</th>
			        <th>ppno</th>
			        <th>cmobile</th>
			        <th width="30%;">caddress</th>
			        <th>Edit</th>
			        <th>Delete</th>
			      </tr>
			    </thead>
			    <tbody>
			      
			         <?php 
                                   
                                    $query = "SELECT * from customer WHERE user_id=$user_id ORDER BY id DESC";
                                  
			         				
			         				// $query = "SELECT * from expense INNER JOIN expenditure ON expenditure.expense_id= expense.id WHERE expenditure.user_id=expense.user_id AND expenditure.user_id=$user_id ORDER BY expenditure.id DESC";

		    						$result = mysqli_query($conn,$query) or die( mysqli_error($conn));;
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $cname = $row['cname'];
                                        $ppno = $row['ppno'];
                                        $cmobile = $row['cmobile'];
                                        $caddress = $row['caddress'];
                                        
                                        $id = $row['id'];
                                        
                                    
                            		?>
                                    <tr>
                                        
                                        <td><?php echo $cname ?></td>
                                        <td><?php echo $ppno ?></td>
                                        <td><?php echo $cmobile ?></td>
                                        <td><?php echo $caddress ?></td>
                                                                               
                                        
                                        
                                        <td><a href="cedit.php?cedit=<?php echo $id; ?>"><span class="btn btn-primary">Edit</span></a></td>
                                        <td><a  href="cdelete.php?cdelete=<?php echo $id; ?>" onclick="return confirm('Security Check! Are you sure you want to delete? This will also delete all the other records linked with this Customer.');"><button type="button" class="btn btn-lg btn-danger" style="font-size: 14px;" disabled>Delete</button></a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?> 
			      
			     </tbody>
			  </table>
	 		</div>
	 	</div>

	</div>



<?php include ('footer.php'); ?>



