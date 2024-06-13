<?php include('header.php'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          

        
        <!-- /.container-fluid -->
        
        <div class="row">
          <div class="col-12">
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daily Expense</h6>
            </div>
            <div class="card-body">
		
		<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="150px;">Date</th>
                      <th width="300px;">Total Expenditures</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>

            <?php  
            $query="SELECT DATE(edated) as edate, SUM(eamount) as edamount FROM expenditure WHERE user_id=$user_id GROUP BY edated";
            $dr=mysqli_query($conn,$query) or die( mysqli_error($conn));
            while($drow=mysqli_fetch_assoc($dr))
                                    {
                                        $edate = $drow['edate'];
                                        $edamount = $drow['edamount'];
                                                                            
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $edate ?></td>
                                        <td><?php echo $edamount ?></td>
                                        
                                        
                                    </tr>        
                            <?php 
                                    }  
                            ?> 
                  </tbody>
              </table>
          </div></div></div></div>
          </div>

<br><br>

<div class="row">
  <div class="col-12">
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Monthly Expense</h6>
            </div>
            <div class="card-body">
		
		<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="150px;">Month</th>
                      <th width="300px;">Total Expenditures</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>

            <?php  
            $query="SELECT MONTHNAME(edated) as mdate, SUM(eamount) as mdamount FROM expenditure WHERE user_id=$user_id GROUP BY mdate";
            $dr=mysqli_query($conn,$query) or die( mysqli_error($conn));
            while($drow=mysqli_fetch_assoc($dr))
                                    {
                                        $mdate = $drow['mdate'];
                                        $mdamount = $drow['mdamount'];
                                                                            
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $mdate ?></td>
                                        <td><?php echo $mdamount ?></td>
                                        
                                        
                                    </tr>        
                            <?php 
                                    }  
                            ?> 
                  </tbody>
              </table>
          </div></div></div></div>
          </div>
<br><br>

<div class="row">
  <div class="col-12">
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Yearly Expense</h6>
            </div>
            <div class="card-body">
		
		<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="150px;">Year</th>
                      <th width="300px;">Total Expenditures</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>

            <?php  
            $query="SELECT YEAR(edated) as ydate, SUM(eamount) as ydamount FROM expenditure WHERE user_id=$user_id GROUP BY ydate";
            $dr=mysqli_query($conn,$query) or die( mysqli_error($conn));
            while($drow=mysqli_fetch_assoc($dr))
                                    {
                                        $ydate = $drow['ydate'];
                                        $ydamount = $drow['ydamount'];
                                                                            
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $ydate ?></td>
                                        <td><?php echo $ydamount ?></td>
                                        
                                        
                                    </tr>        
                            <?php 
                                    }  
                            ?> 
                  </tbody>
              </table>
          </div></div></div></div>
          </div>

      </div>

<?php include('footer.php'); ?>

