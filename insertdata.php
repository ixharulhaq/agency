<?php 
include('db.php');

session_start();


$user_id = $_SESSION['id'];



// id 	voucher_id 	customer_id 	dated 	actualamt 	cpayment 	apaid 	arrears returneda  returndate 	totalpayment netp 	notes 	user_id 

if(isset($_POST['submit']))
    {
        if(empty($_POST['voucher_id']) || empty($_POST['customer_id']) || empty($_POST['dated']) || empty($_POST['actualamt']) || empty($_POST['cpayment']) || empty($_POST['apaid']))
        {
            $_SESSION['message2']="PLEASE FILL IN ALL FIELDS..!";
            header("location:home.php") ;
        }
        else
        {
            $voucher_id = $_POST['voucher_id'];
            $customer_id = $_POST['customer_id'];
            $dated = $_POST['dated'];
            $actualamt = $_POST['actualamt'];
            $cpayment = $_POST['cpayment'];
            $apaid = $_POST['apaid'];
            $arrears = $apaid - $cpayment;
            $returnedam = 0;
            //$returndate = now();
           
            $totalpayment = $apaid + $returnedam;
            $netp = $totalpayment - $actualamt;

            $notes = $_POST['notes'];
                  
            
            $query = "INSERT into data(voucher_id, customer_id, dated, actualamt, cpayment, apaid, arrears, returnedam, returndate, totalpayment, netp, notes, user_id) VALUES('$voucher_id','$customer_id','$dated','$actualamt','$cpayment','$apaid','$arrears','$returnedam', now(), '$totalpayment','$netp','$notes','$user_id')";
            $result = mysqli_query($conn,$query);

            if($result)
            {
                header("location:home.php");
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