<?php 
include('db.php');

session_start();

$user_id = $_SESSION['id'];

//<!-- id     ehead    user_id -->

if(isset($_POST['submit'])){

echo $_POST['submit'];
    
        if(empty($_POST['ehead']))
        {

            $_SESSION['message7']="PLEASE FILL IN ALL FIELDS..!";
            header("location:expense.php") ;
        }
        else
        {
            $ehead = $_POST['ehead'];
                                           
            

            $query = "INSERT into expense (ehead, user_id) VALUES ('$ehead', '$user_id')";
            $result = mysqli_query($conn,$query);

            if($result)
            {
                header("location:expense.php");
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

