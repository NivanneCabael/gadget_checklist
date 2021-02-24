<?php

require_once('pages/includes/db_connection_localhost.php');

if ($db) {

 
	$filename = $_FILES['filename']['tmp_name'];
    $handle = fopen($filename, "r");

	
	$i = 0;
	$count = 0;
	while ( ($data = fgetcsv($handle,100000,",") ) !== false)  
	{
        $count++;

        $control_number 	            = $data[1];
        $employee_name	                = $data[2];
        $employee_id	                = $data[3];
        $employee_company	            = $data[4];
        $employee_department	        = $data[5];
        $employee_position              = $data[6];
        // $employee_position	        = $data[5];
        // $date_today		              = $data[6];
        // $model_unit_date_acquired   = $data[7];
        // $imei_no		                = $data[8];
        // $cp_owenership_type		      = $data[9];
        // $laptop_unit_date_acquired	= $data[10];
        // $serial_no		              = $data[11];
        // $laptop_owenership_type		  = $data[12];
        // $requisition_purpose		    = $data[13];

        // $date 	= date('Y-m-d H:i:s', $date_time);

        $uppercased_employee_id = strtoupper($employee_id);
        $uppercased_employee_company = strtoupper($employee_company);
        $uppercased_employee_department = strtoupper($employee_department);

        // $company_department_array = explode("/", $company_department);

        // if(sizeof($company_department_array) == 1){
        //     $company_split = explode("-", $company_department);
        //     $data_company_dept = $company_split;
        // }else{
        //     $data_company_dept = $company_department_array;
        // }

        //company insert
        $proper_company_characters = utf8_encode($uppercased_employee_company);
        $proper_company_name = utf8_encode($employee_name);
        $company_checker =  "SELECT 
        id AS company_id,
        name AS company_name
        FROM company
        WHERE 
        name = '$proper_company_characters'";
        $company_result = mysqli_query($db,$company_checker);
        
        if (mysqli_num_rows($company_result) == 0) {
            $insert_company =  "INSERT INTO company (name,created_at) VALUES ('$proper_company_characters',NOW())";
            $insert_new_company_result = mysqli_query($db,$insert_company);
            
            $select_id =  "SELECT LAST_INSERT_ID() as new_inserted_id";
            $inserted_id_query = mysqli_query($db,$select_id);
            $company_id = mysqli_fetch_assoc($inserted_id_query);
        }else{
            $data = mysqli_fetch_array($company_result);
            $company_id = $data['company_id'];
        }

         //department insert
        //$department = sizeof($data_company_dept) > 1 ? trim(strtoupper(utf8_encode($data_company_dept[1]))) : trim(strtoupper(utf8_encode($data_company_dept[0])));
        $department_checker =  "SELECT 
        id AS department_id,
        name AS department_name
        FROM department
        WHERE 
        name = '$uppercased_employee_department'";
        $dept_result = mysqli_query($db,$department_checker);
        
        if (mysqli_num_rows($dept_result) == 0 && $uppercased_employee_department !== '') {
            $insert_department =  "INSERT INTO department (name,created_at) VALUES ('$uppercased_employee_department',NOW())";
            $insert_new_company_result = mysqli_query($db,$insert_department);
            $select_id =  "SELECT LAST_INSERT_ID() as new_inserted_id";
            $inserted_id_query = mysqli_query($db,$select_id);
            $department_id = mysqli_fetch_assoc($inserted_id_query);
        }else{
            $data = mysqli_fetch_array($dept_result);
            $department_id = $data['department_id'];
        }

        //employee insert
        
        $name = utf8_encode($employee_name);
        $employee_checker =  "SELECT id as employee_id FROM employee WHERE employee_name = '$name'";

        $employee_result = mysqli_query($db,$employee_checker);
        if (mysqli_num_rows($employee_result) == 0 && $employee_name !== '') {
            $insert_employee =  "INSERT INTO employee (employee_id,company_id,department_id,position,employee_name,employee_status,created_at) VALUES ('$uppercased_employee_id',$company_id,$department_id,'$employee_position','$name',1,NOW())";
           
            $insert_employee_result = mysqli_query($db,$insert_employee);
            $select_id = "SELECT LAST_INSERT_ID() as new_inserted_id";
            $inserted_id_query = mysqli_query($db,$select_id);
            $employee_id_new_inserted = mysqli_fetch_assoc($inserted_id_query);
        }else{
            $data = mysqli_fetch_array($employee_result);
            $employee_id_new_insterted = $data['employee_id'];
        }


        //gadgetchecklist
        
	}
}
else 
{
		header("Location: insert_function.php?failed=failed");
}
?>