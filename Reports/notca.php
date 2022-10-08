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
           <button class="btn btn-xs btn-info" onclick="showCash()">Add Cash Advance</button><br><br>
           <div class="card">
             <div onclick="hideCA()" id="hides" class="card-body">
              <form action="" method="post">
                 <div class="row" id="showCash" >
                   <select class="form-control" type="text" name="worker"  style="width:30%;margin-left:3%" id="worker">
                                <?php
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
                  <input class="form-control" style="width:25%;margin-left:3%" name="dated" value="<?php echo date('Y-m-d');?>" type="date"/>
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
                    <th>Rate/Hr</th>
                    <th>Work</th>
                    <th>Address</th>
                  </tr>
                  </thead>
                  <tbody>
                      <!-- Show employee-->
                       <?php
                        $ca = "SELECT * FROM worker WHERE w_id NOT IN (SELECT worker FROM  cash_advance)";
                        $result = mysqli_query($con, $ca);
                        if (mysqli_num_rows($result)> 0 ) 
                        {
                           while($row = mysqli_fetch_assoc($result)) {
                             echo ' 
                             <tr><td>'.$row['lname'],', ',$row['fname'],' ', $row['mname'],' ',$row['ext'].'</td>  
                             <td>'.number_format($row['salary'],2).'</td>   
                             <td>'.$row['position'].'</td>   
                             <td>'.$row['addres'].'</td>   
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





