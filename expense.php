<?php 
include('header.php');
$user_id=$_SESSION['id'];
$message7='';
 if(isset($_SESSION['message7'])){
	$message7=$_SESSION['message7'];
	unset($_SESSION['message7']);
	}
?>


 	</br>
 	<div class="container">
 		 	
			  <strong><center><?php echo $message7; ?></center></strong><br>
			

 		<form method="POST" action="insertexpense.php">

 		<div class="row">
 			
 			<!-- id 	ehead	user_id -->

 			
 			<div class="col-4">
 				<fieldset class="scheduler-border">
    				<legend class="scheduler-border">Expediture Head</legend>
    				<div class="form-group">
				    <label for="ehead">Enter Expediture Head:</label>
				    <input type="text" class="form-control" placeholder="Enter Expenditure Head" name="ehead" id="ehead">
				  </div>
    			</fieldset>
 			</div>

 			
 		</div></br>

 		<br>
 		
 		</br><p align="center">
 		<button type="submit" name="submit" class="btn btn-primary">Submit</button>
 		</form></p>
 		<br>

 		<!-- Retriew Data -->
 		<!-- id 	ehead 	user_id -->

 		<div class="row">
	 		 
	 		
	 		<div class="table-responsive">
	 			<table class="table table-striped" id="dataTable" style="width: 100%;">
			    <thead>
			      <tr>
			        <th>ehead</th>
			        
			        <th>Edit</th>
			        <th>Delete</th>
			      </tr>
			    </thead>
			    <tbody>
			      
			         <?php 
                                   
                                    $query = "SELECT * from expense WHERE user_id=$user_id ORDER BY id DESC";
                                  
			         				
			         				// $query = "SELECT * from expense INNER JOIN expenditure ON expenditure.expense_id= expense.id WHERE expenditure.user_id=expense.user_id AND expenditure.user_id=$user_id ORDER BY expenditure.id DESC";

		    						$result = mysqli_query($conn,$query) or die( mysqli_error($conn));;
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $ehead = $row['ehead'];
                                        
                                        
                                        $id = $row['id'];
                                        
                                    
                            		?>
                                    <tr>
                                        
                                        <td><?php echo $ehead ?></td>
                                        
                                                                               
                                        
                                        
                                        <td><a href="exedit.php?exedit=<?php echo $id; ?>"><span class="btn btn-primary">Edit</span></a></td>
                                        <td><a  href="exdelete.php?exdelete=<?php echo $id; ?>" onclick="return confirm('Security Check! Are you sure you want to delete? This will also delete all the other records linked with this Expense.');"><button type="button" class="btn btn-lg btn-danger" style="font-size: 14px;" disabled>Delete</button></a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?> 
			      
			     </tbody>
			  </table>
	 		</div>
	 	</div>

	</div>
 



<script>
function myFunction() {
  var x = document.getElementById("myBtn").disabled;
  document.getElementById("demo").innerHTML = x;
}
</script>

<?php include('footer.php'); ?>

