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
      <div class="container-fluid">
        <br><div class="row">
          <div class="col-12"  <?php if($username!="Admin"){echo"hidden";}else{echo "";}?>>
                      <button class="btn btn-sm btn-primary" onclick="showTimeIn()">Time In </button>
                      <button style="margin-left:80%" class="btn btn-sm btn-danger" onclick="showDiv()">Time Out</button><br><br>
           <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" id="daily">
                  <thead>
                  <tr>
                    <th >Name</th>
                    <th>Rate/Hr</th>
                    <th>Work</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Hours Work</th>
                    <th>Income</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                      <!-- Show employee-->
                       <?php
                       $id= $_GET['id'];
                        $Employee = "SELECT a.*,b.* FROM worker a JOIN attendance b on a.w_id = b.worker where a.w_id= $id ORDER by b.a_id desc";
                        $result = mysqli_query($con, $Employee);
                        if (mysqli_num_rows($result)> 0 ) 
                        {
                           while($row = mysqli_fetch_assoc($result)) {
                             if($row['Time_out'] == '0000-00-00 00:00:00'){
                            echo ' 
                             <tr><td>'.$row['lname'],', ',$row['fname'],' ', $row['mname'],' ',$row['ext'].'</td>  
                             <td>'.number_format($row['salary'],2).'</td>   
                             <td>'.$row['position'].'</td>   
                             <td>'.substr($row['Time_In'],11,5).' A.M.</td>   
                             <td>'.substr($row['Time_out'],11,5).' P.M.</td>   
                             <td>0</td>    
                             <td>0</td>     
                             <td>'.substr($row['Time_In'],0,7).'</td>     
                             </tr>
                            ' ;
                             }
                             else{
                             echo ' 
                             <tr><td>'.$row['lname'],', ',$row['fname'],' ', $row['mname'],' ',$row['ext'].'</td>  
                             <td>'.number_format($row['salary'],2).'</td>   
                             <td>'.$row['position'].'</td>   
                             <td>'.substr($row['Time_In'],11,5).' A.M.</td>   
                             <td>'.substr($row['Time_out'],11,5).' P.M.</td>   
                             <td>'.date_diff(date_create($row['Time_In']),date_create($row['Time_out']))->h.'</td>    
                             <td>'.number_format($row['salary'] * date_diff(date_create($row['Time_In']),date_create($row['Time_out']))->h,2).'</td>     
                             <td>'.substr($row['Time_In'],0,7).'</td>     
                             </tr>
                            '  ;}
                        }}
                        ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            </div>



   <div class="col-12"  <?php if($username!="Admin"){echo"";}else{echo "hidden";}?>>
          <br><br>
           <div class="card">
              <!-- /.card-header -->
                <div class="card-header" style="background-color:#28a745"><b><?php echo $username;?></b>, This you Daily work Report </div>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" id="daily">
                  <thead>
                  <tr>
                    <th >Name</th>
                    <th>Rate/Hr</th>
                    <th>Work</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Hours Work</th>
                    <th>Income</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                      <!-- Show employee-->
                       <?php
                        $Employee = "SELECT a.*,b.* FROM worker a JOIN attendance b on a.w_id = b.worker WHERE a.fname='$username'";
                        $result = mysqli_query($con, $Employee);
                        if (mysqli_num_rows($result)> 0 ) 
                        {
                           while($row = mysqli_fetch_assoc($result)) {
                             echo ' 
                             <tr><td>'.$row['lname'],', ',$row['fname'],' ', $row['mname'],' ',$row['ext'].'</td>  
                             <td>'.number_format($row['salary'],2).'</td>   
                             <td>'.$row['position'].'</td>   
                             <td>'.substr($row['Time_In'],11,5).' A.M.</td>   
                             <td>'.substr($row['Time_out'],11,5).' P.M.</td>   
                             <td>'.date_diff(date_create($row['Time_In']),date_create($row['Time_out']))->h.'</td>    
                             <td>'.number_format($row['salary'] * date_diff(date_create($row['Time_In']),date_create($row['Time_out']))->h,2).'</td>     
                             <td>'.substr($row['Time_In'],0,7).'</td>     
                             </tr>
                            '  ;
                        }}
                        ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
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
     location.href='index.php';
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



