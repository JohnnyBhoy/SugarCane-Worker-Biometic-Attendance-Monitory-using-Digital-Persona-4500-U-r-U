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
                                <?php
                                $id = $_GET['id'];
                                $sql = "SELECT a.w_id,a.lname,a.fname,a.mname,a.ext,b.amount,b.dated FROM worker a
                                JOIN cash_advance b  ON a.w_id = b.worker WHERE worker=$id";
                                  $qry= $con->prepare($sql);
                                  $qry->execute();
                                  $qry->bind_result($w_id,$lname,$fname,$mname,$ext,$amount,$dated);
                                  while($qry->fetch()){
                                  $datelog = date("m/d/Y h:i:sa");}
                                  ?>
                  <input value="<?php echo $w_id;?>" name="worker" hidden>
                  <input class="form-control" style="width:20%;margin-left:3%" value="<?php echo $lname,', ',$fname,' ',$mname,' ',$ext;?>" required/>
                  <input class="form-control" value="<?php echo $amount;?>" style="width:20%;margin-left:3%" name="amount" type="number" required/>
                  <input class="form-control" style="width:25%;margin-left:3%" name="dated" value="<?php echo $dated; ?>" type="datetime-local"/>
                  <button style="margin-left:5%;height:30px" type="submit" onclick="paid(<?php echo $_GET['id'];?>)" class="btn btn-sm btn-primary">Paid Partial</button><br><br>
                </div>
              </div>
              </div>
            </form>
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
        if(isset($_POST["updateCA"])){
          echo "<script>confirm('Verify Biometric Fingerprint First!');</script>";
            $worker=$_POST["worker"];
            $amounts=$_POST["amount"];
            $dated=$_POST["dated"];            
            //sql statement

           $id = $_GET['id'];
           $sql = "SELECT amount FROM cash_advance WHERE worker=$id";
             $qry= $con->prepare($sql);
             $qry->execute();
             $qry->bind_result($amount);
             while($qry->fetch()){
             $datelog = date("m/d/Y h:i:sa");}

             $balance = $amount - $amounts;

             $Worker = "UPDATE cash_advance SET amount='$balance',dated='$dated' WHERE worker = $id";     
             $qry=$con->prepare     ($Worker);    
                  // condition for success or fail
                  if($qry->execute()){;
                   echo"<script language = 'javascript'>
                   alert ('Worker CA updated');
                   location.href='ca.php';
                   </script>";
            }
             }
         ?>





