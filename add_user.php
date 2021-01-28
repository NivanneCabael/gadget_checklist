<!DOCTYPE html>
<html>
<head>
	<title>Firebase Prototype</title>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>

     <script src = "pages/includes/myjs.js"> </script> 

<style>
* {
    padding : 0;
    margin : 0;
}
body {
    width : 100vw;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

</style>
</head>
<body>

           <div class="container-fluid mt-3" style="background-color:white;">
            <p id="message" class="text-dark"></p>
           <form>
            <div class="row mt-1">
              <div class="form-group col-lg-3">
                  <label>Employee Name</label>
                  <input type="hidden" class="form-control my-2" placeholder="User Name" id="category_hidden_id">
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
              <div class="form-group col-lg-3">
                  <label>Position</label>
                  <input type="input" class="form-control" id="employee_position_input" aria-describedby="emailHelp" placeholder="Position" >
              </div>
            </div>
            <div class="row mt-1">
              <div class="form-group col-lg-3">
                  <label>Model Unit</label>
                  <input type="input" class="form-control" id="phone_unit_input" aria-describedby="emailHelp" placeholder="Model Unit" >
              </div>
              <div class="form-group col-lg-3">
                  <label>Date Acquired</label>
                  <input type="date" class="form-control" id="phone_date_acquired_input" aria-describedby="emailHelp" placeholder="Date Acquired" >
              </div>
              <div class="form-group col-lg-3">
                  <label>IMEI number </label>
                  <input type="input" class="form-control" id="imei_number_input" aria-describedby="emailHelp" placeholder="IMEI number" >
              </div>
              <div class="form-group col-lg-3">
                  <label>Type of ownership</label>
                  <select id="phone_ownership_input"  name="phone_ownership_input"  class="custom-select">
                    <option selected value="personal_unit_selected">Personal Unit</option>
                    <option value="service_unit_selected">Service Unit</option>
                  </select>
              </div>
            </div>
            <div class="row mt-1">
              <div class="form-group col-lg-3">
                  <label>Laptop Unit</label>
                  <input type="input" class="form-control" id="laptop_unit_input" aria-describedby="emailHelp" placeholder="Laptop Unit" >
              </div>
              <div class="form-group col-lg-3">
                  <label>Date Acquired</label>
                  <input type="date" class="form-control" id="laptop_date_acquired_input" aria-describedby="emailHelp" placeholder="Full Name" >
              </div>
              <div class="form-group col-lg-3">
                  <label>Serial Number </label>
                  <input type="input" class="form-control" id="laptop_serial_number_input" aria-describedby="emailHelp" placeholder="Full Name" >
              </div>
              <div class="form-group col-lg-3">
                  <label>Type of ownership</label>
                  <select id = "laptop_ownership_input" class="custom-select">
                    <option selected value="personal unit">Personal Unit</option>
                    <option value="service unit">Service Unit</option>
                    <option value="no laptop">No laptop</option>
                  </select>
              </div>
              <div class="form-group col-lg-3">
                  <label>Requisition Purpose</label>
                  <input type="input" class="form-control" id="laptop_requisition_purpose_input" aria-describedby="emailHelp" placeholder="Requisition purpose" >
              </div>
            </div>
            <div class="col-md-12 text-right">
                <button type="button" id = 'btn_submit' name = 'btn_submit' class="btn btn-primary mb-2">Submit</button>
            </div>
          </form>
          </div> 

</form>
    
</body>
</html>