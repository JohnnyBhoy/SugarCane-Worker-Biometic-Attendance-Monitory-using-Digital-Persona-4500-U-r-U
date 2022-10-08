    <!-- For header -->
    <?php include '../includes/header.php';?>

    <!-- For tab active styling -->
    <style> #rep {color: #fff;background-color: #007bff;}</style>

    <!-- For sidebar -->
    <?php include '../includes/sideBar.php';?>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper" style="margin-top:1%">
  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <br><div class="row">
          <div class="col-12">
           <button class="btn btn-xs btn-primary" onclick="showCash()">Add Cash Advance</button><br><br>
           <div class="card">
             <div onclick="hideCA()" id="hides" class="card-body">
              <form action="" method="post">
                 <div class="row" id="showCash" >
                   <select class="form-control" type="text" name="worker"  style="width:30%;margin-left:3%" id="worker" required>
                                <option>Select worker</option><?php
                                $sql = "SELECT * FROM worker ORDER BY lname ASC";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result)> 0 )
                                {
                                   while($row = mysqli_fetch_assoc($result)) {
                                     echo ' 
                                     <option value="'.$row['w_id'],'">',$row['fname'],' ', $row['mname'],' ',$row['ext'].'</option>  
                                    '  ;}}
                                ?>
                  </select>
                  <input class="form-control" placeholder="Enter Amount" style="width:20%;margin-left:3%" name="amount" type="number" required/>
                  <input class="form-control" style="width:25%;margin-left:3%" name="dated"value="<?php echo date('Y-m-d\TH:i:s');?>" type="datetime-local"/>
                  <button style="margin-left:5%;height:30px" type="submit" name="addCA" class="btn btn-sm btn-primary">Add</button><br><br>
                </div>
              </div>
              </div>
            </form>

           <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
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
                             <td><a href="updateca.php?id='.$row['w_id'].'"><button style="margin-left:25%" class="btn btn-sm btn-primary">Paid Partial</button></a>
                             <a href="deleteca.php?id='.$row['w_id'].'"><button style="margin-left:5%" class="btn btn-sm btn-danger">Paid</button></a>
                             </td>  
                             </tr>
                            '  ;
                        }}
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

        <?php
        if(isset($_POST["addCA"])){
          echo "<script>confirm('Authentication need : Verify Biometric Fingerprint First !');</script>";
            $worker=$_POST["worker"];
            $amount=$_POST["amount"];
            $dated=$_POST["dated"];            
            //sql statement
               $ca="INSERT INTO cash_advance (worker,amount,dated) 
               values('$worker','$amount','$dated')";
               $qry=$con->prepare($ca);
               
               // condition for success or fail
               if($qry->execute()){
                echo "<script>  
                alert('CA Added!');
                location.href='ca.php';
                </script>";
               }
               else{
                echo "<script>
                alert('CA Failed to Add!');
                location.href='ca.php';
                </script>";
               }
             }
         ?>





