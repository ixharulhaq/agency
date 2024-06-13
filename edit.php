<?php 

    require_once("header.php");
    
    
    $id = $_GET['edit'];
    $query = " SELECT * from data WHERE id='".$id."'";
    $result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($result))
    {
            $voucher_id = $row['voucher_id'];
            $customer_id = $row['customer_id'];
            $dated = $row['dated'];
            $actualamt = $row['actualamt'];
            $cpayment = $row['cpayment'];
            $apaid = $row['apaid'];
            $arrears = $row['arrears'];
            $returneda = $row['returneda'];
            $returndate = $row['returndate'];
            $totalpayment = $row['totalpayment'];
            $netp = $row['netp'];
            $notes = $row['notes'];
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
                            <form action="updatedata.php" method="POST">
                            
                                <label>voucher_id:</label><br />
                                <input type="text" class="form-control mb-2" name="voucher_id" value="<?php echo $voucher_id ?>"><br />
                                <label>customer_id:</label><br />
                                <input type="text" class="form-control mb-2" name="customer_id" value="<?php echo $customer_id ?>" readonly><br />
                                <label>dated:</label><br />
                                <input type="date" class="form-control mb-2" name="dated" value="<?php echo $dated ?>"><br />
                                <label>actualamt:</label><br />
                                <input type="text" class="form-control mb-2" name="actualamt" value="<?php echo $actualamt ?>"><br />
                                <label>cpayment:</label><br />
                                <input type="text" class="form-control mb-2" name="cpayment" value="<?php echo $cpayment ?>"><br />
                                <label>apaid:</label><br />
                                <input type="text" class="form-control mb-2" name="apaid" value="<?php echo $apaid ?>"><br />
                                <label>arrears:</label><br />
                                <input type="text" class="form-control mb-2" name="arrears" value="<?php echo $arrears ?>" readonly><br />
                                <label>returneda:</label><br />
                                <input type="text" class="form-control mb-2" name="returneda" value="<?php echo $returneda ?>"><br />
                                <label>returndate:</label><br />
                                <input type="date" class="form-control mb-2" name="returndate" value="<?php echo $returndate ?>" readonly><br />
                                <label>totalpayment:</label><br />
                                <input type="text" class="form-control mb-2 " name="totalpayment" value="<?php echo $totalpayment ?>" readonly><br />
                                <label>netp:</label><br />
                                <input type="text" class="form-control mb-2" name="netp" value="<?php echo $netp ?>" readonly><br />
                                <label>notes:</label><br />
                                <input type="text" class="form-control mb-2" name="notes" value="<?php echo $notes ?>" readonly><br />
                                 <input type="hidden" class="form-control mb-2" name="id" value="<?php echo $id ?>">                                     
                                <button type="submit" class="btn btn-primary" name="update">Update</button>
                                <button type="close" class="btn btn-danger" name="close">Close</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
