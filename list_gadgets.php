<!DOCTYPE html>
<html>
<?php
session_start();

    if(isset($_SESSION['User']))
    {
    }
    else
    {
        header("location:login_page.php");
    }
    include 'pages/includes/queries.php';
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Chums DHA Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="pages\includes\style.css">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  </nav>

 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <h3><center>Chums DHA</center></h3>
      <h3><center>CMS</center></h3>
    </a>

    <?php 
      include('nav.php');
     ?>

</aside>

  <div class="content-wrapper">
  <div class="table-container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage Employee Gadgets</h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Gadget</span></a>                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover user_gadget_checklist_data">
                <thead>
                    <tr>
                        <th scope="col">control number</th>
                        <th scope="col">employee_id</th>
                        <th scope="col">employee_name</th>
                        <th scope="col">gadget_name</th>
                        <th scope="col">gadget identification</th>
                        <th scope="col">gadget type</th>
                        <th scope="col">submitted_at</th>
                        <th scope="col" style = "text-align:center">Edit</th>
                        <th scope="col" style = "text-align:center">Delete</th>
                    </tr>
                </thead>
                <tbody id = "user_gadgets_data"> 
                        <?php 
                            // $servername = "150.109.115.26";
                            // $port 		= "3306";
                            // $username   = "root";
                            // $password 	= "jfr3u9t";
                            // $dbname    	= "gadgetchecklist";
                            // // connect to database
                            // $db = mysqli_connect($servername. ':' .$port, $username, $password, $dbname);
                            require_once('pages/includes/db_connection_online.php');

                            $user_gadget_query =   "SELECT 
                                                    a.id AS id,
                                                    a.control_number AS control_number,
                                                    b.employee_id AS employee_id,
                                                    b.employee_name AS employee_name,
                                                    a.gadget_name AS gadget_name,
                                                    a.gadget_identification AS gadget_identification,
                                                    v.name AS gadget_type,
                                                    a.created_at AS submitted_at
                                                    FROM 
                                                    gadget_checklist AS a 
                                                    LEFT JOIN employee AS b on b.id = a.employee_id
                                                    LEFT JOIN gadget_type AS v ON v.id = a.gadget_type
                                                    WHERE b.employee_status = 1 AND a.gadget_status = 1
                                                    ";
                            $result = mysqli_query($db,$user_gadget_query);
                                if (mysqli_fetch_array($result) > 0) {
                                    while($row = mysqli_fetch_array($result))  
                                        {  
                                            echo '<tr>
                                                        <td>'.$row['control_number'].'</td>
                                                        <td>'.$row['employee_id'].'</td>
                                                        <td>'.$row['employee_name'].'</td>
                                                        <td>'.$row['gadget_name'].'</td>
                                                        <td>'.$row['gadget_identification'].'</td>
                                                        <td>'.$row['gadget_type'].'</td>
                                                        <td>'.$row['submitted_at'].'</td>
                                                        <td>
                                                            <button class = "btn btn-success" id="btn_edit_user_gadget" name="btn_edit_user_gadget" data-id='.$row['id'].' data-toggle="modal" data-target="#editEmployeeModal"  >Edit</button>
                                                        </td> 
                                                        <td>
                                                            <button class = "btn btn-danger" id="btn_delete_user_gadget" name="btn_delete_user_gadget" data-id1='.$row['id'].'>Delete</button>
                                                        </td>                                                     
                                                    </tr>'; 
                                                   }  
                                               }
                                else
                                {
                                    echo ' <td colspan="5">No Records Found</td> ';
                                }
                        ?>
                                                
                    </tbody>  
                </tbody>
            </table>
   


 <!-- Add Modal HTML -->
 <div id="addEmployeeModal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <form enctype="multipart/form-data">
     <div class="modal-header">      
      <h4 class="modal-title">Add Employee Gadget</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body">     
        <div class="row mt-1">
                <div class="form-group col-lg-6">
                    <label>Employee ID</label>
                    <input type="input" class="form-control" name="employee_id_input" id = "employee_id_input" aria-describedby="emailHelp" placeholder="Employee ID" >
                </div>
                <div class="form-group col-lg-6">
                    <label>Control Number</label>
                    <input type="input" class="form-control" name="control_number_input" id="control_number_input" aria-describedby="emailHelp" placeholder="Control Number" >
                </div>
        </div>
        <div class="row mt-1">
                <div class="form-group col-lg-6">
                    <label>Gadget name</label>
                    <input type="input" class="form-control" name="gadget_name_input"  id="gadget_name_input" aria-describedby="emailHelp" placeholder="Device Name" >
                </div>
                <div class="form-group col-lg-6">
                    <input type="hidden" class="form-control my-2" placeholder="User Name" id="employee_hidden_id">
                    <label>Gadget Identification</label>
                    <input type="input" class="form-control" name="gadget_identification_input"  id="gadget_identification_input" aria-describedby="emailHelp" placeholder="Serial Number/IMEI" >
                </div>                
        </div>
        <div class="row mt-1">
                <div class="form-group col-lg-6">
                    <input type="hidden" class="form-control my-2" placeholder="User Name" id="employee_hidden_id">
                    <label>Date Acquired</label>
                    <input type="date" class="form-control" name="gadget_acquired_date"  id="gadget_acquired_date" aria-describedby="emailHelp" placeholder="Serial Number/IMEI" >
                </div>
                
                <div class="form-group col-lg-6">
                    <label>Ownership Type</label>
                    <div class="dropdown">
                      <select id="ownership_type_input" name="ownership_type_input" class="form-control">
                        <?php
                          while ($ownership_row = mysqli_fetch_array($ownership_result)) {
                            $ownership_id = $ownership_row['ownership_id'];
                            $ownership = $ownership_row['ownership_name'];
                            echo "<option class='dropdown-item' value='$ownership_id'> $ownership</option>";
                          }
                        ?>
                      </select>
                    </div>
                </div>
        </div>

        <div class="row mt-1">
                <div class="form-group col-lg-6">
                    <label>Gadget Type</label>
                    <div class="dropdown">
                      <select id="gadget_type_input" name="gadget_type_input" class="form-control">
                        <?php
                          while ($gadget_row = mysqli_fetch_array($gadget_result)) {
                            $gadget_id = $gadget_row['gadget_id'];
                            $gadget = $gadget_row['gadget_name'];
                            echo "<option class='dropdown-item' value='$gadget_id'> $gadget</option>";
                          }
                        ?>
                      </select>
                  </div>
                </div>
                <div class="form-group col-lg-6">
                    <label>Requisition Type</label>
                    <div class="dropdown">
                      <select id="requisition_type_input" id="requisition_type_input" class="form-control">
                        <?php
                          while ($requisition_row = mysqli_fetch_array($requisition_result)) {
                            $requisition_id = $requisition_row['requisition_id'];
                            $requisition = $requisition_row['requisition_name'];
                            echo "<option class='dropdown-item' value='$requisition_id'> $requisition</option>";
                          }
                        ?>
                      </select>
                  </div>
                </div>
        </div>

        <div class="row mt-1">
                <div class="form-group col-lg-6">
                    <label>Requisition Reason</label>
                    <input type="input" class="form-control" name = "requisition_reason_input" id="requisition_reason_input" aria-describedby="emailHelp" placeholder="Reason" >
                </div>
        </div>

        

     </div>
     <div class="modal-footer">
        <div class="col-md-12 text-right">
            <input type="button" id = 'btn_cancel' name = 'btn_cancel' class="btn btn-default" data-dismiss="modal" value="Cancel">
            <button type="button" id = 'btn_gadget_submit' name = 'btn_gadget_submit' class="btn btn-primary mb-2">Submit</button>
        </div>
     </div>
    </form>
   </div>
  </div>
 </div>

 <!-- Edit Modal HTML -->
  <div id="editEmployeeModal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <form>
     <div class="modal-header">      
      <h4 class="modal-title">Add Employee Gadget</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body">     
        <div class="row mt-1">
                <div class="form-group col-lg-6">
                    <input type="hidden" class="form-control my-2" placeholder="User Name" id="gadget_hidden_id">
                    <label>Employee ID</label>
                    <input type="input" class="form-control" name="employee_id_input_edit" id = "employee_id_input_edit" aria-describedby="emailHelp" placeholder="Employee ID" >
                </div>
                <div class="form-group col-lg-6">
                    <label>Control Number</label>
                    <input type="input" class="form-control" name="control_number_input_edit" id="control_number_input_edit" aria-describedby="emailHelp" placeholder="Control Number" >
                </div>
        </div>
        <div class="row mt-1">
                <div class="form-group col-lg-6">
                    <label>Gadget name</label>
                    <input type="input" class="form-control" name="gadget_name_input_edit"  id="gadget_name_input_edit" aria-describedby="emailHelp" placeholder="Device Name" >
                </div>
                <div class="form-group col-lg-6">
                    <label>Gadget Identification</label>
                    <input type="input" class="form-control" name="gadget_identification_input_edit"  id="gadget_identification_input_edit" aria-describedby="emailHelp" placeholder="Serial Number/IMEI" >
                </div>     
        </div>


        <div class="row mt-1">
                <div class="form-group col-lg-6">
                    <label>Date Acquired</label>
                    <input type="date" class="form-control" name="gadget_acquired_date_edit"  id="gadget_acquired_date_edit" aria-describedby="emailHelp" placeholder="Serial Number/IMEI" >
                </div>
                
                <div class="form-group col-lg-6">
                    <label>Ownership Type</label>
                    <div class="dropdown">
                      <select id="ownership_type_input_edit" name="ownership_type_input_edit" class="form-control">
                        <?php
                          while ($ownership_row = mysqli_fetch_array($ownership_result2)) {
                            $ownership_id = $ownership_row['ownership_id'];
                            $ownership = $ownership_row['ownership_name'];
                            echo "<option class='dropdown-item' value='$ownership_id'> $ownership</option>";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                
        </div>

        <div class="row mt-1">
                <div class="form-group col-lg-6">
                    <label>Gadget Type</label>
                    <div class="dropdown">
                      <select id="gadget_type_input_edit" name="gadget_type_input_edit" class="form-control">
                        <?php
                          while ($gadget_row = mysqli_fetch_array($gadget_result2)) {
                            $gadget_id = $gadget_row['gadget_id'];
                            $gadget = $gadget_row['gadget_name'];
                            echo "<option class='dropdown-item' value='$gadget_id'> $gadget</option>";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="form-group col-lg-6">
                    <label>Requisition Type</label>
                    <div class="dropdown">
                      <select id="requisition_type_input_edit" id="requisition_type_input_edit" class="form-control">
                        <?php
                          while ($requisition_row = mysqli_fetch_array($requisition_result2)) {
                            $requisition_id = $requisition_row['requisition_id'];
                            $requisition = $requisition_row['requisition_name'];
                            echo "<option class='dropdown-item' value='$requisition_id'> $requisition</option>";
                          }
                        ?>
                      </select>
                    </div>
                </div>
        </div>

        <div class="row mt-1">
                <div class="form-group col-lg-6">
                    <label>Requisition Reason</label>
                    <input type="input" class="form-control" name = "requisition_reason_input_edit" id="requisition_reason_input_edit" aria-describedby="emailHelp" placeholder="Reason" >
                </div>
        </div>
     </div>
     <div class="modal-footer">
        <div class="col-md-12 text-right">
            <input type="button" id = 'btn_cancel' name = 'btn_cancel' class="btn btn-default" data-dismiss="modal" value="Cancel">
            <button type="button" id = 'btn_update_gadget' name = 'btn_update_gadget' class="btn btn-primary mb-2">Submit</button>
        </div>
     </div>
    </form>
   </div>
  </div>
 </div>
  
  </div>
  <!-- /.content-wrapper -->
  <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer> -->


  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="js/dataTables.buttons.min.js"></script>

        <script type="text/javascript" src="js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="js/buttons.print.min.js"></script>

        <script type="text/javascript" src="js/bootstrap.js"></script>
         <script type="text/javascript" src="js/dataTables.bootstrap.js"></script>   
        <!-- my script  -->
        <script type="text/javascript">
          $(document).ready(function() {
            $('.user_gadget_checklist_data').DataTable( {
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel']
            });
          }); 
        </script>  
         <script src = "pages/includes/myjs.js"> </script>     

</body>
</html>
