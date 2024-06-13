<?php 

   include('db.php');
   session_start();

   if(isset($_POST['close'])){
   	header("Location:home.php");
   }

    if(isset($_POST['update']))
    {
    
    		$id=$_POST['id'];
    		$voucher_id = $_POST['voucher_id'];
            $customer_id = $_POST['customer_id'];
            $dated = $_POST['dated'];
            $actualamt = $_POST['actualamt'];
            $cpayment = $_POST['cpayment'];
            $apaid = $_POST['apaid'];
            $arrears = $_POST['arrears'];
            $returneda = $_POST['returneda'];
            $returndate = $_POST['returndate'];
            $totalpayment = $_POST['totalpayment'];
            $netp = $_POST['netp'];
            $notes = $_POST['notes'];

            	
          if ($returneda > ((-1)*$arrears)) {
          		
          		$_SESSION['message3'] = "ok";
          		header("location:home.php");
          		 		      		 
          					
				exit();
          		

			}  


            if($apaid==$cpayment){
            	$returneda = 0;
            	$notes = "Amount Adjusted";
            }

            $apaid = $apaid + $returneda;
            $arrears = $apaid - $cpayment + $retunreda;
            $totalpayment = $apaid;
            $netp = $totalpayment - $actualamt;

            if($apaid==$cpayment){
            	$returneda = 0;
            	$notes = "Amount Adjusted";
            }
            if($apaid<$cpayment){
            	$notes = "Pending Arrears";
            }
            


            // if($apaid>$cpayment){
            // 	$arrears = 0;
            // 	$totalpayment = 0;
            // 	$netp = 0;
            // 	$notes = 0;
            // 	echo "Paid Amount is greater than Payments, Please re-check!";
            // 	exit;
            // }

            


    
        
        $query = "UPDATE data SET voucher_id = '".$voucher_id."', customer_id='".$customer_id."', dated='".$dated."', actualamt='".$actualamt."', cpayment = '".$cpayment."', apaid='".$apaid."', arrears='".$arrears."', returneda='".$returneda."', returndate = now(), totalpayment='".$totalpayment."', netp='".$netp."', notes='".$notes."' WHERE id='".$id."'";
        $result = mysqli_query($conn,$query);

        if($result)
        {
            header("location:home.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    
    

}
?>