<!DOCTYPE html>
<?php
session_start();

    if(isset($_SESSION['User']))
    {
    }
    else
    {
        header("location:login_page.php");
    }
?>
<html>
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">Import Gadget Checklist  </h3>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Import</li>
            </ol>
          </div>


           <div class="container-fluid mt-3" style="background-color:white;">
            <form action="insert_function.php" method="post" enctype="multipart/form-data">
            <div>
                <label>Choose CSV File</label> 
                <input type="file" name="filename" id="file" accept=".csv" required>
                <button type="submit" id="submit" name="submit" class="btn-submit">Import</button>
            </div>

            </form>
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
        <script src = "pages/includes/myjs.js"> </script> 
        <script type="text/javascript">
          $(document).ready(function() {
            $('#user_gadget_checklist_data').DataTable( {
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel']
            });
          });
        </script>        

</body>
</html>
