    <!-- For header -->
    <?php include '../includes/header.php';?>

    <!-- For tab active styling -->
    <style> #reg {color: #fff;background-color: #007bff;}</style>

    <!-- For sidebar -->
    <?php include '../includes/sideBar.php';?>
    
    <!-- body -->
    <div class="content-wrapper">
    <section class="content" style="margin-top:5%">
      <div class="container-fluid">
        <br><div class="row">
          <div class="col-12 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">Worker Registration</div>
                    <div class="card-body">
                        <form action="" method="post">
                        <div class="row">
                        <div class="col-sm-12" align="center">
                            <label>Add Position</label><input class="form-control" style="width:50%;text-align:center" type="text" name="position" autocomplete="off"/>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-6">
                        <br><button type="submit" name="addposition" style="margin-left:80%" class="btn btn-sm btn-primary">Add</button>
                        </div>
                        <div class="col-sm-6">
                        <br><a href="index.php"><button style="margin-left:10%" class="btn btn-sm btn-danger">Close</button></a>
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
       if(isset($_POST["addposition"])){
         $position=$_POST["position"];            
        //sql statement
       $Position = "INSERT INTO position (position) 
       values('$position')";
       $qry=$con->prepare($Position);
    
       // condition for success or fail
       if($qry->execute()){;
        echo"<script language = 'javascript'>
        swal({title: 'Position added',
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




