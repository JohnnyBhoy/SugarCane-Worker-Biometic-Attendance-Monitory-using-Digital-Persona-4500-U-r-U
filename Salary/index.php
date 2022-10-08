    <!-- For header -->
    <?php include '../includes/header.php';?>

    <!-- For tab active styling -->
    <style> #sal {color: #fff;background-color: #007bff;}</style>

    <!-- For sidebar -->
    <?php include '../includes/sideBar.php';?>

    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top:1%">
  <!-- Main content -->
  <section class="content">
      <br><div class="container-fluid">
        <br><div class="row">
          <div class="col-12">
           <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th >Name</th>
                    <th>Salary</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      <!-- Show employee-->
                       <?php
                        $Employee = "SELECT * FROM worker ORDER BY lname ASC";
                        $result = mysqli_query($con, $Employee);
                        if (mysqli_num_rows($result)> 0 ) 
                        {
                           while($row = mysqli_fetch_assoc($result)) {
                             echo ' 
                             <tr><td>'.$row['lname'],', ',$row['fname'],' ', $row['mname'],' ',$row['ext'].'</td>  
                             <td>'.$row['salary'].' per hour</td>   
                             <td><a href="ViewSalary?id='.$row['w_id'].'">
                             <button class="btn btn-xs btn-primary" style="margin-left:45%"  ><i class="fa fa-xl fa-edit"></i></button></a>
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
    