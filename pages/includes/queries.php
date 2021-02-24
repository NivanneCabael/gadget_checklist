<?php

require_once('db_connection_localhost.php');

$get_department_query = "SELECT
    id AS department_id,
    name AS department_name
    FROM department
    ORDER BY name ASC";
$department_result  = mysqli_query($db, $get_department_query);

$get_company_query = "SELECT
    id AS company_id,
    name AS company_name
    FROM company
    ORDER BY name ASC";
$company_result  = mysqli_query($db, $get_company_query);

$get_department_query2 = "SELECT
    id AS department_id,
    name AS department_name
    FROM department
    ORDER BY name ASC";
$department_result2  = mysqli_query($db, $get_department_query2);

$get_company_query2 = "SELECT
    id AS company_id,
    name AS company_name
    FROM company
    ORDER BY name ASC";
$company_result2  = mysqli_query($db, $get_company_query2);

$employees_query =   
        "SELECT 
        a.id AS id,
        a.profile_pic_url as profile_pic,
        a.employee_id AS employee_id, 
        a.employee_name AS employee_name, 
        c.name AS department_name, 
        b.name AS company_name, 
        a.position AS employee_position 
        FROM employee AS a 
        LEFT JOIN company AS b ON b.id = a.company_id 
        LEFT JOIN department AS c ON c.id = a.department_id
        WHERE a.employee_status = 1";
$employee_results = mysqli_query($db,$employees_query);

$get_ownership_type_query = "SELECT
    id AS ownership_id,
    name AS ownership_name
    FROM ownership_type";
$ownership_result  = mysqli_query($db, $get_ownership_type_query);

$get_gadget_type_query = "SELECT
    id AS gadget_id,
    name AS gadget_name
    FROM gadget_type";
$gadget_result  = mysqli_query($db, $get_gadget_type_query);

$get_requisition_type_query = "SELECT
    id AS requisition_id,
    name AS requisition_name
    FROM requisition_type";
$requisition_result  = mysqli_query($db, $get_requisition_type_query);

$get_ownership_type_query2 = "SELECT
    id AS ownership_id,
    name AS ownership_name
    FROM ownership_type";
$ownership_result2  = mysqli_query($db, $get_ownership_type_query2);

$get_gadget_type_query2 = "SELECT
    id AS gadget_id,
    name AS gadget_name
    FROM gadget_type";
$gadget_result2  = mysqli_query($db, $get_gadget_type_query2);

$get_requisition_type_query2 = "SELECT
    id AS requisition_id,
    name AS requisition_name
    FROM requisition_type";
$requisition_result2  = mysqli_query($db, $get_requisition_type_query2);

?>