<?php 

    require_once("header.php");
    
    //  id  cname   ppno    cmobile     caddress    cstatus     user_id

    $id = $_GET['cedit'];
    $query = " SELECT * from customer WHERE id='".$id."'";
    $result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($result))
    {
            $cname = $row['cname'];
            $ppno = $row['ppno'];
            $cmobile = $row['cmobile'];
            $caddress = $row['caddress'];
                      
            
            $id = $row['id'];
    }

?>

<body class="bg-dark">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3">Update Record</h3>
                        </div>
                        <div class="card-body">
                            
                            <span></span>
                            <form action="updatcustomer.php" method="POST">
                            
                                <label>cname:</label><br />
                                <input type="text" class="form-control mb-2" name="cname" value="<?php echo $cname ?>" ><br />
                                <label>ppno:</label><br />
                                <input type="text" class="form-control mb-2" name="ppno" value="<?php echo $ppno ?>" ><br />
                                <label>cmobile:</label><br />
                                <input type="text" class="form-control mb-2" name="cmobile" value="<?php echo $cmobile ?>" ><br />
                                <label>caddress:</label><br />
                                <input type="text" class="form-control mb-2" name="caddress" value="<?php echo $caddress ?>"><br />
                                                                                                
                                <input type="hidden" class="form-control mb-2" name="id" value="<?php echo $id ?>">                                     
                                <button type="submit" class="btn btn-primary" name="cupdate">Update</button>
                                <button type="close" class="btn btn-danger" name="close">Close</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
