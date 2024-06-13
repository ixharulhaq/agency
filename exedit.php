<?php 

    require_once("header.php");
    
    //  <!-- id     ehead     user_id -->

    $id = $_GET['exedit'];
    $query = " SELECT * from expense WHERE id='".$id."'";
    $result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($result))
    {
            $ehead = $row['ehead'];
                                  
            
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
                            <form action="updatexpense.php" method="POST">
                            
                                <label>ehead:</label><br />
                                <input type="text" class="form-control mb-2" name="ehead" value="<?php echo $ehead ?>" ><br />
                                
                                                                                                
                                <input type="hidden" class="form-control mb-2" name="id" value="<?php echo $id ?>">                                     
                                <button type="submit" class="btn btn-primary" name="exupdate">Update</button>
                                <button type="close" class="btn btn-danger" name="close">Close</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
