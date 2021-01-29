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

    $fetched_control_no		        = mysqli_real_escape_string($db,$_POST['control_no']);
    $fetched_employee_name			= mysqli_real_escape_string($db,$_POST['employee_name']);
    $fetched_employee_id        	= mysqli_real_escape_string($db,$_POST['company_id']);
    $fetched_company_department		= mysqli_real_escape_string($db,$_POST['company_department']);
    $fetched_employee_position  	= mysqli_real_escape_string($db,$_POST['employee_position']);
    $fetched_phone_unit 			= mysqli_real_escape_string($db,$_POST['phone_unit']);
    $fetched_phone_imei_number		= mysqli_real_escape_string($db,$_POST['imei_number']);
    $fetched_phone_ownership_type	= mysqli_real_escape_string($db,$_POST['phone_ownership']);
    $fetched_laptop_unit     		= mysqli_real_escape_string($db,$_POST['laptop_unit']);
    $fetched_laptop_serial_number	= mysqli_real_escape_string($db,$_POST['laptop_serial_number']);
    $fetched_laptop_ownership_type	= mysqli_real_escape_string($db,$_POST['laptop_ownership']);
    $fetched_laptop_requisition 	= mysqli_real_escape_string($db,$_POST['laptop_requisition_purpose']);
    $fetched_laptop_requisition_reason 	= mysqli_real_escape_string($db,$_POST['laptop_requisition_purpose_reason']);



    if($_POST['laptop_requisition_purpose'] == 'Others')
	 {
		$insert_new_user = "INSERT INTO gadget_checklists(
            control_no,
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
            ' $fetched_control_no',
            '$fetched_employee_name',
            '$fetched_employee_id',
            '$fetched_company_department',
            '$fetched_employee_position',
            '$fetched_phone_unit',
            '$fetched_phone_imei_number',
            '$fetched_phone_ownership_type',
            '$fetched_laptop_unit',
            '$fetched_laptop_serial_number',
            '$fetched_laptop_ownership_type',
            '$fetched_laptop_requisition_reason')";
        $result_insert = mysqli_query($db,$insert_new_user);
	}
	else 
	{
		$insert_new_user = "INSERT INTO gadget_checklists(
            control_no,
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
            ' $fetched_control_no',
            '$fetched_employee_name',
            '$fetched_employee_id',
            '$fetched_company_department',
            '$fetched_employee_position',
            '$fetched_phone_unit',
            '$fetched_phone_imei_number',
            '$fetched_phone_ownership_type',
            '$fetched_laptop_unit',
            '$fetched_laptop_serial_number',
            '$fetched_laptop_ownership_type',
            '$fetched_laptop_requisition')";
        $result_insert = mysqli_query($db,$insert_new_user);
	}
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
		$user_gadget_data[0]    = $fetched_user_id;
		$user_gadget_data[1]    = $row['control_no'];
        $user_gadget_data[2]    = $row['full_name'];
        $user_gadget_data[3]    = $row['company_id_no'];
        $user_gadget_data[4]    = $row['company_department'];
        $user_gadget_data[5]    = $row['position'];
        $user_gadget_data[6]    = $row['model_unit_date_acquired'];
        $user_gadget_data[7]    = $row['imei_no'];
        $user_gadget_data[8]    = $row['ownership_type_cp'];
        $user_gadget_data[9]    = $row['laptop'];
        $user_gadget_data[10]   = $row['serial_no'];
        $user_gadget_data[11]   = $row['ownership_type_laptop'];
        $user_gadget_data[12]   = $row['requisition_purpose'];
    }
        echo json_encode($user_gadget_data);


  
    // $sample = explode("/",$company_department);
    // print_r($sample);
    // echo $sample[0];
    // echo json_encode($user_gadget_data);
    // echo $user_gadget_data[2];
}

function update_gadget_db()
{
    $servername = "150.109.115.26";
    $port 		= "3306";
    $username   = "root";
    $password 	= "jfr3u9t";
    $dbname    	= "gadgetchecklist";
    // connect to database
    $db = mysqli_connect($servername. ':' .$port, $username, $password, $dbname);

    $fetched_user_gadget_hidden_id  = mysqli_real_escape_string($db,$_POST['user_gadget_hidden_id']);
    $fetched_control_no		        = mysqli_real_escape_string($db,$_POST['control_no']);
    $fetched_employee_name			= mysqli_real_escape_string($db,$_POST['employee_name']);
    $fetched_employee_id        	= mysqli_real_escape_string($db,$_POST['company_id']);
    $fetched_company_department		= mysqli_real_escape_string($db,$_POST['company_department']);
    $fetched_employee_position  	= mysqli_real_escape_string($db,$_POST['employee_position']);
    $fetched_phone_unit 			= mysqli_real_escape_string($db,$_POST['phone_unit']);
    $fetched_phone_imei_number		= mysqli_real_escape_string($db,$_POST['imei_number']);
    $fetched_phone_ownership_type	= mysqli_real_escape_string($db,$_POST['phone_ownership']);
    $fetched_laptop_unit     		= mysqli_real_escape_string($db,$_POST['laptop_unit']);
    $fetched_laptop_serial_number	= mysqli_real_escape_string($db,$_POST['laptop_serial_number']);
    $fetched_laptop_ownership_type	= mysqli_real_escape_string($db,$_POST['laptop_ownership']);
    $fetched_laptop_requisition 	= mysqli_real_escape_string($db,$_POST['laptop_requisition_purpose']);
    $fetched_laptop_requisition_reason 	= mysqli_real_escape_string($db,$_POST['laptop_requisition_purpose_reason']);



    if($_POST['laptop_requisition_purpose'] == 'Others')
	{
        $update_category_query = "UPDATE gadget_checklists 
                                SET 
                                control_no 			        = '$fetched_control_no', 
                                full_name 		            = '$fetched_employee_name',
                                company_id_no 			    = '$fetched_employee_id',
                                company_department 		    = '$fetched_company_department',
                                POSITION 			        = '$fetched_employee_position',
                                model_unit_date_acquired    = '$fetched_phone_unit',
                                imei_no 			        = '$fetched_phone_imei_number',
                                ownership_type_cp 			= '$fetched_phone_ownership_type',
                                laptop 			            = '$fetched_laptop_unit',
                                serial_no 			        = '$fetched_laptop_serial_number',
                                ownership_type_laptop 		= '$fetched_laptop_ownership_type',
                                requisition_purpose 		= '$fetched_laptop_requisition_reason'
                                WHERE id	                = '$fetched_user_gadget_hidden_id'";       
	    $result = mysqli_query($db,$update_category_query);
    }
    else 
	{
    $update_category_query = "UPDATE gadget_checklists 
                            SET 
                            control_no 			        = '$fetched_control_no', 
                            full_name 		            = '$fetched_employee_name',
                            company_id_no 			    = '$fetched_employee_id',
                            company_department 		    = '$fetched_company_department',
                            POSITION 			        = '$fetched_employee_position',
                            model_unit_date_acquired    = '$fetched_phone_unit',
                            imei_no 			        = '$fetched_phone_imei_number',
                            ownership_type_cp 			= '$fetched_phone_ownership_type',
                            laptop 			            = '$fetched_laptop_unit',
                            serial_no 			        = '$fetched_laptop_serial_number',
                            ownership_type_laptop 		= '$fetched_laptop_ownership_type',
                            requisition_purpose 		= '$fetched_laptop_requisition'
                            WHERE id	                = '$fetched_user_gadget_hidden_id'";       
    $result = mysqli_query($db,$update_category_query);
	}
    
}
?>