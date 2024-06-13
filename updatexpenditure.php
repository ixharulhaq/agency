<?php 

   include('db.php');
   session_start();

   if(isset($_POST['close'])){
   	header("Location:expenditure.php");
   }

//  id  expense_id edated  eamount edescription  user_id 

    if(isset($_POST['eupdate']))
    {
    
    		$id=$_POST['id'];
    		$expense_id = $_POST['expense_id'];
            $edated = $_POST['edated'];
            $eamount = $_POST['eamount'];
            $edescription = $_POST['edescription'];
            

        $query = " UPDATE expenditure SET expense_id = '".$expense_id."', edated='".$edated."', eamount='".$eamount."', edescription='".$edescription."' WHERE id='".$id."'";
        $result = mysqli_query($conn,$query);

        if($result)
        {
            header("location:expenditure.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    
    

}
?>