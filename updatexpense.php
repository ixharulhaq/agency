<?php 

   include('db.php');
   session_start();

   if(isset($_POST['close'])){
   	header("Location:expense.php");
   }

///  <!-- id     ehead    user_id -->

    if(isset($_POST['exupdate']))
    {
    
    		$id=$_POST['id'];
    		$ehead = $_POST['ehead'];
                  
            

        $query = " UPDATE expense SET ehead = '".$ehead."' WHERE id='".$id."'";
        $result = mysqli_query($conn,$query);

        if($result)
        {
            header("location:expense.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    
    

}
?>