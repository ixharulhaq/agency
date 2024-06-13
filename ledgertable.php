<?php include('header.php'); ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Search Record</h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ledgers Table</h6><br>
                    <form action="export.php" method="POST">
                      <button type="submit" name="exportledger" class="btn btn-primary">Export</button>
                    </form>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>agency_id</th>
                      <th>ldated</th>
                      <th>lticketno</th>
                      <th>ldescription</th>
                      <th>ldebit</th>
                      <th>lcredit</th>
                      <!-- <th>lbalance</th> -->
                    </tr>
                  </thead>
                  
                  <tbody>
                     <?php 
                                   
                      // $query = " SELECT * from ledger WHERE user_id=$user_id ORDER BY id DESC";
                                  
                      
                      $query = "SELECT * from agency INNER JOIN ledger ON ledger.agency_id= agency.id WHERE ledger.user_id=agency.user_id AND ledger.user_id=$user_id ORDER BY ledger.id DESC";

                    $result = mysqli_query($conn,$query) or die( mysqli_error($conn));;
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
                                        $aname = $row['aname'];
                                    
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $agency_id .'-'.$aname ?></td>
                                        <td><?php echo $ldated ?></td>
                                        <td><?php echo $lticketno ?></td>
                                        <td><?php echo $ldescription ?></td>
                                        <td><?php echo $ldebit ?></td>
                                        <td><?php echo $lcredit ?></td>
                                        <!-- <td><?php echo $lbalance ?></td> -->
                                        
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


