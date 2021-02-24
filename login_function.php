<?php
	$servername = "150.109.115.26";
	$port 		= "3306";
	$username   = "root";
	$password 	= "jfr3u9t";
	$dbname    	= "gadgetchecklist";
	// connect to database
	$db = mysqli_connect($servername. ':' .$port, $username, $password, $dbname);

	
	if(!$db)
	    {
	        die(' Please Check Your Connection'.mysqli_error($db));
	    }
	session_start();

	if (isset($_POST['Login'])) {
		$email_protected = mysqli_real_escape_string($db, $_POST['txtemail']);
		$password_protected = mysqli_real_escape_string($db, $_POST['txtpassword']);

		if (empty($email_protected) || empty($password_protected)) {
			header("location:login_page.php?Empty= Please Fill in the Blanks");
		}
		else
		{
			  $stmt = $db->prepare("SELECT * FROM user_admin WHERE username = ? and password = ? ");
			  $stmt->bind_param("ss",$email_protected, $password_protected);
			  $stmt->execute();
			  $stmt->store_result();

			  $stmt->bind_result($id,$email,$password);

            if ($stmt->fetch()) {
            	// $query = "INSERT INTO login_logs(user_id, created_date) VALUES ($id,NOW())";
				// $result = mysqli_query($db, $query);
            	$_SESSION['User'] = $id;

            	if ($id == 3) {
            		header("location:block-users-table.php");
            	}
            	else
            	{
            		header("location:add_employee.php");
            	}
                
            }
            else {
            	 header("location:login_page.php?Invalid= Please Enter Correct User Name and Password ");
            }
		}
	} 
	else
    {
        echo 'Something went wrong';
    }
?>