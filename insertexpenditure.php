<?php 
include('db.php');

session_start();

$user_id = $_SESSION['id'];

// id  expense_id  edated  edescription   eamount   user_id 

if(isset($_POST['submit'])){


    
        if(empty($_POST['expense_id']) || empty($_POST['edated'])  || empty($_POST['edescription']) || empty($_POST['eamount']))
        {
            
            $_SESSION['message4']="PLEASE FILL IN ALL FIELDS..!";
            header("location:expenditure.php") ;
        }
        else
        {
            $expense_id = $_POST['expense_id'];
            $edated = $_POST['edated'];
            $eamount = $_POST['eamount'];
            $edescription = $_POST['edescription'];
                      
            

            $query = "INSERT into expenditure (expense_id, edated, eamount, edescription, user_id) VALUES ('$expense_id','$edated','$eamount','$edescription','$user_id')";
            $result = mysqli_query($conn,$query);

            if($result)
            {
                header("location:expenditure.php");
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

