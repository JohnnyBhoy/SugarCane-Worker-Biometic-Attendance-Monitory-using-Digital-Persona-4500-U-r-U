    <!-- For header -->
    <?php include '../includes/header.php';?>

    <!-- For tab active styling -->
    <style> #sal {color: #fff;background-color: #007bff;}</style>

    <!-- For sidebar -->
    <?php include '../includes/sideBar.php';?>
    <?php $id = $_GET['id'];
    $Salary = "SELECT salary FROM worker where w_id=$id";
    $qry= $con->prepare($Salary);
    $qry->execute();
    $qry->bind_result($salary);
    while($qry->fetch()){
    $datelog = date("m/d/Y h:i:sa");}
    ?>
    <!-- body -->
    <div class="content-wrapper">
    <section class="content" style="margin-top:5%">
      <div class="container-fluid">
        <br><div class="row">
          <div class="col-12 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header" align="center" >Worker Salary</div>
                    <div class="card-body">
                        <form action="" method="post">
                        <div class="row">
                        <div class="col-sm-12" align="center">
                            <label>Add Rate</label><input class="form-control" style="width:50%;text-align:center" type="number" name="salary" value="<?php echo $salary;?>"/>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-6">
                        <br><button type="submit" name="updatesalary" style="margin-left:80%" class="btn btn-sm btn-primary">Update</button>
                        </div>
                        <div class="col-sm-6">
                        <br><button onclick="returnIndex()" style="margin-left:10%" class="btn btn-sm btn-danger">Close</button>
                        </div>
                        </form>
                       </div>
                    </div>
                </div>
            </div>
        </div>

    <?php include '../includes/footer.php';?>
    <?php
    /**Script to Add Educational Attainment**/
       if(isset($_POST["updatesalary"])){
         $id = $_GET['id'];
         $salary=$_POST["salary"];            
        //sql statement
       $Update = "UPDATE worker SET salary = $salary WHERE w_id = $id";
       $qry=$con->prepare($Update);
    
       // condition for success or fail
       if($qry->execute()){;
        echo"<script language = 'javascript'>
        swal({title: 'Rate updated',
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
     ?>




