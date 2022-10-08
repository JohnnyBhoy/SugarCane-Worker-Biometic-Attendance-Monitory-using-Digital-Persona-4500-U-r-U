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
                    <th>Age</th>
                    <th>Address</th>
                    <th>Job</th>
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
                             <td>'.date_diff(date_create($row['dob']),date_create('now'))->y.' Y/o</td> 
                             <td>'.$row['addres'].'</td>  
                             <td>'.$row['position'].'</td>   
                             <td><a href="ViewEmployee?id='.$row['w_id'].'">
                             <button class="btn btn-xs btn-info" style="margin-left:5%" ><i class="fa fa-xl fa-eye"></i></button></a>
                             <a href="updateEmployee?id='.$row['w_id'].'">
                             <button class="btn btn-xs btn-primary" style="margin-left:5%"  ><i class="fa fa-xl fa-edit"></i></button></a>
                             <button  onClick="delEmp('.$row['w_id'].')" style="margin-left:5%" class="btn btn-xs btn-danger"><i class="fa fa-xl fa-trash"></i></button>
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




