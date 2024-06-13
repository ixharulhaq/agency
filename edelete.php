<?php 

        include("db.php");

        if(isset($_GET['edelete']))
        {
            $id = $_GET['edelete'];
            $query = " DELETE from expenditure WHERE id = '".$id."'";
            $result = mysqli_query($conn,$query);

            if($result)
            {
                header("location:expenditure.php");
            }
            else
            {
                echo ' Please Check Your Query ';
            }
        }
        else
        {
            header("location:expenditure.php");
        }
?>