<?php

require_once('db_connection_localhost.php');

$get_department_query = "SELECT
    id AS department_id,
    name AS department_name
    FROM department";
$department_result  = mysqli_query($db, $get_department_query);

$get_company_query = "SELECT
    id AS company_id,
    name AS company_name
    FROM company";
$company_result  = mysqli_query($db, $get_company_query);

$employees_query =   
        "SELECT 
        a.id AS id,
        a.employee_id AS employee_id, 
        a.employee_name AS employee_name, 
        c.name AS department_name, 
        b.name AS company_name, 
        a.position AS employee_position 
        FROM employee AS a LEFT JOIN company AS b ON b.id = a.company_id 
        LEFT JOIN department AS c ON c.id = a.department_id";
$employee_results = mysqli_query($db,$employees_query);

?>