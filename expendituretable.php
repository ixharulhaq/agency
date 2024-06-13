<?php include('header.php'); ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Search Record</h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Expenditures Table</h6><br>
                    <form action="export.php" method="POST">
                      <button type="submit" name="exportexpenditure" class="btn btn-primary">Export</button>
                    </form>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>expense_id</th>
                      <th>edated</th>
                      <th>eamount</th>
                      <th>edescription</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                     <?php 
                                   
                                    // $query = "SELECT * from expenditure WHERE user_id=$user_id ORDER BY id DESC";
                                  
                      
                      $query = "SELECT * from expense INNER JOIN expenditure ON expenditure.expense_id= expense.id WHERE expenditure.user_id=expense.user_id AND expenditure.user_id=$user_id ORDER BY expenditure.id DESC";

                    $result = mysqli_query($conn,$query) or die( mysqli_error($conn));;
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $expense_id = $row['expense_id'];
                                        $edated = $row['edated'];
                                        $eamount = $row['eamount'];
                                        $edescription = $row['edescription'];
                                        $id = $row['id'];
                                        $ehead = $row['ehead'];
                                    
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $expense_id.'-'.$ehead ?></td>
                                        <td><?php echo $edated ?></td>
                                        <td><?php echo $eamount ?></td>
                                        <td><?php echo $edescription ?></td>
                                        
                                                                                
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


