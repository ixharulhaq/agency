<?php include('db.php'); 
session_start();
$user_id=$_SESSION['id'];


?>


<?php 


$query1 ="SELECT MONTHNAME(dated) as month, SUM(netp) as mprofit FROM data WHERE user_id=$user_id GROUP BY MONTH(dated)";


// $query .="SELECT MONTHNAME(edated) as mdate, SUM(eamount) as mdamount FROM expenditure WHERE user_id=$user_id GROUP BY MONTH(edated)";

$run1=mysqli_query($conn, $query1);
// while ($row=mysqli_fetch_array($run)) {

  
//   echo $row['month'].'<br>';
//   echo $row['mprofit'].'<br>';
// }
                                                                            




 
?> 

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['month', 'mprofit'],
          <?php
        
        
        while ($row1 = mysqli_fetch_array($run1))

          echo  "['".$row1['month']."','".$row1['mprofit']."'],"

          ?>
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>
