<!-- For header -->
    <?php include '../includes/header.php';?>

    <!-- For tab active styling -->
    <style> #att {color: #fff;background-color: #007bff;}</style>

    <!-- For sidebar -->
    <?php include '../includes/sideBar.php';?>
    <!-- For home body -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-top:1%">
            <!-- Main content -->
            <section class="content">
              <br><div class="container-fluid">
                <!-- Info boxes -->
                <div class="col-sm-12">
                      <button class="btn btn-sm btn-primary" onclick="showTimeIn()">Time In </button>
                      <button style="margin-left:80%" class="btn btn-sm btn-danger" onclick="showDiv()">Time Out</button><br><br>
           <div class="card">
              <!-- /.card-header -->
              <div class="card-body" id="tables">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th >Name</th>
                    <th>Work</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                      <!-- Show employee-->
                       <?php
                        $Employee = "SELECT a.*,b.* FROM worker a JOIN attendance b on a.w_id = b.worker ORDER BY a.lname,b.Time_out ASC";
                        $result = mysqli_query($con, $Employee);
                        if (mysqli_num_rows($result)> 0 ) 
                        {
                           while($row = mysqli_fetch_assoc($result)) {
                             echo ' 
                             <tr><td>'.$row['lname'],', ',$row['fname'],' ', $row['mname'],' ',$row['ext'].'</td>  
                             <td>'.$row['position'].'</td>   
                             <td>'.substr($row['Time_In'],11,5).' A.M.</td>   
                             <td>'.substr($row['Time_out'],11,5).' P.M.</td>     
                             <td>'.substr($row['Time_In'],0,7).'</td>     
                             </tr>
                            '  ;
                        }}
                        ?>
                  </tfoot>
                </table>
              </div>
                      
                </div>
                <form action="" method="post">
                <div class="row">
                  <div class="col-sm-4" style="margin-top:2%;margin-left:35%">
                      <div class="card"  id="TimeIn">
                          <div class="card-header"  style="background-color:#007bff;color:white" align="center">Log-in using Fingerprint Verification!</div>
                            <div class="card-body">
                              
                             <select class="form-control" type="text" name="worker"  id="worker" required>
                               <option>Select Worker</option>
                                <?php
                                $sql = "SELECT * FROM worker ORDER BY lname ASC";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result)> 0 )
                                {
                                   while($row = mysqli_fetch_assoc($result)) {
                                     echo ' 
                                     <option value="'.$row['w_id'].'">'.$row['lname'],', ',$row['fname'],' ', $row['mname'],' ',$row['ext'].'</option>  
                                    '  ;}}
                                ?>
                            </select>
                             <br><h1 align="center"><b><?php echo substr(date('Y-m-d\TH:i:s'),11,5),' ',date('A');?></b></h1>
                             <input value="<?php echo date('Y-m-d\TH:i:s');?>" type="datetime-local" name="amIn" hidden/>
                            <br><button type="submit" name="timeIn" class="btn btn-primary"   style="margin-left:35%"><i class="fas fa-fingerprint fa-5x"></i></button>
                            </div>
                       </div>
                   </div>
                   </form>
                   <div class="col-sm-4" style="margin-left:35%">
                      <div class="card"  id="TimeOut">
                          <div class="card-header"  style="background-color:#c82333;color:white" align="center">Log-Out using Fingerprint Verification!</div>
                            <div class="card-body">
                             <select class="form-control" type="text" name="workers"  id="worker" required>
                               <option>Select Worker</option>
                                <?php
                                $sql = "SELECT * FROM worker ORDER BY lname ASC";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result)> 0 )
                                {
                                   while($row = mysqli_fetch_assoc($result)) {
                                     echo ' 
                                     <option value="'.$row['w_id'].'">'.$row['lname'],', ',$row['fname'],' ', $row['mname'],' ',$row['ext'].'</option>  
                                    '  ;}}
                                ?>
                            </select>
                             <br><h1 align="center"><b><?php echo substr(date('Y-m-d\TH:i:s'),11,5),' ',date('A');?></b></h1>
                             <input value="'<?php echo date('Y-m-d H:i:s');?>'" type="text" name="pmOut" hidden/>
                            <br><button type="submit" name="timeOut" class="btn btn-danger"   style="margin-left:35%"><i class="fas fa-fingerprint fa-5x"></i></button>
                            </div>
                       </div>
                   </div>
                   </form>
                </div>
             </div>

    <!-- For home body -->
    <?php include '../includes/footer.php';?>

    <!-- For home body -->
    <?php include '../includes/footerScripts.php';?>
    <?php
    /**Script to Add Educational Attainment**/
       if(isset($_POST["timeIn"])){
         $worker=$_POST["worker"];            
         $amIn=$_POST["amIn"];  
         $dateToday = date('Y-m-d');          
        //sql statement
        $checkIfTimeIn = "SELECT * FROM attendance where worker = $worker AND Time_In LIKE '$dateToday%'";
        $result = mysqli_query($con, $checkIfTimeIn);
        if (mysqli_num_rows($result)> 0 ){
          echo '<script>alert("Already Time In this day!");</script>';
        }
        else{
       $TimeIn = "INSERT INTO attendance (worker,Time_in) 
       values('$worker','$amIn')";
       $qry=$con->prepare($TimeIn);
    
       // condition for success or fail
       if($qry->execute()){;
        echo"<script language = 'javascript'>
        alert('Time In Successfully!');
        location.href='index2.php?id=$worker';
        </script>";
       }
      }
     }

     if(isset($_POST["timeOut"])){
      $worker=$_POST["workers"];            
      $pmOut=$_POST["pmOut"];  
      $dateToday = date('Y-m-d');          
     //sql statement
     $checkIfTimeOut = "SELECT * FROM attendance where worker = $worker AND Time_out LIKE '$dateToday%'";
     $result = mysqli_query($con, $checkIfTimeOut);
     if (mysqli_num_rows($result) > 0 ){
       echo '<script>alert("Already Time Out this day!");</script>';
     }
     else{
    $TimeOut = "UPDATE attendance SET Time_out = $pmOut where worker = $worker";
    $qry=$con->prepare($TimeOut);
 
    // condition for success or fail
    if($qry->execute()){;
     echo"<script language = 'javascript'>
     alert('Time Out Successfuly!');
     location.href='index2.php?id=$worker';
     </script>";
    }
   }
  }
     ?>
     <script>
       $(function(){
        $("#TimeIn").hide();
        $("#TimeOut").hide();
       });
       function showDiv(){
        $("#TimeIn").hide();
        $("#tables").hide();
        $("#TimeOut").show();
       }
       function showTimeIn(){
        $("#TimeOut").hide();
        $("#tables").hide();
        $("#TimeIn").show();
       }
      </script>



