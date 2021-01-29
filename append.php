<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Calendar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/buttons.dataTables.min.css"> 
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>

 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
      <h3><center>Chums Shop</center></h3>
      <h3><center>CMS</center></h3>
    </a>

    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-closed">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../index.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
            </ul>
          </li>
  
          <li class="nav-header">Products</li>
          <li class="nav-item">
            <a href="./add_category.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Add category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="./add_product_options.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Add product option
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">Add Product Category  </h3>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>


           <div class="container-fluid mt-3" style="background-color:white;">
            <p id="message" class="text-dark"></p>
           <form>
            <div class="row mt-1">
            <div class="form-group col-lg-3">
                    <label>Control Number</label>
                    <input type="hidden" class="form-control my-2" placeholder="User Name" id="user_gadget_hidden_id">
                    <input type="input" class="form-control" id="control_number_input" aria-describedby="emailHelp" placeholder="Control number" >
                </div>
                <div class="form-group col-lg-3">
                    <label>Employee Name</label>
                    <input type="input" class="form-control" id="employee_name_input" placeholder="Employee Name" >
                </div>
                <div class="form-group col-lg-3">
                    <label>Company ID number</label>
                    <input type="input" class="form-control" id="company_id_input" aria-describedby="emailHelp" placeholder="Company ID" >
                </div>
                <div class="form-group col-lg-3">
                    <label>Company/Department</label>
                    <input type="input" class="form-control" id="company_department_input" aria-describedby="emailHelp" placeholder="Company/Department" >
                </div>
            </div>
            <div class="row mt-1">
            <div class="form-group col-lg-3">
                    <label>Position</label>
                    <input type="input" class="form-control" id="employee_position_input" aria-describedby="emailHelp" placeholder="Position" >
                </div>
              <div class="form-group col-lg-3">
                  <label>Model Unit / Date Acquired</label>
                  <input type="input" class="form-control" id="phone_unit_input" aria-describedby="emailHelp" placeholder="Model Unit / Date Acquired " >
              </div>
              <div class="form-group col-lg-3">
                  <label>IMEI number </label>
                  <input type="input" class="form-control" id="imei_number_input" aria-describedby="emailHelp" placeholder="IMEI number" >
              </div>
              <div class="form-group col-lg-3">
                  <label>Type of ownership</label>
                  <select id="phone_ownership_input"  name="phone_ownership_input"  class="custom-select">
                    <option selected value="Personal Unit">Personal Unit</option>
                    <option value="Service Unit">Service Unit</option>
                  </select>
              </div>
              </div>
              <div class="row mt-1">
              <div class="form-group col-lg-3">
                  <label>Laptop Unit/Date Acquired</label>
                  <input type="input" class="form-control" id="laptop_unit_input" aria-describedby="emailHelp" placeholder="Laptop Unit / Date Acquired" >
              </div>
              <div class="form-group col-lg-3">
                  <label>Serial Number </label>
                  <input type="input" class="form-control" id="laptop_serial_number_input" aria-describedby="emailHelp" placeholder="Serial Number" >
              </div>
              <div class="form-group col-lg-3">
                  <label>Type of ownership</label>
                  <select id = "laptop_ownership_input" class="custom-select">
                    <option selected value="personal unit">Personal Unit</option>
                    <option value="service unit">Service Unit</option>
                    <option value="no laptop">No laptop</option>
                  </select>
              </div>
            </div>
            <div class="row mt-1">
              <div class="form-group col-lg-3">
                  <label>Requsition Purpose</label>
                  <select id = "laptop_requisition_purpose_input" class="custom-select">
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
                  <input type="input" class="form-control" id="laptop_requisition_purpose_reason_input" aria-describedby="emailHelp" placeholder="Requisition purpose reason" >
              </div>
            </div>
            <div class="col-md-12 text-right">
                <button type="button" id = 'btn_submit' name = 'btn_submit' class="btn btn-primary mb-2">Submit</button>
            </div>
          </form>
          </div> 
            
          <h3 class="mt-3 text-dark">List of Product Categories</h3>
          <div class="container-fluid mt-3" style="background-color:white;">
            <div id="user_gadget_table">
            
            </div>

          </div>

         </div>
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
        <!-- my script -->
        <script src = "pages/includes/myjs2.js"> </script> 
        <!-- <script type="text/javascript">
          $(document).ready(function() {
            $('#user_gadget_checklist_data').DataTable( {
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel']
            });
          });
        </script>         -->

</body>
</html>
