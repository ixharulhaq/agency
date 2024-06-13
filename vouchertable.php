<?php include('header.php'); ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Search Record</h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Vouchers Table</h6><br>
                    <form action="export.php" method="POST">
                      <button type="submit" name="exportvoucher" class="btn btn-primary">Export</button>
                    </form>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>voucher_id</th>
                      <th>customer_id</th>
                      <th>dated</th>
                      <th>actualamt</th>
                      <th>cpayment</th>
                      <th>apaid</th>
                      <th>arrears</th>
                      <th>returneda</th>
                      <th>returndate</th>
                      <th>totalpayment</th>
                      <th>netp</th>
                      <th>notes</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                     <?php 
                                   
                      // $query = " SELECT * from data WHERE user_id=$user_id ORDER BY id ASC";
                                    
                      $query = "SELECT * from customer INNER JOIN data ON data.customer_id= customer.id WHERE data.user_id=customer.user_id AND data.user_id=$user_id ORDER BY data.id DESC";

                    $result = mysqli_query($conn,$query) or die( mysqli_error($conn));
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
                                        $name = $row['cname'];
                                     

                                ?>
                                    <tr>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $voucher_id ?></td>
                                        <td><?php echo $customer_id.'-'.$name?></td>
                                        <td><?php echo $dated ?></td>
                                        <td><?php echo $actualamt ?></td>
                                        <td><?php echo $cpayment ?></td>
                                        <td><?php echo $apaid ?></td>
                                        <td><?php echo $arrears ?></td>
                                        <td><?php echo $returneda ?></td>
                                        <td><?php echo $returndate ?></td>
                                        <td><?php echo $totalpayment ?></td>
                                        <td><?php echo $netp ?></td>
                                        <td><?php echo $notes ?></td>
                                        
                                    </tr>        
                            <?php 
                                    }  
                            ?> 
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include('footer.php'); ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
 

 

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>


