<?php 

        include("db.php");

        if(isset($_GET['agdelete']))
        {
            $id = $_GET['agdelete'];
            $query = " DELETE from agency WHERE id = '".$id."'";
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
        else
        {
            header("location:agency.php");
        }
?>