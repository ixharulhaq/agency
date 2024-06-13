<?php 

    require_once("header.php");
    
    // id     agency_id   ldated  lticketno   ldescription   ldebit  lcredit     lbalance    user_id

    $id = $_GET['ledit'];
    $query = " SELECT * from ledger WHERE id='".$id."'";
    $result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($result))
    {
            $agency_id = $row['agency_id'];
            $ldated = $row['ldated'];
            $lticketno = $row['lticketno'];
            $ldescription = $row['ldescription'];
            $ldebit = $row['ldebit'];
            $lcredit = $row['lcredit'];
            $lbalance = $row['lbalance'];
            
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
                            <form action="updateledger.php" method="POST">
                            
                                <label>agency_id:</label><br />
                                <input type="text" class="form-control mb-2" name="agency_id" value="<?php echo $agency_id ?>" readonly><br />
                                <label>ldated:</label><br />
                                <input type="date" class="form-control mb-2" name="ldated" value="<?php echo $ldated ?>" ><br />
                                <label>lticketno:</label><br />
                                <input type="text" class="form-control mb-2" name="lticketno" value="<?php echo $lticketno ?>"><br />
                                <label>ldescription:</label><br />
                                <input type="text" class="form-control mb-2" name="ldescription" value="<?php echo $ldescription ?>"><br />
                                <label>ldebit:</label><br />
                                
                                <input type="text" class="form-control mb-2" name="ldebit" value="<?php echo $ldebit ?>" <?php if($ldebit==0) echo "readonly"; ?>><br />
                                <label>lcredit:</label><br />

                                <input type="text" class="form-control mb-2" name="lcredit" value="<?php echo $lcredit ?>" <?php if($lcredit==0) echo "readonly"; ?>><br />
                                <label>lbalance:</label><br />
                                <input type="text" class="form-control mb-2" name="lbalance" value="<?php echo $lbalance ?>" readonly><br />
                                
                                <input type="hidden" class="form-control mb-2" name="id" value="<?php echo $id ?>">                                     
                                <button type="submit" class="btn btn-primary" name="lupdate">Update</button>
                                <button type="close" class="btn btn-danger" name="close">Close</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
