<?php 
include('header.php');
$message4='';
 if(isset($_SESSION['message4'])){
	$message4=$_SESSION['message4'];
	unset($_SESSION['message4']);
	}
?>


 	</br>
 	<div class="container">
 		 	
			  <strong><center><?php echo $message4; ?></center></strong><br>
			

 		<form method="POST" action="insertexpenditure.php">

 		<div class="row">
 			
 			<!-- id 	expense_id 	edated 	edescription 	eamount 	user_id -->

 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Expenditure Head</legend>
    				
				  <?php 


				  $user_id=$_SESSION['id'];
				  $equery = " SELECT * from expense WHERE user_id=$user_id ORDER BY id ASC";
		    						$eresult = mysqli_query($conn,$equery);?>
                                    
									  <div class="form-group">
					  <label for="expense_id">Select Expense Head:</label>
					  <select class="form-control" id="expense_id" name="expense_id">
					    <option disabled selected="">Select</option>
					   <?php  while($erows=mysqli_fetch_assoc($eresult)) { ?>
					    <option value='<?php echo $erows['id'];?>'>'<?php echo $erows['id'].'-'.$erows['ehead'];?>'</option> <?php  } ?> 
					    </select>
					</div>
				
    			</fieldset>
 			</div>

 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Entry Date</legend>
    				<div class="form-group">
				    <label for="edated">Enter Date:</label>
				    <input type="date" class="form-control" placeholder="Enter Date" name="edated" id="edated">
				  </div>
    			</fieldset>
 			</div>

 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Expenditure</legend>
    				<div class="form-group">
				    <label for="eamount">Enter Amount:</label>
				    <input type="text" class="form-control" placeholder="Enter Amount" name="eamount" id="eamount">
				  </div>
    			</fieldset>
 			</div>
 		</div></br>

 		<div class="row">
 			<div class="col-12">
 			<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Descriptions</legend>
    				<div class="form-group">
				    <label for="edescription">Enter Details:</label>
				    <textarea class="form-control" placeholder="Enter Details" name="edescription" id="edescription"></textarea> 
				  </div>
    		</fieldset>
    		</div>

 		</div><br>
 		
 		</br><p align="center">
 		<button type="submit" name="submit" class="btn btn-primary">Submit</button>
 		</form></p>
 		<br>

 		<!-- Retriew Data -->
 		<!-- id  expense_id edated 	edescription eamount user_id -->

 		<div class="row">
	 		 
	 		
	 		<div class="table-responsive">
	 			<table class="table table-striped" id="dataTable" style="width: 100%;">
			    <thead>
			      <tr>
			        <th>ehead</th>
			        <th>edated</th>
			        
			        <th width="30%;">edescription</th>
			        <th>eamount</th>
			        <th>Edit</th>
			        <th>Delete</th>
			      </tr>
			    </thead>
			    <tbody>
			      
			         <?php 
                                   
                                    // $query = "SELECT * from expenditure WHERE user_id=$user_id ORDER BY id DESC";
                                  
			         				
			         				$query = "SELECT * from expense INNER JOIN expenditure ON expenditure.expense_id= expense.id WHERE expenditure.user_id=expense.user_id AND expenditure.user_id=$user_id ORDER BY expenditure.id DESC";

		    						$result = mysqli_query($conn,$query) or die( mysqli_error($conn));;
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $expense_id = $row['expense_id'];
                                        $edated = $row['edated'];
                                        $eamount = $row['eamount'];
                                        $edescription = $row['edescription'];
                                        // $user_id = $row['user_id'];
                                        $id = $row['id'];
                                        $ehead = $row['ehead'];
                                    
                            		?>
                                    <tr>
                                        
                                        <td><?php echo $ehead ?></td>
                                        <td><?php echo $edated ?></td>
                                        <td><?php echo $edescription ?></td>
                                        <td><?php echo $eamount ?></td>
                                        
                                        
                                        <!-- <td><?php echo $user_id ?></td> -->
                                        <td><a href="eedit.php?eedit=<?php echo $id; ?>"><span class="btn btn-primary">Edit</span></a></td>
                                        <td><a  href="edelete.php?edelete=<?php echo $id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><span class="btn btn-danger">Delete</span></a></td>
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

