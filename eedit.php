<?php 

    require_once("header.php");
    
    //  id  expense_id edated  eamount edescription  user_id 

    $id = $_GET['eedit'];
    $query = " SELECT * from expenditure WHERE id='".$id."'";
    $result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($result))
    {
            $expense_id = $row['expense_id'];
            $edated = $row['edated'];
            $eamount = $row['eamount'];
            $edescription = $row['edescription'];
            
            
            $id = $row['id'];
    }

?>

<body class="bg-dark">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3"> Update Record</h3>
                        </div>
                        <div class="card-body">
                            
                            <span></span>
                            <form action="updatexpenditure.php" method="POST">
                            
                                <label>expense_id:</label><br />
                                <input type="text" class="form-control mb-2" name="expense_id" value="<?php echo $expense_id ?>" readonly><br />
                                <label>edated:</label><br />
                                <input type="date" class="form-control mb-2" name="edated" value="<?php echo $edated ?>" ><br />
                                <label>eamount:</label><br />
                                <input type="text" class="form-control mb-2" name="eamount" value="<?php echo $eamount ?>"><br />
                                <label>edescription:</label><br />
                                <input type="text" class="form-control mb-2" name="edescription" value="<?php echo $edescription ?>"><br />
                                                                
                                <input type="hidden" class="form-control mb-2" name="id" value="<?php echo $id ?>">                                     
                                <button type="submit" class="btn btn-primary" name="eupdate">Update</button>
                                <button type="close" class="btn btn-danger" name="close">Close</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
