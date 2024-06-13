<?php 
include('header.php');
$message='';
 if(isset($_SESSION['message'])){
	$message=$_SESSION['message'];
	unset($_SESSION['message']);
	}
?>

 
 	</br>
 	<div class="container">
 		 	
			  <strong><center><?php echo $message; ?></center></strong><br>
			

 		<form method="POST" action="insertledger.php">

 		<div class="row">
 			
 			
 			<!-- id 	agency_id 	ldated 	lticketno 	ldescription 	ldebit 	lcredit 	lbalance 	user_id -->
 			
 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Agency </legend>
    				
				  <?php 


				  $user_id=$_SESSION['id'];
				  $aquery = " SELECT * from agency WHERE user_id=$user_id ORDER BY id ASC";
		    						$aresult = mysqli_query($conn,$aquery);?>
                                    
									  <div class="form-group">
					  <label for="agency_id">Agency Name:</label>
					  <select class="form-control" id="agency_id" name="agency_id">
					    <option disabled selected="">Select</option>
					   <?php  while($arows=mysqli_fetch_assoc($aresult)) { ?>
					    <option value='<?php echo $arows['id'];?>'>'<?php echo $arows['id'].'-'.$arows['aname'];?>'</option> <?php  } ?> 
					    </select>
					</div>
				
    			</fieldset>
 			</div>

 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Entry Date</legend>
    				<div class="form-group">
				    <label for="ldated">Enter Date:</label>
				    <input type="date" class="form-control" placeholder="Enter Date" name="ldated" id="ldated">
				  </div>
    			</fieldset>
 			</div>

 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Ticket Number</legend>
    				<div class="form-group">
				    <label for="lticketno ">Ticket #:</label>
				    <input type="text" class="form-control" placeholder="Enter Ticket #" name="lticketno" id="lticketno">
				  </div>
    			</fieldset>
 			</div>
 		</div></br>

 		<div class="row">
 			<div class="col-12">
 			<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Descriptions</legend>
    				<div class="form-group">
				    <label for="ldescription">Enter Details:</label>
				    <textarea class="form-control" placeholder="Enter Details" name="ldescription" id="ldescription"></textarea> 
				  </div>
    		</fieldset>
    		</div>

 		</div></br>

 		<div class="row">
 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Debit</legend>
    				<div class="form-group">
				    <label for="ldebit">Debit Amount:</label>
				    <input type="text" class="form-control" placeholder="Enter Debit Amount" name="ldebit" id="ldebit" value=0>
				  </div>
    			</fieldset>
 			</div>
 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Credit</legend>
    				<div class="form-group">
				    <label for="lcredit">Credit Amount:</label>
				    <input type="text" class="form-control" placeholder="Enter Credit Amount" name="lcredit" id="lcredit" value=0>
				  </div>
    			</fieldset>
 			</div>
 			<div class="col-4"><?php  
 				$bquery = "SELECT SUM(lbalance) as balance from ledger WHERE user_id=$user_id";
 				$bresult = mysqli_query($conn,$bquery);
 				$brow = mysqli_fetch_assoc($bresult);
 				$sum=$brow['balance'];
 				?>
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Balance Summary</legend>
    				<div class="form-group">
				    <label for="lbalance" >Balance: </label>
				    <input style="background-color: #3CBC8D; color: white;  text-align: center" type="text" class="form-control" placeholder="" name="lbalance" id="lbalance" value='<?php echo $sum;?>' Readonly>
				  </div>
    			</fieldset>
 			</div>
 		</div><br>
 		
 		</br><p align="center">
 		<button type="submit" name="submit" class="btn btn-primary">Submit</button>
 		</form></p>
 		<br>

 		<!-- Retriew Data -->
 		<!-- id 	agency_id 	ldated 	lticketno 	ldescription 	ldebit 	lcredit 	lbalance 	user_id -->

 		<div class="row">
	 		 
	 		
	 		<div class="table-responsive">
	 			<table class="table table-striped" id="dataTable" style="width: 100%;">
			    <thead>
			      <tr>
			        <th>agency_id</th>
			        <th>ldated</th>
			        <th>lticketno</th>
			        <th width="30%;">ldescription</th>
			        <th>ldebit</th>
			        <th>lcredit</th>
			        <th>lbalance</th>
			        <!-- <th>user_id</th> -->
			        <th>Edit</th>
			        <th>Delete</th>
			      </tr>
			    </thead>
			    <tbody>
			      
			         <?php 
                                   
                                    // $query = " SELECT * from ledger WHERE user_id=$user_id ORDER BY id DESC";
                                  
			         				
			         				$query = "SELECT * from agency INNER JOIN ledger ON ledger.agency_id= agency.id WHERE ledger.user_id=agency.user_id AND ledger.user_id=$user_id ORDER BY ledger.id DESC";

		    						$result = mysqli_query($conn,$query) or die( mysqli_error($conn));;
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $agency_id = $row['agency_id'];
                                        $ldated = $row['ldated'];
                                        $lticketno = $row['lticketno'];
                                        $ldescription = $row['ldescription'];
                                        $ldebit = $row['ldebit'];
                                        $lcredit = $row['lcredit'];
                                        $lbalance = $row['lbalance'];
                                        // $user_id = $row['user_id'];
                                        $id = $row['id'];
                                        $aname = $row['aname'];
                                    
                            		?>
                                    <tr>
                                        
                                        <td><?php echo $agency_id .'-'.$aname ?></td>
                                        <td><?php echo $ldated ?></td>
                                        <td><?php echo $lticketno ?></td>
                                        <td><?php echo $ldescription ?></td>
                                        <td><?php echo $ldebit ?></td>
                                        <td><?php echo $lcredit ?></td>
                                        <td><?php echo $lbalance ?></td>
                                        <!-- <td><?php echo $user_id ?></td> -->
                                        <td><a href="ledit.php?ledit=<?php echo $id; ?>"><span class="btn btn-primary">Edit</span></a></td>
                                        <td><a  href="ldelete.php?ldelete=<?php echo $id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><span class="btn btn-danger">Delete</span></a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?> 
			      
			     </tbody>
			  </table>
	 		</div>
	 	</div>

	</div>
 



<!-- disable fields -->
<script type="text/javascript">
var inp1 = document.getElementById("ldebit");
inp1.oninput = function () {
    document.getElementById("lcredit").disabled = this.value != "";
	inp2.value=0;
	if (inp1.value == "") {
		inp2.value=0;
	}

};

var inp2 = document.getElementById("lcredit");
inp2.oninput = function () {
    document.getElementById("ldebit").disabled = this.value != "";
    inp1.value=0;
    if (inp2.value == "") {
		inp1.value=0;
	}

};

</script>

<?php include('footer.php'); ?>