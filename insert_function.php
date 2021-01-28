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
            $id 	                    = $data[0];
            $control_number 	        = $data[1];
            $employee_name	            = $data[2];
            $company_id		            = $data[3];
            $company_department	        = $data[4];
            $employee_position 	        = $data[5];
            $date_today		            = $data[6];
            $date_acquired_model_unit   = $data[7];
            $imei_no		            = $data[8];
            $cp_owenership_type		    = $data[9];
            $laptop_status		        = $data[10];
            $serial_no		            = $data[11];
            $laptop_owenership_type		= $data[12];
            $requisition_purpose		= $data[13];

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
                              id,control_no, full_name, company_id_no, company_department, position,model_unit_date_acquired	
                              ,imei_no,ownership_type_cp,laptop,serial_no,ownership_type_laptop,requisition_purpose) 
                                  VALUES ('$id','$control_number','$employee_name','$uppercased_company_id','$uppercased_company_department','$employee_position','$date_acquired_model_unit',
                                '$imei_no','$cp_owenership_type','$laptop_status','$uppercased_serial_no','$laptop_owenership_type','$requisition_purpose')";
                              $result = mysqli_query($db, $query);
                            // header("Location: insert_function.php?import=success");

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