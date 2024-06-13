<?php 

    require_once("header.php");
    
    //  <!-- id     aname   aphone  aaddress    astatus     user_id -->

    $id = $_GET['agedit'];
    $query = " SELECT * from agency WHERE id='".$id."'";
    $result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($result))
    {
            $aname = $row['aname'];
            $aphone = $row['aphone'];
            $aaddress = $row['aaddress'];
                      
            
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
                            <form action="updatagency.php" method="POST">
                            
                                <label>aname:</label><br />
                                <input type="text" class="form-control mb-2" name="aname" value="<?php echo $aname ?>" ><br />
                                <label>aphone:</label><br />
                                <input type="text" class="form-control mb-2" name="aphone" value="<?php echo $aphone ?>" ><br />
                                <label>aaddress:</label><br />
                                <input type="text" class="form-control mb-2" name="aaddress" value="<?php echo $aaddress ?>"><br />
                                                                                                
                                <input type="hidden" class="form-control mb-2" name="id" value="<?php echo $id ?>">                                     
                                <button type="submit" class="btn btn-primary" name="agupdate">Update</button>
                                <button type="close" class="btn btn-danger" name="close">Close</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
