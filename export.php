<?php include("db.php");
     session_start();
     $user_id=$_SESSION['id']; 
     
     if(isset($_POST["exportledger"])){
         
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename=ledgerdata.csv');  
          $output = fopen("php://output", "w");  
          fputcsv($output, array('ID', 'Agency ID', 'Date', 'Ticket No', 'Description', 'Debit', 'Credit', 'Balance', 'UserID'));  
          $query = "SELECT * from ledger WHERE user_id=$user_id ORDER BY id DESC";  
          $result = mysqli_query($conn, $query) or die;  
          while($row = mysqli_fetch_assoc($result))  
          {  
               fputcsv($output, $row);  
          }  
          fclose($output);  
     }

     
     if(isset($_POST["exportvoucher"])){
         
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename=voucherdata.csv');  
          $output = fopen("php://output", "w");  
          fputcsv($output, array('ID', 'Voucher ID', 'Customer ID', 'Entry Date', 'Actual Amt', 'Bill Amt', 'Paid Amt', 'Arrears', 'Reutrned Amt', 'Reutrned Date', 'Net Payment', 'Net Profit', 'Notes', 'UserID'));  
          $query = "SELECT * from data WHERE user_id=$user_id ORDER BY id DESC";  
          $result = mysqli_query($conn, $query) or die;  
          while($row = mysqli_fetch_assoc($result))  
          {  
               fputcsv($output, $row);  
          }  
          fclose($output);  
     }

     if(isset($_POST["exportexpenditure"])){
         
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename=expendituredata.csv');  
          $output = fopen("php://output", "w");  
          fputcsv($output, array('ID', 'Expense ID', 'Date', 'Description', 'Amount', 'UserID'));  
          $query = "SELECT * from expenditure WHERE user_id=$user_id ORDER BY id DESC";  
          $result = mysqli_query($conn, $query) or die;  
          while($row = mysqli_fetch_assoc($result))  
          {  
               fputcsv($output, $row);  
          }  
          fclose($output);  
     }
     
     if(isset($_POST["exportcustomer"])){
         
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename=cutomerdata.csv');  
          $output = fopen("php://output", "w");  
          fputcsv($output, array('ID', 'Name', 'Passport #', 'Mobile #', 'Address', 'Status', 'UserID'));  
          $query = "SELECT * from customer WHERE user_id=$user_id ORDER BY id DESC";  
          $result = mysqli_query($conn, $query) or die;  
          while($row = mysqli_fetch_assoc($result))  
          {  
               fputcsv($output, $row);  
          }  
          fclose($output);  
     }

     if(isset($_POST["exportagency"])){
         
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename=agencydata.csv');  
          $output = fopen("php://output", "w");  
          fputcsv($output, array('ID', 'Name', 'Phone', 'Address', 'Status', 'UserID'));  
          $query = "SELECT * from agency WHERE user_id=$user_id ORDER BY id DESC";  
          $result = mysqli_query($conn, $query) or die;  
          while($row = mysqli_fetch_assoc($result))  
          {  
               fputcsv($output, $row);  
          }  
          fclose($output);  
     }

     if(isset($_POST["exportexpense"])){
              
               header('Content-Type: text/csv; charset=utf-8');  
               header('Content-Disposition: attachment; filename=expensedata.csv');  
               $output = fopen("php://output", "w");  
               fputcsv($output, array('ID', 'Head', 'UserID'));  
               $query = "SELECT * from expense WHERE user_id=$user_id ORDER BY id DESC";  
               $result = mysqli_query($conn, $query) or die;  
               while($row = mysqli_fetch_assoc($result))  
               {  
                    fputcsv($output, $row);  
               }  
               fclose($output);  
          }





     ?>

