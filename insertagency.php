<?php 
include('db.php');

session_start();

$user_id = $_SESSION['id'];

//<!-- id     aname   aphone  aaddress    astatus     user_id -->

if(isset($_POST['submit'])){


    
        if(empty($_POST['aname']) || empty($_POST['aphone']) || empty($_POST['aaddress']))
        {
            
            $_SESSION['message5']="PLEASE FILL IN ALL FIELDS..!";
            header("location:agency.php") ;
        }
        else
        {
            $aname = $_POST['aname'];
            $aphone = $_POST['aphone'];
            $aaddress = $_POST['aaddress'];
                                 
            

            $query = "INSERT into agency (aname, aphone, aaddress, user_id) VALUES ('$aname','$aphone','$aaddress','$user_id')";
            $result = mysqli_query($conn,$query);

            if($result)
            {
                header("location:agency.php");
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

