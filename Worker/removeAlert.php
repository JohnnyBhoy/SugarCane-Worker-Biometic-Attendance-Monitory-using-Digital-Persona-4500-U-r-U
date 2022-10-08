 <?php 
 $empid=$_GET["empid"];
 $delete= "DELETE  FROM  worker WHERE w_id=$empid";
 $qry= $con->prepare($delete);
 if($qry->execute()){;
     echo"<script language = 'javascript'>
     swal({title: 'Removed',
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
    else{
     echo"<script language = 'javascript'>
     swal({title: 'Failed',
     type : 'danger',
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
?>