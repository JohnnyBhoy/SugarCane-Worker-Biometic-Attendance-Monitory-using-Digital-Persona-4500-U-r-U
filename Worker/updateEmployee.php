    <!-- For header -->
    <?php include '../includes/header.php';?>

    <!-- For tab active styling -->
    <style> #employee {color: #fff;background-color: #007bff;}</style>

    <!-- For sidebar -->
    <?php include '../includes/sideBar.php';?>

    <!-- For functions -->
    <?php include '../includes/functions.php';?>

    <?php $id = $_GET['id'];
    $Worker = "SELECT fname,mname,lname,ext,dob,addres,finger,contact,position,worker_type,salary,doh FROM worker where w_id=$id";
    $qry= $con->prepare($Worker);
    $qry->execute();
    $qry->bind_result($fname,$mname,$lname,$ext,$dob,$addres,$finger,$contact,$position,$worker_type,$salary,$doh);
    while($qry->fetch()){
    $datelog = date("m/d/Y h:i:sa");}
    ?>  
    <!-- For exmployee  body -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top:1%">
    <!-- Main content -->
    <section class="content">
      <br> <div class="container-fluid">
        <!-- Info boxes -->
        <br><div class="row">
          <div class="col-12 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header" align="center">Worker Information</div>
                    <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                        <div class="col-sm-4">
                            <label>Last Name</label><input class="form-control" type="text" name="fname" value="<?php echo $lname;?>"  pattern="[^()`~,.?_{}:;|/@#!@#$%^&*-=+><\][\\\x22,;|]+" title="Special Character not allowed"  required/>
                        </div>
                        <div class="col-sm-4">
                            <label>First Name</label><input class="form-control" type="text" value="<?php echo $fname;?>"  name="mname"  pattern="[^()`~,.?_{}:;|/@#!@#$%^&*-=+><\][\\\x22,;|]+" title="Special Character not allowed"  required/>
                        </div>
                        <div class="col-sm-4">
                            <label>Middle Name</label><input class="form-control" type="text" value="<?php echo $mname;?>"  name="lname"  pattern="[^()`~,.?_{}:;|/@#!@#$%^&*-=+><\][\\\x22,;|]+" title="Special Character not allowed"  required/>
                        </div>
                        <div class="col-sm-4">
                             <label>Extension Name</label>
                                <select class="form-control" type="text" name="ext">
                                 <option value="<?php echo $ext;?>"><?php echo $ext;?></option>
                                 <option value=""></option>
                                 <option value="Jr.">Jr</option>
                                 <option value="Sr.">Sr</option>
                                 <option value="III">III</option>
                                 <option value="IV">IV</option>
                                </select>
                        </div>
                        <div class="col-sm-4">
                             <label>Date of Birth</label><input class="form-control" type="date" value="<?php echo $dob;?>"  name="dob" />
                        </div>
                        <div class="col-sm-4">
                             <label>Address</label><input class="form-control" type="text" value="<?php echo $addres;?>"  name="addres"  pattern="[^()`~,.?_{}:;|/@!@$%^&*-=+><\][\\\x22,;|]+" title="Special Character not allowed"  required/>
                        </div>
                        <div class="col-sm-4">
                             <label>Fingerprint</label><input class="form-control" type="file" value="<?php echo $finger;?>"  name="finger" />
                        </div>
                        <div class="col-sm-4">
                             <label>Contact Number</label><input class="form-control" type="number" value="<?php echo $contact;?>"   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"     maxlength = "11" name="contact" />
                        </div>
                        <div class="col-sm-4">
                             <label>Work/Job</label>
                             <a href="Position.php"><i class="fas fa-plus"></i></a>
                             <select class="form-control" type="text" name="position"  id="position">
                             <option value="<?php echo $position;?>"><?php echo $position;?></option>
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
                             <select class="form-control" type="text" name="typed"  id="typed">
                             <option value="<?php echo $worker_type;?>"><?php echo $worker_type;?></option>
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
                             <select class="form-control" type="text" name="rate"  id="rate">
                             <option value="<?php echo $salary;?>"><?php echo $salary;?></option>
                                <?php
                                $sql = "SELECT * FROM salary ORDER BY salary ASC";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result)> 0 )
                                {
                                   while($row = mysqli_fetch_assoc($result)) {
                                     echo ' 
                                     <option value="'.$row['salary'].'">'.$row['salary'].'</option>  
                                    '  ;}}
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                             <label>Date Hired</label><input class="form-control" type="date" value="<?php echo $doh;?>"  name="hired" />
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-6">
                        <br><button type="submit" name="updateWorker" style="margin-left:80%" class="btn btn-sm btn-primary">Update</button>
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

    <!-- For home body -->
    <?php include '../includes/footer.php';?>

    <!-- For home body -->
    <?php include '../includes/footerScripts.php';?>

    <?php
    /**Script to Add Educational Attainment**/
       if(isset($_POST["updateWorker"])){
         $id = $_GET['id'];
         $fname=$_POST["fname"];            
         $mname=$_POST["mname"];            
         $lname=$_POST["lname"];            
         $ext=$_POST["ext"];            
         $dob=$_POST["dob"];            
         $addres=$_POST["addres"];            
         $finger=$_POST["finger"];            
         $contact=$_POST["contact"];            
         $position=$_POST["position"];            
         $typed=$_POST["typed"];            
         $rate=$_POST["rate"];            
         $hired=$_POST["hired"];            
        //sql statement
        $Worker = "UPDATE worker SET fname='$fname',mname='$mname',lname='$lname',ext='$ext',dob='$dob',addres='$addres',finger='$finger',contact='$contact',position='$position',worker_type='$typed',salary='$rate',doh='$hired'
        WHERE w_id = $id";
        $qry=$con->prepare($Worker);
    
       // condition for success or fail
       if($qry->execute()){;
        echo"<script language = 'javascript'>
        alert ('Worker information updated');
        location.href='index.php';
        </script>";
       }
     }
     ?>











