<?php 
include('header.php');
$message2='';
 if(isset($_SESSION['message2'])){
	$message2=$_SESSION['message2'];
	unset($_SESSION['message2']);
	}

	if (isset($_SESSION['message3'])) {
	?>
	 <script type="text/javascript">
         confirm("Amount Returned is greater than the Arrears, unable to update record!");
     </script>
     <?php  
	unset($_SESSION['message3']);
}

?>

 
 </br>
 <div class="container">

 		<strong><center><?php echo $message2; ?></center></strong><br>
 		 		
 		<form method="POST" action="insertdata.php">

 		<div class="row">
 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Voucher Number</legend>
    				<div class="form-group">
				    <label for="voucher_id">Voucher #:</label>
				    <input type="text" class="form-control" placeholder="Enter Voucher #" name="voucher_id" id="voucher_id">
				  </div>
    			</fieldset>
 			</div>
 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Customer ID</legend>
    				
				  <?php 
				  $user_id=$_SESSION['id'];
				  $custquery = " SELECT * from customer WHERE user_id=$user_id ORDER BY id DESC";
		    						$resultcust = mysqli_query($conn,$custquery);?>
                                    
									  <div class="form-group">
					  <label for="sel1">Select list:</label>
					  <select class="form-control" id="customer_id" name="customer_id">
					    <option disabled selected="">Select</option>
					   <?php  while($rowsc=mysqli_fetch_assoc($resultcust)) { ?>
					    <option value='<?php echo $rowsc['id'];?>'>'<?php echo $rowsc['ppno'].'-'.$rowsc['cname'];?>'</option> <?php  } ?> 
					    </select>
					</div>
				
    			</fieldset>
 			</div>
 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Entry Date</legend>
    				<div class="form-group">
				    <label for="dated">Enter Date:</label>
				    <input type="date" class="form-control" placeholder="Enter Date" name="dated" id="dated">
				  </div>
    			</fieldset>
 			</div>
 		</div></br>

 		<div class="row">
 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Voucher Cost</legend>
    				<div class="form-group">
				    <label for="actualamt">Voucher Cost:</label>
				    <input type="text" class="form-control" placeholder="Enter Voucher Cost" name="actualamt" id="actualamt">
				  </div>
    			</fieldset>
 			</div>
 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Payment Required</legend>
    				<div class="form-group">
				    <label for="cpayment">Outstating Amount:</label>
				    <input type="text" class="form-control" placeholder="Enter Outstating Payment" name="cpayment" id="cpayment">
				  </div>
    			</fieldset>
 			</div>
 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Payment Made</legend>
    				<div class="form-group">
				    <label for="apaid">Paid Amount:</label>
				    <input type="text" class="form-control" placeholder="Payment Made" name="apaid" id="apaid">
				  </div>
    			</fieldset>
 			</div>
 		</div><br>
 		<div class="row">
 			<div class="col-12">
 			<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Notes</legend>
    				<div class="form-group">
				    <label for="notes">Enter Remarks:</label>
				    <textarea class="form-control" placeholder="Enter Remarks" name="notes" id="notes"></textarea> 
				  </div>
    		</fieldset>
    		</div>

 		</div>
 		</br><p align="center">
 			
 		<button type="submit" name="submit" class="btn btn-primary">Submit</button></p>
 		</form>
 		<br>
	 	<div class="row">
	 		 <!-- id 	voucher_id 	customer_id 	dated 	actualamt 	cpayment 	apaid 	arrears returneda  returndate 	totalpayment netp 	notes 	user_id  -->
	 		
	 		<div class="table-responsive">
	 			<table class="table table-striped" id="dataTable" style="width: 100%;">
			    <thead>
			      <tr>
			        <th>voucher_id</th>
			        <th width="20%">customer_id</th>
			        <th>dated</th>
			        <!-- <th>actualamt</th> -->
			        <th>cpayment</th>
			        <th>apaid</th>
			        <th>arrears</th>
			        <!-- <th>returneda</th>
			        <th>returndate</th> -->
			        <!-- <th>totalpayment</th> -->
			        <!-- <th>netp</th> -->
			        <th width="20%">notes</th>
			        <th>Edit</th>
			        <th>Delete</th>
			      </tr>
			    </thead>
			    <tbody>
			      
			         <?php 
                                   
                                    // $query = " SELECT * from data WHERE user_id=$user_id ORDER BY id DESC";
                                    
			         				$query = "SELECT * from customer INNER JOIN data ON data.customer_id= customer.id WHERE data.user_id=customer.user_id AND data.user_id=$user_id ORDER BY data.id DESC";

		    						$result = mysqli_query($conn,$query) or die( mysqli_error($conn));
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $voucher_id = $row['voucher_id'];
                                        $customer_id = $row['customer_id'];
                                        $dated = $row['dated'];
                                        $actualamt = $row['actualamt'];
                                        $cpayment = $row['cpayment'];
                                        $apaid = $row['apaid'];
                                        $arrears = $row['arrears'];
                                        //$returneda = $row['returneda'];
                                        //$returndate = $row['returndate'];
                                        $totalpayment = $row['totalpayment'];
                                        $netp = $row['netp'];
                                        $notes = $row['notes'];
                                        $id = $row['id'];
                                        $name = $row['cname'];
                                     

                            		?>
                                    <tr>
                                        <td><?php echo $voucher_id ?></td>
                                        <td><?php echo $customer_id .'-'.$name ?></td>
                                        <td><?php echo $dated ?></td>
                                        <!-- <td><?php echo $actualamt ?></td> -->
                                        <td><?php echo $cpayment ?></td>
                                        <td><?php echo $apaid ?></td>
                                        <td><?php echo $arrears ?></td>
                                        <!-- <td><?php echo $returneda ?></td>
                                        <td><?php echo $returndate ?></td> -->
                                        <!-- <td><?php echo $totalpayment ?></td> -->
                                        <!-- <td><?php echo $netp ?></td> -->
                                        <td><?php echo $notes ?></td>
                                        <td><a href="edit.php?edit=<?php echo $id; ?>"><span class="btn btn-primary">Edit</span></a></td>
                                        <td><a  href="delete.php?delete=<?php echo $id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><span class="btn btn-danger">Delete</span></a></td>
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

