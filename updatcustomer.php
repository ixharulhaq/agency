<?php 

   include('db.php');
   session_start();

   if(isset($_POST['close'])){
   	header("Location:customer.php");
   }

///  id  cname   ppno    cmobile     caddress    cstatus     user_id

    if(isset($_POST['cupdate']))
    {
    
    		$id=$_POST['id'];
    		$cname = $_POST['cname'];
        $ppno = $_POST['ppno'];
        $cmobile = $_POST['cmobile'];
        $caddress = $_POST['caddress'];
            
            

        $query = " UPDATE customer SET cname = '".$cname."', ppno='".$ppno."', cmobile='".$cmobile."', caddress='".$caddress."' WHERE id='".$id."'";
        $result = mysqli_query($conn,$query);

        if($result)
        {
            header("location:customer.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    
    

}
?>