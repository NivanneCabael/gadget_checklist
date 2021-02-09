<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="pages\includes\style2.css">
</head>
<body>
    <div class="table-container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Employees</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover user_gadget_checklist_data">
                <thead>
                    <tr>
                        <th scope="col">control number</th>
                        <th scope="col">full name</th>
                        <th scope="col">company id number</th>
                        <th scope="col">company/department</th>
                        <th scope="col">position</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id = "user_gadgets_data"> 
                        <?php 
                            $servername = "150.109.115.26";
                            $port 		= "3306";
                            $username   = "root";
                            $password 	= "jfr3u9t";
                            $dbname    	= "gadgetchecklist";
                            $db = mysqli_connect($servername. ':' .$port, $username, $password, $dbname);

                            $user_gadget_query =   "SELECT 
                                                    id AS id,
                                                    control_no AS control_number,
                                                    full_name AS employee_name,
                                                    company_id_no AS employee_id,
                                                    company_department AS company_department,
                                                    `position` AS employee_position,
                                                    model_unit_date_acquired AS cp_unit_date_acquired,
                                                    imei_no AS imei_no,
                                                    ownership_type_cp AS cp_ownership_type,
                                                    laptop AS laptop_unit_date_acquired,
                                                    serial_no AS laptop_serial_number,
                                                    ownership_type_laptop AS laptp_onwership_type,
                                                    requisition_purpose AS laptop_requisition_purpose
                                                    FROM `gadget_checklists`
                                                    order by id desc
                                                    ";
                            $result = mysqli_query($db,$user_gadget_query);
                                if (mysqli_fetch_array($result) > 0) {
                                    while($row = mysqli_fetch_array($result))  
                                        {  
                                            echo '<tr>
                                                        <td>'.$row['control_number'].'</td>
                                                        <td>'.$row['employee_name'].'</td>
                                                        <td>'.$row['employee_id'].'</td>
                                                        <td>'.$row['company_department'].'</td>
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
    <form>
     <div class="modal-header">      
      <h4 class="modal-title">Add Employee Gadget</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body">     
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
                  <label>Type of ownership</label><br>
                  <select id="phone_ownership_input"  name="phone_ownership_input"  class="custom-select">
                    <option selected value="Personal Unit">Personal Unit</option>
                    <option value="Service Unit">Service Unit</option>
                  </select>
              </div>
        </div>
        <div class="row mt-1">
            <div class="form-group col-lg-3">
                <label>Laptop Unit/Date Acquired</label><br>
                <input type="input" class="form-control" id="laptop_unit_input" aria-describedby="emailHelp" placeholder="Laptop Unit / Date Acquired" >
            </div>
            <div class="form-group col-lg-3">
                <label>Serial Number </label>
                <input type="input" class="form-control" id="laptop_serial_number_input" aria-describedby="emailHelp" placeholder="Serial Number" >
            </div>
            <div class="form-group col-lg-3">
                <label>Type of ownership</label><br>
                <select id = "laptop_ownership_input" class="custom-select">
                    <option selected value="personal unit">Personal Unit</option>
                    <option value="service unit">Service Unit</option>
                    <option value="NO LAPTOP">No laptop</option>
                </select>
            </div>
        </div>
        <div class="row mt-1">
            <div class="form-group col-lg-3">
                <label>Requsition Purpose</label><br>
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
     </div>
     <div class="modal-footer">
        <div class="col-md-12 text-right">
            <input type="button" id = 'btn_cancel' name = 'btn_cancel' class="btn btn-default" data-dismiss="modal" value="Cancel">
            <button type="button" id = 'btn_submit' name = 'btn_submit' class="btn btn-primary mb-2">Submit</button>
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
                    <input type="hidden" class="form-control my-2" placeholder="User Name" id="user_gadget_hidden_id">
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
            <button type="button" id = 'btn_submit_edit' name = 'btn_submit_edit' class="btn btn-primary mb-2">Submit</button>
        </div>
     </div>
    </form>
   </div>
  </div>
 </div>


 <!-- Delete Modal HTML -->
 <div id="deleteEmployeeModal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <form>
     <div class="modal-header">      
      <h4 class="modal-title">Delete Employee</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body">     
      <p>Are you sure you want to delete these Records?</p>
      <p class="text-warning"><small>This action cannot be undone.</small></p>
     </div>
     <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
      <input type="submit" class="btn btn-danger" value="Delete">
     </div>
    </form>
   </div>
  </div>
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