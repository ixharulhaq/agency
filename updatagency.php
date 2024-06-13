<?php 

   include('db.php');
   session_start();

   if(isset($_POST['close'])){
   	header("Location:agency.php");
   }

///  <!-- id     aname   aphone  aaddress    astatus     user_id -->

    if(isset($_POST['agupdate']))
    {
    
    		$id=$_POST['id'];
    		$aname = $_POST['aname'];
            $aphone = $_POST['aphone'];
            $aaddress = $_POST['aaddress'];
            
            

        $query = " UPDATE agency SET aname = '".$aname."', aphone='".$aphone."', aaddress='".$aaddress."' WHERE id='".$id."'";
        $result = mysqli_query($conn,$query);

        if($result)
        {
            header("location:agency.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    
    

}
?>