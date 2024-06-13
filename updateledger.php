<?php 

   include('db.php');
   session_start();

   if(isset($_POST['close'])){
   	header("Location:ledger.php");
   }

// id     agency_id   ldated  lticketno   ldescription   ldebit  lcredit     lbalance    user_id

    if(isset($_POST['lupdate']))
    {
    
    		$id=$_POST['id'];
    		$agency_id = $_POST['agency_id'];
            $ldated = $_POST['ldated'];
            $lticketno = $_POST['lticketno'];
            $ldescription = $_POST['ldescription'];
            $ldebit = $_POST['ldebit'];
            $lcredit = $_POST['lcredit'];
            $lbalance = $_POST['lbalance'];
            
            $lbalance =  $ldebit - $lcredit;

        $query = " UPDATE ledger SET agency_id = '".$agency_id."', ldated='".$ldated."', lticketno='".$lticketno."', ldescription='".$ldescription."', ldebit = '".$ldebit."', lcredit='".$lcredit."', lbalance='".$lbalance."' WHERE id='".$id."'";
        $result = mysqli_query($conn,$query);

        if($result)
        {
            header("location:ledger.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    
    

}
?>