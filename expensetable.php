<?php include('header.php'); ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Search Record</h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Expense Table</h6><br>
                    <form action="export.php" method="POST">
                      <button type="submit" name="exportexpense" class="btn btn-primary">Export</button>
                    </form>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>ehead</th>
                      
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                     <?php 
                                   
                                    $query = "SELECT * from expense WHERE user_id=$user_id ORDER BY id DESC";
                                  
                      
                      // $query = "SELECT * from expense INNER JOIN expenditure ON expenditure.expense_id= expense.id WHERE expenditure.user_id=expense.user_id AND expenditure.user_id=$user_id ORDER BY expenditure.id DESC";

                    $result = mysqli_query($conn,$query) or die( mysqli_error($conn));;
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $ehead = $row['ehead'];
                                        
                                        
                                        $id = $row['id'];
                                        
                                    
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $ehead ?></td>
                                                                               
                                        
                                        
                                        
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


