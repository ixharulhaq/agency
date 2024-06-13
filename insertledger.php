<?php 
include('db.php');

session_start();

$user_id = $_SESSION['id'];

// id   agency_id   ldated  lticketno   ldescription    ldebit  lcredit     lbalance    user_id

if(isset($_POST['submit'])){


    
        if(empty($_POST['agency_id']) || empty($_POST['ldated']) || empty($_POST['lticketno']) || empty($_POST['ldescription']))
        {
            
            $_SESSION['message']="PLEASE FILL IN ALL FIELDS..!";
            header("location:ledger.php") ;
        }
        else
        {
            $agency_id = $_POST['agency_id'];
            $ldated = $_POST['ldated'];
            $lticketno = $_POST['lticketno'];
            $ldescription = $_POST['ldescription'];
            $ldebit = $_POST['ldebit'];
            $lcredit = $_POST['lcredit'];

            if($ldebit>0){
            $lcredit=0;
            $lbalance=0; 
            }
            if($lcredit>0){
            $ldebit=0;
            $lbalance=0; 
            }


            $lbalance = $lbalance +  $ldebit - $lcredit;            
            

            $query = "INSERT into ledger (agency_id, ldated, lticketno, ldescription, ldebit, lcredit, lbalance, user_id) VALUES ('$agency_id','$ldated','$lticketno','$ldescription','$ldebit','$lcredit','$lbalance','$user_id')";
            $result = mysqli_query($conn,$query);

            if($result)
            {
                header("location:ledger.php");
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

