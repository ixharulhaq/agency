<?php include('header.php'); 

$user_id=$_SESSION['id'];


?>



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">
            
            
                
            <!-- Total Earnings Card Example -->

            <?php  
            $query="SELECT SUM(netp) AS profit FROM data WHERE user_id=$user_id";
                $qt=mysqli_query($conn,$query) or die( mysqli_error($conn));
                $nt=mysqli_fetch_array($qt);
                
                   $profit = $nt['profit'];
                   
            ?>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Revenues</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rs.<?php echo $profit; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Expense Card Example -->

            <?php  
            $query="SELECT SUM(eamount) AS texpense FROM expenditure WHERE user_id=$user_id";
                $qt=mysqli_query($conn,$query) or die( mysqli_error($conn));
                $nt=mysqli_fetch_array($qt);
                
                   $texpense = $nt['texpense'];
                   
            ?>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Expenditures</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rs.<?php echo $texpense; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Profit & Loss</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rs. <?php 
                      $netpl=$profit-$texpense;
                      echo $netpl;
                      $round='';
                      if(!$profit==0){
                      $percent=$texpense/$profit*100;
                      $round=round($percent);}
                       ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">E2R Ratio</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">

                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $round; ?>%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <?php if($round>50) {?>
                            <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $round; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          <?php }else {?>
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $round; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          <?php } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
          </div>

          <!-- Content Row -->
          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->

            <?php  
            $query="SELECT SUM(arrears) AS tarrears FROM data WHERE user_id=$user_id";
                $qt=mysqli_query($conn,$query) or die( mysqli_error($conn));
                $nt=mysqli_fetch_array($qt);
                
                   $tarrears = $nt['tarrears'];
                   
            ?>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Arrears</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-tarrears;800">Rs. <?php echo $tarrears; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <?php  
              $bquery = "SELECT SUM(lbalance) as balance from ledger WHERE user_id=$user_id";
              $bresult = mysqli_query($conn,$bquery);
              $brow = mysqli_fetch_assoc($bresult);
              $sum=$brow['balance'];
            ?>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Ledger Balance</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rs. <?php echo $sum; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <?php 
           
            $sql = "SELECT * FROM customer WHERE user_id=$user_id";
   
             if ($result = mysqli_query($conn,$sql)){
                $crowcount = mysqli_num_rows($result);
              
            }

             ?>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Registered Customers</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $crowcount; ?></div>
                        </div>
                        <div class="col">
                          <!-- <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div> -->
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <?php 
           
            $sql = "SELECT * FROM agency WHERE user_id=$user_id";
   
             if ($result = mysqli_query($conn,$sql)){
                  $arowcount = mysqli_num_rows($result);
              
            }

             ?>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Registered Agencies</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $arowcount; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          

          <!-- Content Row -->

          <div class="row">
          
          
            <!-- Area Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Revenues vs Expenses</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                    
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Revenues
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-danger"></i> Expenses
                    </span>
                    
                  </div>
                </div>
              </div>
            </div>

            <!-- Area Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Net Profit vs Arrears</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart2"></canvas>
                    
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Net Profit
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-danger"></i> Arrears
                    </span>
                    
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Customers vs Agencies</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart3"></canvas>
                    
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Customers
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-danger"></i> Agencies
                    </span>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>


<?php include ('footer.php'); ?>
</div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<!-- Sending Variable to Chart-pi-demo.Js file -->
<script> 
      var profit = <?php echo json_encode($profit); ?>;
      localStorage.setItem("GetProfit", profit);
      var texpense = <?php echo json_encode($texpense); ?>;
      localStorage.setItem("GetExpense", texpense);  
</script>

<script> 
      var netpl = <?php echo json_encode($netpl); ?>;
      localStorage.setItem("GetNProfit", $netpl);
      var tarrears = <?php echo json_encode($tarrears); ?>;
      localStorage.setItem("GetArrears", tarrears);  
</script>

<script> 
      var crowcount = <?php echo json_encode($crowcount); ?>;
      localStorage.setItem("GetCust", crowcount);
      var arowcount = <?php echo json_encode($arowcount); ?>;
      localStorage.setItem("GetAgency", arowcount);  
</script>

