<?php 

        include("db.php");

        if(isset($_GET['exdelete']))
        {
            $id = $_GET['exdelete'];
            $query = " DELETE from expense WHERE id = '".$id."'";
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
        else
        {
            header("location:expense.php");
        }
?>