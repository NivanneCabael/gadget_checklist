<?php
$servername = "150.109.115.26";
$port 		= "3306";
$username   = "root";
$password 	= "jfr3u9t";
$dbname    	= "gadgetchecklist";
// connect to database
$db = mysqli_connect($servername. ':' .$port, $username, $password, $dbname);


if ($db) {

 
	$filename = $_FILES['filename']['tmp_name'];
  $handle = fopen($filename, "r");

	
	$i = 0;
	$count = 0;
	while ( ($data = fgetcsv($handle,100000,",") ) !== false)  
	{
            $count++;
            $control_number 	        = $data[0];
            $employee_name	          = $data[1];
            $company_id		            = $data[2];
            $company_department	      = $data[3];
            $employee_position 	      = $data[4];
            $date_today		            = $data[55];
            $date_acquired_model_unit = $data[6];
            $imei_no		              = $data[7];
            $cp_owenership_type		    = $data[8];
            $laptop_status		        = $data[9];
            $serial_no		            = $data[10];
            $laptop_owenership_type		= $data[11];
            $requisition_purpose		  = $data[12];

            // $date 	= date('Y-m-d H:i:s', $date_time);
            
            $uppercased_company_id = strtoupper($company_id);
            $uppercased_company_department = strtoupper($company_department);
            $uppercased_serial_no = strtoupper($serial_no);

			//select statement to check if there is a duplicate entries
      //       $checkexistingdata = "SELECT * 
      //                   FROM gadget_checklists
      //                   WHERE control_no = '$control_number' 
      //                   AND company_id_no = '$company_id' 
      //                   AND imei_no = '$imei_no' 
      //                   AND serial_no = '$serial_no'  ";
      //       $resultcheck = mysqli_query($db,$checkexistingdata);
      //       $countexistingdata = mysqli_num_rows($resultcheck);
			// //echo "$countexistingdata";

			// //check if there is a duplicate data in the database 
      //       if ($countexistingdata == 0) 
      //       {
			        //if the data is not a duplicate, insert the data.
              if ($count > 1) {
                $query = "INSERT INTO gadget_checklists( 
                              control_no, full_name, company_id_no, company_department, position,model_unit_date_acquired	
                              ,imei_no,ownership_type_cp,laptop,serial_no,ownership_type_laptop,requisition_purpose) 
                                  VALUES ('$control_number','$employee_name','$uppercased_company_id','$uppercased_company_department','$employee_position','$date_acquired_model_unit',
                                '$imei_no','$cp_owenership_type','$laptop_status','$uppercased_serial_no','$laptop_owenership_type','$requisition_purpose')";
                              $result = mysqli_query($db, $query);
                            header("Location: import_users.php?import=success");

              }

              //if the data is a duplicate,delete the data to prevent duplicate data
              else
              {
                $query = "DELETE * FROM gadget_checklists
                WHERE control_no = '$control_number'";
                $result = mysqli_query($db, $query);
                // header("Location: order-management-import.php?import=success");
              }
			      // }
	}

	
}
else 
{
		header("Location: insert_function.php?failed=failed");
}
?>