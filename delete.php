<?php 

        include("db.php");

        if(isset($_GET['delete']))
        {
            $id = $_GET['delete'];
            $query = " DELETE from data WHERE id = '".$id."'";
            $result = mysqli_query($conn,$query);

            if($result)
            {
                header("location:home.php");
            }
            else
            {
                echo ' Please Check Your Query ';
            }
        }
        else
        {
            header("location:data.php");
        }
?>