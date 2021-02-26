<?php

function update_record()
{
    if($_POST['table_name'] == 'employee'){
        update_employee();
    }
    elseif ($_POST['table_name'] == 'employee_img') {
        update_employee_img();
    }
    elseif($_POST['table_name'] == 'gadget') {
        update_employee_gadget();
    }
}

function insert_new_record()
{
    if($_POST['table_name'] == 'employee'){
        insert_new_user();
    }
    elseif($_POST['table_name'] == 'gadget')  {
        insert_new_gadget();
    }
    elseif($_POST['table_name'] == 'employee_no_picutre')  {
        insert_new_user_no_pic();
    }
}

function get_row()
{
    if($_POST['table_name'] == 'employee'){
        fetch_row_data();
    }
    elseif($_POST['table_name'] == 'gadget')  {
        fetch_gadget_row_data();
    }
}

function delete_record()
{
    if($_POST['table_name'] == 'employee'){
        delete_user();
    }
    elseif($_POST['table_name'] == 'gadget')  {
        delete_user_gadget();
    }
}


Function insert_new_gadget()
{


    require_once('includes/db_connection_online.php');

    // echo $url;
    $fetched_table_name			        = mysqli_real_escape_string($db,$_POST['table_name']);
    $fetched_employee_id			    = mysqli_real_escape_string($db,$_POST['employee_id']);
    $fetched_control_number 		    = mysqli_real_escape_string($db,$_POST['control_number']);
    $fetched_gadget_name        	    = mysqli_real_escape_string($db,$_POST['gadget_name']);
    $fetched_gadget_identification   	= mysqli_real_escape_string($db,$_POST['gadget_identification']);
    $fetched_gadget_acquired_date	    = mysqli_real_escape_string($db,$_POST['gadget_acquired_date']);
    $fetched_ownership_type      	    = mysqli_real_escape_string($db,$_POST['ownership_type']);
    $fetched_gadget_type		        = mysqli_real_escape_string($db,$_POST['gadget_type']);
    $fetched_requisition_type		    = mysqli_real_escape_string($db,$_POST['requisition_type']);
	$fetched_requisition_reason		    = mysqli_real_escape_string($db,$_POST['requisition_reason']);
	
    $uppercased_employee_id = strtoupper($fetched_employee_id);

   
         $get_user_query = "SELECT id AS employee_id FROM employee WHERE employee_id = '$fetched_employee_id'";    
		 $employee_result = mysqli_query($db,$get_user_query);
		$data =  mysqli_fetch_array($employee_result);
		 $fetched_employee_iid= $data['employee_id'];
		
		if(mysqli_num_rows($employee_result) == 0)
            {
				echo "No Record in the Database";
            }
            else {

				if($fetched_requisition_type == 6)
				{
					$insert_gadget_query =  "INSERT INTO gadget_checklist (employee_id,control_number,gadget_name,gadget_identification,
											ownership_type_id,gadget_type,date_acquired,requisition_type_id,requisition_purpose_reason,gadget_status,created_at) 
											VALUES ($uppercased_employee_id,'$fetched_control_number','$fetched_gadget_name','$fetched_gadget_identification',
											$fetched_ownership_type,$fetched_gadget_type,'$fetched_gadget_acquired_date',6,'$fetched_requisition_reason',1,NOW())";
					$insert_new_gadget_result = mysqli_query($db,$insert_gadget_query);
					echo 'Data Has been saved successfully';
				}
				else {
					$insert_gadget_query =  "INSERT INTO gadget_checklist (employee_id,control_number,gadget_name,gadget_identification,
											ownership_type_id,gadget_type,date_acquired,requisition_type_id,requisition_purpose_reason,gadget_status,created_at) 
											VALUES ($fetched_employee_iid,'$fetched_control_number','$fetched_gadget_name','$fetched_gadget_identification',
											$fetched_ownership_type,$fetched_gadget_type,'$fetched_gadget_acquired_date','$fetched_requisition_type',' ',1,NOW())";
					
					$insert_new_gadget_result = mysqli_query($db,$insert_gadget_query);
					echo 'Data Has been saved successfully';
				}
				
            }
   

}

function insert_new_user()
{

    require_once('db_connection_online.php');

    $upper_employee_id = strtoupper($_POST['employee_id']);
    $sub_path = '/Employee_img/' . $upper_employee_id . '.jpg';
    $employee_pic_base_64 = $_POST['employee_picture'];
    $file_path = getcwd() . $sub_path;

    $Image = str_replace('data:image/jpeg;base64,', '', $employee_pic_base_64);
    $Image = str_replace(' ', '+', $Image);
    
    $data = base64_decode($Image); 

    // $path = base64_to_jpeg($employee_pic_base_64, $file_path);
    $im = imagecreatefromstring($data);
    $source_width = imagesx($im);
    $source_height = imagesy($im);
    $ratio =  $source_height / $source_width;

    $new_width = 1000; // assign new width to new resized image
    $new_height = $ratio * 1000;

    $thumb = imagecreatetruecolor($new_width, $new_height);

    $transparency = imagecolorallocatealpha($thumb, 255, 255, 255, 127);
    imagefilledrectangle($thumb, 0, 0, $new_width, $new_height, $transparency);

    imagecopyresampled($thumb, $im, 0, 0, 0, 0, $new_width, $new_height, $source_width, $source_height);
    imagejpeg($thumb, $file_path, 9);
    imagedestroy($im);


  
    //$seperated_url  = explode('\\gadget_checklist', $file_path, 6);
    $seperated_url_prod = explode('/Production',$file_path);
    $url = 'http://gadgetchecklist.mads.ph'. $seperated_url_prod[1];
    // print_r($seperated_url_prod);
    //$url = $seperated_url[1];
   
    $fetched_table_name			        = mysqli_real_escape_string($db,$_POST['table_name']);
    $fetched_employee_name			    = mysqli_real_escape_string($db,$_POST['employee_name']);
    $fetched_employee_id        	    = mysqli_real_escape_string($db,$_POST['employee_id']);
    $fetched_employee_company   	    = mysqli_real_escape_string($db,$_POST['employee_company']);
    $fetched_employee_department 	    = mysqli_real_escape_string($db,$_POST['employee_department']);
    $fetched_employee_position		    = mysqli_real_escape_string($db,$_POST['employee_position']);

    $uppercased_employee_id = strtoupper($fetched_employee_id);

    $user_checker_query = "SELECT * FROM employee WHERE employee_id = '$uppercased_employee_id'";
    $employee_result = mysqli_query($db,$user_checker_query);
    $data =  mysqli_fetch_array($employee_result);
    //$fetched_employee_result= $data['employee_id'];

    if(!$data) 
    {
        if($fetched_table_name == 'employee')
        {
            $insert_new_user = "INSERT INTO employee(employee_id,employee_name,company_id,department_id,position,profile_pic_url,employee_status,created_at)
                                VALUES('$uppercased_employee_id','$fetched_employee_name',$fetched_employee_company,$fetched_employee_department,
                                '$fetched_employee_position','$url',1,NOW())";    
            $result_insert = mysqli_query($db,$insert_new_user);
     
            echo 'Inserted Successfully';    
                         
        }
        else {
            echo 'error';
        }
    }
    else {
       echo 'user id has been used already';
    }


   

}

function insert_new_user_no_pic()
{
    require_once('db_connection_online.php');

    // echo $url;
    
    $fetched_table_name			        = mysqli_real_escape_string($db,$_POST['table_name']);
    $fetched_employee_name			    = mysqli_real_escape_string($db,$_POST['employee_name']);
    $fetched_employee_id        	    = mysqli_real_escape_string($db,$_POST['employee_id']);
    $fetched_employee_company   	    = mysqli_real_escape_string($db,$_POST['employee_company']);
    $fetched_employee_department 	    = mysqli_real_escape_string($db,$_POST['employee_department']);
    $fetched_employee_position		    = mysqli_real_escape_string($db,$_POST['employee_position']);

    $uppercased_employee_id = strtoupper($fetched_employee_id);

    if($fetched_table_name == 'employee_no_picutre')
    {
        $insert_new_user = "INSERT INTO employee(employee_id,employee_name,company_id,department_id,position,employee_status,created_at)
                            VALUES('$uppercased_employee_id','$fetched_employee_name',$fetched_employee_company,$fetched_employee_department,
                            '$fetched_employee_position',1,NOW())"; 
        // ECHO $insert_new_user;   
        $result_insert = mysqli_query($db,$insert_new_user);                    
    }
    else {
        echo 'error';
    }

}

function fetch_row_data()
{
    require_once('db_connection_online.php');


    $fetched_user_id = mysqli_real_escape_string($db,$_POST['user_id']);
    $get_user_query = "SELECT * FROM employee WHERE id = '$fetched_user_id'";
    $fetched_user_result = mysqli_query($db,$get_user_query);

    while ($row = mysqli_fetch_assoc($fetched_user_result)) 
	{
		$user_data = array();
		$user_data[0]    = $fetched_user_id;
		$user_data[1]    = $row['employee_id'];
        $user_data[2]    = $row['employee_name'];
        $user_data[3]    = $row['company_id'];
        $user_data[4]    = $row['department_id'];
        $user_data[5]    = $row['position'];
    }
        echo json_encode($user_data);


  
    // $sample = explode("/",$company_department);
    // print_r($sample);
    // echo $sample[0];
    // echo json_encode($user_gadget_data);
    // echo $user_gadget_data[2];
}

function fetch_gadget_row_data()
{
    require_once('db_connection_online.php');


    $fetched_gadget_id = mysqli_real_escape_string($db,$_POST['gadget_id']);
    $get_gadget_query = "SELECT 
                        b.employee_id AS employee_id,
                        a.control_number AS control_number,
                        a.gadget_name AS gadget_name,
                        a.gadget_identification AS gadget_identification,
                        a.ownership_type_id AS ownership_type_id,
                        a.gadget_type AS gadget_type,
                        a.date_acquired AS date_acquired,
                        a.requisition_type_id AS requisition_type_id,
                        a.requisition_purpose_reason AS requisition_purpose_reason
                      FROM gadget_checklist AS a
                      LEFT JOIN employee AS b ON b.id = a.employee_id
                      WHERE a.id = '$fetched_gadget_id'";
    $fetched_gadget_result = mysqli_query($db,$get_gadget_query);

    while ($row = mysqli_fetch_assoc($fetched_gadget_result)) 
	{
		$gadget_data = array();
		$gadget_data[0]    = $fetched_gadget_id;
		$gadget_data[1]    = $row['employee_id'];
        $gadget_data[2]    = $row['control_number'];
        $gadget_data[3]    = $row['gadget_name'];
        $gadget_data[4]    = $row['gadget_identification'];
        $gadget_data[5]    = $row['ownership_type_id'];
        $gadget_data[6]    = $row['gadget_type'];
        $gadget_data[7]    = $row['date_acquired'];
        $gadget_data[8]    = $row['requisition_type_id'];
        $gadget_data[9]    = $row['requisition_purpose_reason'];

    }
        echo json_encode($gadget_data);


  
    // $sample = explode("/",$company_department);
    // print_r($sample);
    // echo $sample[0];
    // echo json_encode($user_gadget_data);
    // echo $user_gadget_data[2];
}

function update_employee()
{
    require_once('db_connection_online.php');

    $fetched_employee_hidden_id_hidden_id   = mysqli_real_escape_string($db,$_POST['employee_hidden_id']);
    $fetched_employee_id		            = mysqli_real_escape_string($db,$_POST['employee_id']);
    $fetched_employee_name			        = mysqli_real_escape_string($db,$_POST['employee_name']);
    $fetched_employee_company    	        = mysqli_real_escape_string($db,$_POST['employee_company']);
    $fetched_employee_department	        = mysqli_real_escape_string($db,$_POST['employee_department']);
    $fetched_employee_position  	        = mysqli_real_escape_string($db,$_POST['employee_position']);

    
    if($_POST['table_name'] == 'employee')
	{
            $update_employee_query = "UPDATE employee 
                                SET 
                                employee_id 			        = '$fetched_employee_id', 
                                employee_name 		            = '$fetched_employee_name',
                                company_id			            = $fetched_employee_company,
                                department_id        		    = $fetched_employee_department,
                                position     			        = '$fetched_employee_position',
                                updated_at                      = NOW()
                                WHERE id	                = $fetched_employee_hidden_id_hidden_id";       
	        $result = mysqli_query($db,$update_employee_query);
       
    }
    
}

function update_employee_gadget()
{
    require_once('db_connection_online.php');

    $fetched_employee_update_gadget_id                      = mysqli_real_escape_string($db,$_POST['update_gadget_id']);
    $fetched_employee_update_employee_id_edit               = mysqli_real_escape_string($db,$_POST['update_employee_id_edit']);
    $fetched_employee_update_control_number			        = mysqli_real_escape_string($db,$_POST['update_control_number']);
    $fetched_employee_update_gadget_name    	            = mysqli_real_escape_string($db,$_POST['update_gadget_name']);
    $fetched_employee_update_gadget_identification	        = mysqli_real_escape_string($db,$_POST['update_gadget_identification']);
    $fetched_employee_update_ownership_type  	            = mysqli_real_escape_string($db,$_POST['update_ownership_type']);
    $fetched_employee_update_gadget_type  	                = mysqli_real_escape_string($db,$_POST['update_gadget_type']);
    $fetched_employee_update_gadget_acquired  	            = mysqli_real_escape_string($db,$_POST['update_gadget_acquired']);
    $fetched_employee_update_requisition_type  	            = mysqli_real_escape_string($db,$_POST['update_requisition_type']);
    $fetched_employee_update_requisition_reason  	        = mysqli_real_escape_string($db,$_POST['update_requisition_reason']);

    
    if($fetched_employee_update_requisition_type == 6)
	{
            $update_gadget_query = "UPDATE gadget_checklist 
                                SET 
                                control_number 		            = '$fetched_employee_update_control_number',
                                gadget_name			            = '$fetched_employee_update_gadget_name',
                                gadget_identification        	= '$fetched_employee_update_gadget_identification',
                                ownership_type_id     			= $fetched_employee_update_ownership_type,
                                gadget_type                     = $fetched_employee_update_gadget_type  ,
                                date_acquired                   = '$fetched_employee_update_gadget_acquired ',
                                requisition_type_id             = 6,
                                requisition_purpose_reason      = '$fetched_employee_update_requisition_reason',
                                updated_at                      = NOW()
                                WHERE id	                    = $fetched_employee_update_gadget_id";    
            $result = mysqli_query($db,$update_gadget_query);
            echo $update_gadget_query;
    }
    else 
    {
            $update_gadget_query = "UPDATE gadget_checklist 
                                SET 
                                control_number 		            = '$fetched_employee_update_control_number',
                                gadget_name			            = '$fetched_employee_update_gadget_name',
                                gadget_identification        	= '$fetched_employee_update_gadget_identification',
                                ownership_type_id     			= $fetched_employee_update_ownership_type,
                                gadget_type                     = $fetched_employee_update_gadget_type  ,
                                date_acquired                   = '$fetched_employee_update_gadget_acquired ',
                                requisition_type_id             = $fetched_employee_update_requisition_type,
                                requisition_purpose_reason      = ' ',
                                updated_at                      = NOW()
                                WHERE id	                    = $fetched_employee_update_gadget_id";       
            $result = mysqli_query($db,$update_gadget_query);
            echo $update_gadget_query;
        }
    
}

function update_employee_img()
{
    // $servername = "150.109.115.26";
    // $port 		= "3306";
    // $username   = "root";
    // $password 	= "jfr3u9t";
    // $dbname    	= "gadgetchecklist";
    // // connect to database
    // $db = mysqli_connect($servername. ':' .$port, $username, $password, $dbname);
    require_once('db_connection_online.php');

    $upper_employee_id = strtoupper($_POST['employee_id']);
    $sub_path = '/Employee_img/' . $upper_employee_id . '.jpg';
    $employee_pic_base_64 = $_POST['employee_picture_update'];
    $file_path = getcwd() . $sub_path;
    // chmod($file_path , 755);

    $path = base64_to_jpeg($employee_pic_base_64, $file_path);
    //$seperated_url  = explode('\\gadget_checklist', $file_path, 6);
    $seperated_url_prod = explode('/Production',$file_path);
    $url = $url = 'http://gadgetchecklist.mads.ph'. $seperated_url_prod[1];
    


    $fetched_employee_hidden_id_hidden_id   = mysqli_real_escape_string($db,$_POST['employee_hidden_id']);
    $fetched_employee_id		            = mysqli_real_escape_string($db,$_POST['employee_id']);
    $fetched_employee_name			        = mysqli_real_escape_string($db,$_POST['employee_name']);
    $fetched_employee_company    	        = mysqli_real_escape_string($db,$_POST['employee_company']);
    $fetched_employee_department	        = mysqli_real_escape_string($db,$_POST['employee_department']);
    $fetched_employee_position  	        = mysqli_real_escape_string($db,$_POST['employee_position']);

    
    if($_POST['table_name'] == 'employee_img')
	{
            $update_employee_query = "UPDATE employee 
                                SET 
                                employee_id 			        = '$fetched_employee_id', 
                                employee_name 		            = '$fetched_employee_name',
                                company_id			            = $fetched_employee_company,
                                department_id        		    = $fetched_employee_department,
                                position     			        = '$fetched_employee_position',
                                profile_pic_url                 = '$url',
                                updated_at                      = NOW()
                                WHERE id	                = $fetched_employee_hidden_id_hidden_id";       
	        $result = mysqli_query($db,$update_employee_query);      
    }
    
}

function delete_user()
{
    require_once('db_connection_online.php');
    $delete_id  = mysqli_real_escape_string($db,$_POST['delete_id']);

	$deleted_user_query = "UPDATE employee
                            SET employee_status = 0,
                            deleted_at = NOW()
                            WHERE id = $delete_id";
    $result = mysqli_query($db,$deleted_user_query);
    
}

function delete_user_gadget()
{
    require_once('db_connection_online.php');
    $delete_id  = mysqli_real_escape_string($db,$_POST['delete_id']);

	$deleted_gadget_query = "UPDATE gadget_checklist
                            SET gadget_status = 0,
                            deleted_at = NOW()
                            WHERE id = $delete_id";
    $result = mysqli_query($db,$deleted_gadget_query);
    
}

function base64_to_jpeg($base64_string, $output_file) {
    // open the output file for writing
    $ifp = fopen( $output_file, 'wb' ); 

    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode( ',', $base64_string );

    // we could add validation here with ensuring count( $data ) > 1
    fwrite( $ifp, base64_decode( $data[ 1 ] ) );

    // clean up the file resource
    fclose( $ifp ); 

    return $output_file; 
}
?>