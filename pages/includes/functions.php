<?php

function insert_gadget_db()
{
    $servername = "150.109.115.26";
    $port 		= "3306";
    $username   = "root";
    $password 	= "jfr3u9t";
    $dbname    	= "gadgetchecklist";
    // connect to database
    $db = mysqli_connect($servername. ':' .$port, $username, $password, $dbname);
    
    $fetched_employee_name			= mysqli_real_escape_string($db,$_POST['employee_name']);
    $fetched_employee_id        	= mysqli_real_escape_string($db,$_POST['company_id']);
    $fetched_company_department		= mysqli_real_escape_string($db,$_POST['company_department']);
    $fetched_employee_position  	= mysqli_real_escape_string($db,$_POST['employee_position']);
    $fetched_phone_unit 			= mysqli_real_escape_string($db,$_POST['phone_unit']);
    $fetched_phone_date         	= mysqli_real_escape_string($db,$_POST['phone_date_acquired']);
    $fetched_phone_imei_number		= mysqli_real_escape_string($db,$_POST['imei_number']);
    $fetched_phone_ownership_type	= mysqli_real_escape_string($db,$_POST['phone_ownership']);
    $fetched_laptop_unit     		= mysqli_real_escape_string($db,$_POST['laptop_unit']);
    $fetched_laptop_date	        = mysqli_real_escape_string($db,$_POST['laptop_date_acquired']);
    $fetched_laptop_serial_number	= mysqli_real_escape_string($db,$_POST['laptop_serial_number']);
    $fetched_laptop_ownership_type	= mysqli_real_escape_string($db,$_POST['laptop_ownership']);
    $fetched_laptop_requisition 	= mysqli_real_escape_string($db,$_POST['laptop_requisition_purpose']);

    $insert_new_user = "INSERT INTO gadget_checklists(
        full_name,
        company_id_no,
        company_department,
        POSITION,
        model_unit_date_acquired,
        imei_no,
        ownership_type_cp,
        laptop,
        serial_no,
        ownership_type_laptop,
        requisition_purpose)
        VALUES (
        '$fetched_employee_name',
        '$fetched_employee_id',
        '$fetched_company_department',
        '$fetched_employee_position',
        '".$fetched_phone_unit." / ".$fetched_phone_date."',
        '$fetched_phone_imei_number',
        '$fetched_phnoe_ownership_type',
        '".$fetched_laptop_unit." / ".$fetched_laptop_date."',
        '$fetched_laptop_serial_number',
        '$fetched_laptop_ownership_type',
        '$fetched_laptop_requisition')";
	$result_insert = mysqli_query($db,$insert_new_user);
}

function fetch_row_data()
{
    $servername = "150.109.115.26";
    $port 		= "3306";
    $username   = "root";
    $password 	= "jfr3u9t";
    $dbname    	= "gadgetchecklist";
    // connect to database
    $db = mysqli_connect($servername. ':' .$port, $username, $password, $dbname);

    $fetched_user_id = mysqli_real_escape_string($db,$_POST['user_id']);
    $get_user_gadget_query = "SELECT * FROM gadget_checklists WHERE id = '$fetched_user_id'";
    $fetched_user_gadget_result = mysqli_query($db,$get_user_gadget_query);

    while ($row = mysqli_fetch_assoc($fetched_user_gadget_result)) 
	{
		$user_gadget_data = array();
		$user_gadget_data[0] = $fetched_user_id;
		// $user_gadget_data[1] = $row['company'];
        $company_department = $row['company_department'];
        
        // $user_gadget_data[2] = $row['company_department'];
        

    }

  
    $sample = explode("/",$company_department);
    print_r($sample);
    echo $sample[0];
    // echo json_encode($user_gadget_data);
    // echo $user_gadget_data[2];
}
?>