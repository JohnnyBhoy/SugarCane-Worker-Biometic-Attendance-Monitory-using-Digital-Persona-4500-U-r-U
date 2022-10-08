    <!-- For header -->
    <?php include '../includes/header.php';?>

    <!-- For tab active styling -->
    <style> #rep {color: #fff;background-color: #007bff;}</style>

    <!-- For sidebar -->s
    <?php include '../includes/sideBar.php';?>
 <?php 
 $id=$_GET["id"];
 $delete= "DELETE  FROM  cash_advance WHERE worker=$id";
 $qry= $con->prepare($delete);
 if($qry->execute()){;
     echo"<script language = 'javascript'>
     swal({title: 'CA Fully Paid',
     type : 'success',
     showConfirmButton: false,
     timer: 1500,
     },
     function(){
     setTimeout(function(){
     location = 'ca';
     });
     });
     </script>";
    }
    else{
     echo"<script language = 'javascript'>
     swal({title: 'Failed',
     type : 'danger',
     showConfirmButton: false,
      timer: 1500,
     },
     function(){
     setTimeout(function(){
     location = 'ca';
     });
     });
     </script>";
    }
?>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper" style="margin-top:1%">
  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <br><div class="row">
          <div class="col-12">
              <button class="btn btn-xs btn-info" onclick="showDaily()">Daily</button>
              <button class="btn btn-xs btn-info" style="margin-left:20%" onclick="showWeekly()">Weekly</button>
              <button style="margin-left:20%" class="btn btn-xs btn-info" onclick="showMonthly()">Monthly</button>
              <button class="btn btn-xs btn-info" style="margin-left:20%" onclick="ca()">Cash Advance</button><br><br>
           <div class="card">

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" id="daily">
                  <thead>
                  <tr>
                    <th >Name</th>
                    <th>Amount</th>
                    <th>Date Borrowed</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      <!-- Show employee-->
                       <?php
                        $ca = "SELECT a.*,b.* FROM worker a JOIN cash_advance b on a.w_id = b.worker ORDER BY a.lname ASC";
                        $result = mysqli_query($con, $ca);
                        if (mysqli_num_rows($result)> 0 ) 
                        {
                           while($row = mysqli_fetch_assoc($result)) {
                             echo ' 
                             <tr><td>'.$row['lname'],', ',$row['fname'],' ', $row['mname'],' ',$row['ext'].'</td>  
                             <td>'.number_format($row['amount'],2).'</td>   
                             <td>'.$row['dated'].'</td>   
                             <td><a href="deleteca.php?id='.$row['w_id'].'"><button style="margin-left:30%" class="btn btn-sm btn-primary">Delete</button></a></td>  
                             </tr>
                            '  ;
                        }}
                         else{
                          echo "<script>alert('no date found!');
                          location='weekly.php';
                          </script>";
                        }
                        ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        <!-- For Footer -->
     <?php include '../includes/footer.php';?>
     <!-- For home body -->
    <?php include '../includes/footerScripts.php';?>
    <script>
       function showDaily(){
          location.href="index.php";
       }
       function showWeekly(){
        location.href="weekly.php";
       }
       function showMonthly(){
        location.href="monthly.php";
       }
       function ca(){
        location.href="ca.php";
       }
      </script>





