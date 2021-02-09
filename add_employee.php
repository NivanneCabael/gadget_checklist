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

    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-closed">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
            </ul>
          </li>
  
          <li class="nav-header">Gadget Checklist</li>
          <li class="nav-item">
            <a href="list_gadgets.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p> Add User </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="import_users.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Import User gadget
              </p>
            </a>
          </li>

          <li class="nav-header">Logout</li>
          <li class="nav-item">
            <a href="logout_function.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

          <!-- <li class="nav-header">Logout</li>
          <li class="nav-item">
            <a href="calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>Logout</p>
            </a>
          </li> -->
        </ul>
      </nav>
    </div>

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
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover user_gadget_checklist_data">
                <thead>
                    <tr>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Employee name</th>
                        <th scope="col">Department</th>
                        <th scope="col">Company</th>
                        <th scope="col">position</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id = "user_gadgets_data"> 
                        <?php 
                                if (mysqli_fetch_array($employee_results) > 0) {
                                    while($row = mysqli_fetch_array($employee_results))  
                                        {  
                                            echo '<tr>
                                                        <td>'.$row['employee_id'].'</td>
                                                        <td>'.$row['employee_name'].'</td>
                                                        <td>'.$row['department_name'].'</td>
                                                        <td>'.$row['company_name'].'</td>
                                                        <td>'.$row['employee_position'].'</td>
                                                        <td>
                                                            <button class = "btn btn-success" id="btn_edit_user_gadget" name="btn_edit_user_gadget" data-id='.$row['id'].' data-toggle="modal" data-target="#editEmployeeModal"  >Edit</button>
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
      <h4 class="modal-title">Add New Employee</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body">     
        <div class="row mt-1">
                <div class="form-group col-lg-4">
                    <label>Employee Image</label>
                    <input type="file" class="form-control-file" id="employee_picture_input" name="employee_picture_input" accept="image/*">
                </div>
                <div class="form-group col-lg-4">
                    <input type="hidden" class="form-control my-2" placeholder="User Name" id="employee_hidden_id">
                    <label>Employee ID</label>
                    <input type="input" class="form-control" id="employee_id_input" aria-describedby="emailHelp" placeholder="Employee ID" >
                </div>
                <div class="form-group col-lg-4">
                    <label>Employee Name</label>
                    <input type="input" class="form-control" id="employee_name_input" aria-describedby="emailHelp" placeholder="Company ID" >
                </div>
        </div>
        <div class="row mt-1">
                <div class="form-group col-lg-4">
                    <label>Company</label>
                    <div class="dropdown">
                      <select id="employee_company_input" class="form-control">
                        <?php
                          while ($company_row = mysqli_fetch_array($company_result)) {
                            $company_id = $company_row['company_id'];
                            $company = $company_row['company_name'];
                            echo "<option class='dropdown-item' value='$company_id'> $company</option>";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    <label>Department</label>
                    <div class="dropdown">
                      <select id="employee_department_input" class="form-control">
                        <?php
                          while ($row = mysqli_fetch_array($department_result)) {
                            $department_id = $row['department_id'];
                            $department = $row['department_name'];
                            echo "<option class='dropdown-item' value='$department_id'> $department</option>";
                          }
                        ?>
                      </select>
                  </div>
                </div>
                <div class="form-group col-lg-4">
                    <label>Position</label>
                    <input type="input" class="form-control" id="employee_position_input" aria-describedby="emailHelp" placeholder="Position" >
                </div>
        </div>
     </div>
     <div class="modal-footer">
        <div class="col-md-12 text-right">
            <input type="button" id = 'btn_cancel' name = 'btn_cancel' class="btn btn-default" data-dismiss="modal" value="Cancel">
            <button type="button" id = 'btn_employee_submit' name = 'btn_employee_submit' class="btn btn-primary mb-2">Submit</button>
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
                    <div class="form-group col-lg-3">
                        <label>Control Number</label>
                        <input type="hidden" class="form-control my-2" placeholder="User Name" id="user_gadget_hidden_id_edit">
                        <input type="input" class="form-control" id="control_number_input_edit" aria-describedby="emailHelp" placeholder="Control number" >
                    </div>
                    <div class="form-group col-lg-3">
                        <label>Employee Name</label>
                        <input type="input" class="form-control" id="employee_name_input_edit" placeholder="Employee Name" >
                    </div>
                    <div class="form-group col-lg-3">
                        <label>Company ID number</label>
                        <input type="input" class="form-control" id="company_id_input_edit" aria-describedby="emailHelp" placeholder="Company ID" ></div>
                    <div class="form-group col-lg-3">
                        <label>Company/Department</label>
                        <input type="input" class="form-control" id="company_department_input_edit" aria-describedby="emailHelp" placeholder="Company/Department" >
                    </div>
            </div>
            <div class="row mt-1">
                    <div class="form-group col-lg-3">
                        <label>Position</label>
                        <input type="input" class="form-control" id="employee_position_input_edit" aria-describedby="emailHelp" placeholder="Position" >
                    </div>
                    <div class="form-group col-lg-3">
                        <label>Model Unit / Date Acquired</label>
                        <input type="input" class="form-control" id="phone_unit_input_edit" aria-describedby="emailHelp" placeholder="Model Unit / Date Acquired " >
                    </div>
                    <div class="form-group col-lg-3">
                        <label>IMEI number </label>
                        <input type="input" class="form-control" id="imei_number_input_edit" aria-describedby="emailHelp" placeholder="IMEI number" >
                    </div>
                    <div class="form-group col-lg-3">
                        <label>Type of ownership</label> <br>
                        <select id="phone_ownership_input"  name="phone_ownership_input_edit"  class="custom-select">
                            <option selected value="Personal Unit">Personal Unit</option>
                            <option value="Service Unit">Service Unit</option>
                        </select>
                    </div>
            </div>
            <div class="row mt-1">
                <div class="form-group col-lg-3">
                    <label>Laptop Unit/Date Acquired</label>
                    <input type="input" class="form-control" id="laptop_unit_input_edit" aria-describedby="emailHelp" placeholder="Laptop Unit / Date Acquired" >
                </div>
                <div class="form-group col-lg-3">
                    <label>Serial Number </label>
                    <input type="input" class="form-control" id="laptop_serial_number_input_edit" aria-describedby="emailHelp" placeholder="Serial Number" >
                </div>
                <div class="form-group col-lg-3">
                    <label>Type of ownership</label> <br>
                    <select id = "laptop_ownership_input_edit" class="custom-select">
                        <option selected value="personal unit">Personal Unit</option>
                        <option value="service unit">Service Unit</option>
                        <option value="NO LAPTOP">No laptop</option>
                    </select>
                </div>
            </div>
            <div class="row mt-1">
                <div class="form-group col-lg-3">
                    <label>Requsition Purpose</label> <br>
                    <select id = "laptop_requisition_purpose_input_edit" class="custom-select">
                        <option selected value="First Time">First Time</option>
                        <option value="Loss">Loss</option>
                        <option value="Additional Gadget">Additional Gadget</option>
                        <option value="Change of Unit">Change of Unit</option>
                        <option value="Checklist Replacement">Checklist Replacement</option>
                        <option value="Others">Others:</option>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label>Requisition Purpose Reason</label>
                    <input type="input" class="form-control" id="laptop_requisition_purpose_reason_input_edit" aria-describedby="emailHelp" placeholder="Requisition purpose reason" >
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="col-md-12 text-right">
                <input type="button" id = 'btn_cancel' name = 'btn_cancel' class="btn btn-default" data-dismiss="modal" value="Cancel">
                <button type="button" id = 'btn_update' name = 'btn_update' class="btn btn-primary mb-2">Submit</button>
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
