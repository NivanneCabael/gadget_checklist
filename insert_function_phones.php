<?php
// $servername = "150.109.115.26";
// $port 		= "3306";
// $username   = "root";
// $password 	= "jfr3u9t";
// $dbname    	= "gadgetchecklist";
// // connect to database
// $db = mysqli_connect($servername. ':' .$port, $username, $password, $dbname);

require_once('pages/includes/db_connection_online.php');

if ($db) {

 
	$filename = $_FILES['filename']['tmp_name'];
    $handle = fopen($filename, "r");

	
	$i = 0;
	$count = 0;
	while ( ($data = fgetcsv($handle,100000,",") ) !== false)  
	{
        $count++;

        $control_number 	            = $data[1];
        $employee_id	                = $data[2];
        $phone_model                    = $data[3];
        $date_acquired	                = $data[4];
        $phone_identification           = $data[5];
        $phone_ownership_type           = $data[6];


        $uppercased_employee_id = strtoupper($employee_id);
        $uppercased_control_no = strtoupper($control_number);


        //check if ownership type is in the table
        $proper_company_characters = utf8_encode($phone_model);
        $ownership_checker =  "SELECT 
        id AS ownership_id
        FROM ownership_type
        WHERE 
        name LIKE '$phone_ownership_type'";
        $ownership_result = mysqli_query($db,$ownership_checker);
        
        if (mysqli_num_rows($ownership_result) != 0) {
            $employee_checker =  "SELECT 
            id AS employee_id
            FROM employee
            WHERE 
            employee_id  LIKE '$uppercased_employee_id'";
            $employee_result = mysqli_query($db,$employee_checker);
            
            if(mysqli_num_rows($employee_result) != 0)
            {
                $data = mysqli_fetch_array($ownership_result);
                $ownership_id= $data['ownership_id'];

                $employee_data = mysqli_fetch_array($employee_result);
                $fetched_employee_id= $employee_data['employee_id'];

                $insert_phone_query =  "INSERT INTO gadget_checklist (employee_id,control_number,gadget_name,gadget_identification,
                                    ownership_type_id,gadget_type,date_acquired,requisition_type_id,requisition_purpose_reason,created_at) 
                                VALUES ($fetched_employee_id,'$control_number','$phone_model','$phone_identification',
                                $ownership_id,1,'$date_acquired',6,' ',NOW())";
                $insert_new_phone_result = mysqli_query($db,$insert_phone_query);
            }
            else {
                echo 'error for employee';
                echo '<br>';
                echo $fetched_employee_id;
            }

        }else{
            // $data = mysqli_fetch_array($company_result);
            // $company_id = $data['company_id'];
            echo 'error';
        }

	 }
}
else 
{
		header("Location: insert_function.php?failed=failed");
}
?>