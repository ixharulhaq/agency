<?php 
include('db.php');

session_start();

$user_id = $_SESSION['id'];

//<!-- id   cname   ppno    cmobile     caddress    cstatus     user_id -->

if(isset($_POST['submit'])){


    
        if(empty($_POST['cname']) || empty($_POST['ppno']) || empty($_POST['cmobile']) || empty($_POST['caddress']))
        {
            
            $_SESSION['message6']="PLEASE FILL IN ALL FIELDS..!";
            header("location:customer.php") ;
        }
        else
        {
            $cname = $_POST['cname'];
            $ppno = $_POST['ppno'];
            $cmobile = $_POST['cmobile'];
            $caddress = $_POST['caddress'];
                                 
            

            $query = "INSERT into customer (cname, ppno, cmobile, caddress, user_id) VALUES ('$cname','$ppno','$cmobile','$caddress','$user_id')";
            $result = mysqli_query($conn,$query);

            if($result)
            {
                header("location:customer.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        header("location:index.php");
    }



?>

