    <!-- For header -->
    <?php include '../includes/header.php';?>

    <!-- For tab active styling -->
    <style> #reg {color: #fff;background-color: #007bff;}</style>

    <!-- For sidebar -->
    <?php include '../includes/sideBar.php';?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-top:1%">
    <!-- Main content -->
    <section class="content">
      <br> <div class="container-fluid">
        <!-- Info boxes -->
        <br><div class="row">
          <div class="col-12 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">Worker Registration</div>
                    <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                        <div class="col-sm-4">
                            <label>Last Name</label><input class="form-control" type="text" name="lname" pattern="[^()`~,.?_{}:;|/@#!@#$%^&*-=+><\][\\\x22,;|]+" title="Special Character not allowed"  required/>
                        </div>
                        <div class="col-sm-4">
                            <label>First Name</label><input class="form-control" type="text" name="fname"  pattern="[^()`~,.?_{}:;|/@#!@#$%^&*-=+><\][\\\x22,;|]+" title="Special Character not allowed"   required />
                        </div>
                        <div class="col-sm-4">
                            <label>Middle Name</label><input class="form-control" type="text" name="mname"  pattern="[^()`~,.?_{}:;|/@#!@#$%^&*-=+><\][\\\x22,;|]+" title="Special Character not allowed"   required/>
                        </div>
                        <div class="col-sm-4">
                             <label>Extension Name</label>
                                <select class="form-control" type="text" name="ext">
                                 <option value=""></option>
                                 <option value="Jr.">Jr</option>
                                 <option value="Sr.">Sr</option>
                                 <option value="III">III</option>
                                 <option value="IV">IV</option>
                                </select>
                        </div>
                        <div class="col-sm-4">
                             <label>Date of Birth</label><input class="form-control" type="date" name="dob" required/>
                        </div>
                        <div class="col-sm-4">
                             <label>Address</label><input class="form-control" type="text" name="addres"  pattern="[^()`~.?_{}:;|/@!@$%^&*-=+><\][\\\x22;|]+" title="Special Character not allowed"  required  />
                        </div>
                        <div class="col-sm-4">
                             <label>Fingerprint</label><input class="form-control" type="file" name="finger" required/>
                        </div>
                        <div class="col-sm-4">
                        <label>Contact Number</label>
                        <input name="contacts"  class="form-control" type = "number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  type = "number"   maxlength = "11" required/>
                        </div>
                        <div class="col-sm-4">
                             <label>Work/Job</label>
                             <a href="Position.php"><i class="fas fa-plus"></i></a>
                             <select class="form-control" type="text" name="position"  id="position" required>
                                <?php
                                $sql = "SELECT * FROM position ORDER BY position ASC";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result)> 0 )
                                {
                                   while($row = mysqli_fetch_assoc($result)) {
                                     echo ' 
                                     <option value="'.$row['position'].'">'.$row['position'].'</option>  
                                    '  ;}}
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                             <label>Worker Type</label>                             
                             <a href="WorkerType.php"><i class="fas fa-plus"></i></a>
                             <select class="form-control" type="text" name="typed"  id="typed" required>
                                <?php
                                $sql = "SELECT * FROM worker_type ORDER BY worker_type ASC";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result)> 0 )
                                {
                                   while($row = mysqli_fetch_assoc($result)) {
                                     echo ' 
                                     <option value="'.$row['worker_type'].'">'.$row['worker_type'].'</option>  
                                    '  ;}}
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>Salary/Rate</label>
                             <a href="Salary.php"><i class="fas fa-plus"></i></a>
                             <select class="form-control" type="text" name="rate"  id="rate" required>
                                <?php
                                $sql = "SELECT * FROM salary ORDER BY salary ASC";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result)> 0 )
                                {
                                   while($row = mysqli_fetch_assoc($result)) {
                                     echo ' 
                                     <option value="'.$row['salary'].'">'.$row['salary'].' per hour</option>  
                                    '  ;}}
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                             <label>Date Hired</label><input class="form-control" type="date" name="hired" value="<?php echo date('Y-m-d');?>"  readonly="readonly" required/>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-6">
                        <br><button type="submit" name="register" style="margin-left:80%" class="btn btn-sm btn-primary">Register</button>
                        </div>
                        <div class="col-sm-6">
                        <br><button style="margin-left:10%" class="btn btn-sm btn-danger">Close</button>
                        </div>
                        </form>
                        </div>
                     </div>
                  </form>
                </div>
            </div>

            <!-- For Footer -->
     <?php include '../includes/footer.php';?>
     <!-- For home body -->
    <?php include '../includes/footerScripts.php';?>
     <?php
    /**Script to Add Educational Attainment**/
       if(isset($_POST["register"])){
         $fname=$_POST["fname"];            
         $mname=$_POST["mname"];            
         $lname=$_POST["lname"];            
         $ext=$_POST["ext"];            
         $dob=$_POST["dob"];            
         $addres=$_POST["addres"];            
         $finger=$_POST["finger"];            
         $contact=$_POST["contacts"];            
         $position=$_POST["position"];            
         $typed=$_POST["typed"];            
         $rate=$_POST["rate"];            
         $hired=$_POST["hired"]; 

        //sql statement
        $Worker = "INSERT INTO worker (fname,mname,lname,ext,dob,addres,finger,contact,position,worker_type,salary,doh) 
        values('$fname','$mname','$lname','$ext','$dob','$addres','$finger','$contact','$position','$typed','$rate','$hired')";
        $qry=$con->prepare($Worker);
        if($qry->execute()){    
        $user = "INSERT INTO admin (username,email,userPassword) 
        values('$fname','$fname$lname@gmail.com','$fname')";
        $qry=$con->prepare($user);

       // condition for success or fail
       if($qry->execute()){;
        echo"<script language = 'javascript'>
        swal({title: 'Worker added',
        type : 'success',
        showConfirmButton: false,
        timer: 1500,
        },
        function(){
        setTimeout(function(){
        location = 'index';
        });
        });
        </script>";
       }
     }
    }
     ?>




