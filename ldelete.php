<?php 

        include("db.php");

        if(isset($_GET['ldelete']))
        {
            $id = $_GET['ldelete'];
            $query = " DELETE from ledger WHERE id = '".$id."'";
            $result = mysqli_query($conn,$query);

            if($result)
            {
                header("location:ledger.php");
            }
            else
            {
                echo ' Please Check Your Query ';
            }
        }
        else
        {
            header("location:ledger.php");
        }
?>