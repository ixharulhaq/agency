<?php include('header.php'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          

        
        <!-- /.container-fluid -->
        
        <div class="row">
		<div class="col-12">
		<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daily Profit</h6>
            </div>
            <div class="card-body">
		<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="150px;">Date</th>
                      <th width="300px;">Total Profit/Loss (Excluding Expenses)</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>

            <?php  
            $query="SELECT DATE(dated) as ddate, SUM(netp) as netprofit FROM data WHERE user_id=$user_id GROUP BY dated";
            $dr=mysqli_query($conn,$query) or die( mysqli_error($conn));
            while($drow=mysqli_fetch_assoc($dr))
                                    {
                                        $ddate = $drow['ddate'];
                                        $netprofit = $drow['netprofit'];
                                                                            
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $ddate ?></td>
                                        <td><?php echo $netprofit ?></td>
                                        
                                        
                                    </tr>        
                            <?php 
                                    }  
                            ?> 
                  </tbody>
              </table>
          </div></div></div></div></div>
          

<br><br>

<div class="row">
		<div class="col-12">
		<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Monthly Profit</h6>
            </div>
            <div class="card-body">
		<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="150px;">Month</th>
                      <th width="300px;">Total Profit/Loss (Excluding Expenses)</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>

            <?php  
            $query="SELECT MONTHNAME(dated) as month, SUM(netp) as mprofit FROM data WHERE user_id=$user_id GROUP BY month";
            $dr=mysqli_query($conn,$query) or die( mysqli_error($conn));
            while($drow=mysqli_fetch_assoc($dr))
                                    {
                                        $month = $drow['month'];
                                        $mprofit = $drow['mprofit'];
                                                                            
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $month ?></td>
                                        <td><?php echo $mprofit ?></td>
                                        
                                        
                                    </tr>        
                            <?php 
                                    }  
                            ?> 
                  </tbody>
              </table>
          </div>
          </div></div></div></div>
<br><br>

<div class="row">
		<div class="col-12">
		<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Yearly Profit</h6>
            </div>
            <div class="card-body">
		<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="150px;">Year</th>
                      <th width="300px;">Total Profit/Loss (Excluding Expenses)</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>

            <?php  
            $query="SELECT YEAR(dated) as year, SUM(netp) as yprofit FROM data WHERE user_id=$user_id GROUP BY year";
            $dr=mysqli_query($conn,$query) or die( mysqli_error($conn));
            while($drow=mysqli_fetch_assoc($dr))
                                    {
                                        $year = $drow['year'];
                                        $yprofit = $drow['yprofit'];
                                                                            
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $year ?></td>
                                        <td><?php echo $yprofit ?></td>
                                        
                                        
                                    </tr>        
                            <?php 
                                    }  
                            ?> 
                  </tbody>
              </table>
          </div>
          </div></div></div></div></div>
      </div>

<?php include('footer.php'); ?>

