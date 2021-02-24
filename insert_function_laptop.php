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
        $laptop_model                    = $data[3];
        $date_acquired	                = $data[4];
        $laptop_identification           = $data[5];
        $laptop_ownership_type           = $data[6];
        $laptop_requisition                = $data[7];
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
        $uppercased_control_no = strtoupper($control_number);

        // $company_department_array = explode("/", $company_department);

        // if(sizeof($company_department_array) == 1){
        //     $company_split = explode("-", $company_department);
        //     $data_company_dept = $company_split;
        // }else{
        //     $data_company_dept = $company_department_array;
        // }

        //check if ownership type is in the table
        $proper_company_characters = utf8_encode($laptop_model);
        $ownership_checker =  "SELECT 
        id AS ownership_id
        FROM ownership_type
        WHERE 
        name LIKE '$laptop_ownership_type'";
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
                $laptop_requisition_checker=  "SELECT 
                id AS requisition_id
                FROM requisition_type
                WHERE 
                name  LIKE '$laptop_requisition'";
                $laptop_requisition_result = mysqli_query($db,$laptop_requisition_checker);

                if(mysqli_num_rows($laptop_requisition_result) != 0)
                {
                    $data = mysqli_fetch_array($ownership_result);
                    $ownership_id= $data['ownership_id'];

                    $employee_data = mysqli_fetch_array($employee_result);
                    $fetched_employee_id= $employee_data['employee_id'];
                    
                    $requisition_checker =  "SELECT 
                    id AS requisition_id
                    FROM requisition_type
                    WHERE 
                    name  LIKE '$laptop_requisition'";
                    $requisition_result = mysqli_query($db,$employee_checker);

                    $requisition_data = mysqli_fetch_array($laptop_requisition_result);
                    $fetched_requisition_id= $requisition_data['requisition_id'];
                    
                    $insert_laptop_query =  "INSERT INTO gadget_checklist (employee_id,control_number,gadget_name,gadget_identification,
                                        ownership_type_id,gadget_type,date_acquired,requisition_type_id,requisition_purpose_reason,created_at) 
                                    VALUES ($fetched_employee_id,'$control_number','$laptop_model','$laptop_identification',
                                    $ownership_id,2,'$date_acquired',$fetched_requisition_id,' ',NOW())";
                    $insert_new_laptop_result = mysqli_query($db,$insert_laptop_query);
                }
                else 
                {
                    $data = mysqli_fetch_array($ownership_result);
                    $fetched_ownership_id= $data['ownership_id'];

                    $employee_data = mysqli_fetch_array($employee_result);
                    $fetched_employee_id= $employee_data['employee_id'];

                    $requisition_data = mysqli_fetch_array($laptop_requisition_result);
                    $fetched_requisition_id= $requisition_data['requisition_id'];
                
                    $insert_laptop_query =  "INSERT INTO gadget_checklist (employee_id,control_number,gadget_name,gadget_identification,
                        ownership_type_id,gadget_type,date_acquired,requisition_type_id,requisition_purpose_reason,created_at) 
                        VALUES ($fetched_employee_id,'$control_number','$laptop_model','$laptop_identification',
                        $fetched_ownership_id,2,'$date_acquired',6,'$laptop_requisition',NOW())";
                    $insert_new_laptop_result = mysqli_query($db,$insert_laptop_query);
                }
       
            }
        }
        else 
        {
           echo 'something went wrong';
        }
                
    }

    //      //department insert
    //     //$department = sizeof($data_company_dept) > 1 ? trim(strtoupper(utf8_encode($data_company_dept[1]))) : trim(strtoupper(utf8_encode($data_company_dept[0])));
    //     $department_checker =  "SELECT 
    //     id AS department_id,
    //     name AS department_name
    //     FROM department
    //     WHERE 
    //     name = '$uppercased_employee_department'";
    //     $dept_result = mysqli_query($db,$department_checker);
        
    //     if (mysqli_num_rows($dept_result) == 0 && $uppercased_employee_department !== '') {
    //         $insert_department =  "INSERT INTO department (name,created_at) VALUES ('$uppercased_employee_department',NOW())";
    //         $insert_new_company_result = mysqli_query($db,$insert_department);
    //         $select_id =  "SELECT LAST_INSERT_ID() as new_inserted_id";
    //         $inserted_id_query = mysqli_query($db,$select_id);
    //         $department_id = mysqli_fetch_assoc($inserted_id_query);
    //     }else{
    //         $data = mysqli_fetch_array($dept_result);
    //         $department_id = $data['department_id'];
    //     }

    //     //employee insert
        
    //     $name = utf8_encode($employee_name);
    //     $employee_checker =  "SELECT id as employee_id FROM employee WHERE employee_name = '$name'";

    //     $employee_result = mysqli_query($db,$employee_checker);
    //     if (mysqli_num_rows($employee_result) == 0 && $employee_name !== '') {
    //         $insert_employee =  "INSERT INTO employee (employee_id,company_id,department_id,position,employee_name,created_at) VALUES ('$employee_id',$company_id,$department_id,'$employee_position','$name',NOW())";
           
    //         $insert_employee_result = mysqli_query($db,$insert_employee);
    //         $select_id = "SELECT LAST_INSERT_ID() as new_inserted_id";
    //         $inserted_id_query = mysqli_query($db,$select_id);
    //         $employee_id_new_inserted = mysqli_fetch_assoc($inserted_id_query);
    //     }else{
    //         $data = mysqli_fetch_array($employee_result);
    //         $employee_id_new_insterted = $data['employee_id'];
    //     }


    //     //gadgetchecklist
        
     
}
else 
{
		header("Location: insert_function.php?failed=failed");
}
?>