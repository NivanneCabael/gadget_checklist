$(document).ready(function()
{
    // display_user_checklist();
    // //add new user
    // add_user();
    // get_user_gadget_row();
    // udpate_user_gadget();
    display_user_checklist();


})

function add_user()
{
    $(document).on('click','#btn_submit',function()
	{
        // console.log('Falling');
        var control_no 		        = $('#control_number_input').val();
		var employee_name 		        = $('#employee_name_input').val();
        var company_id	                = $('#company_id_input').val();
        var company_department 		    = $('#company_department_input').val();
        var employee_position	        = $('#employee_position_input').val();
        var phone_unit 		            = $('#phone_unit_input').val();
        var imei_number 		        = $('#imei_number_input').val();
        var phone_ownership	            = $('#phone_ownership_input').val();
        var laptop_unit 		        = $('#laptop_unit_input').val();
        var laptop_serial_number 	    = $('#laptop_serial_number_input').val();
        var laptop_ownership	        = $('#laptop_ownership_input').val();
        var laptop_requisition_purpose  = $('#laptop_requisition_purpose_input').val();
        var laptop_requisition_purpose_reason  = $('#laptop_requisition_purpose_reason_input').val();

        // console.log(employee_name + " " + company_id + " " + company_department + " " + employee_position + " " + phone_unit + " " + phone_date_acquired + " " 
        // + imei_number + " " + phone_ownership + " " + laptop_unit + " "  + laptop_date_acquired + " "  + laptop_serial_number + " "  + laptop_ownership + " "  
        // + laptop_requisition_purpose + " "  );

		if (employee_name == "" || company_id == "") 
		{
			alert("Please Fill in all the fields");
			// console.log("Some input fields are empty!");
		}
		else
		{
			$.ajax(
			{
				url : 'pages/add_new_user_gadget.php',
				method : 'post',
				data : {
                    control_no			        :control_no,
					employee_name			    :employee_name,
                    company_id 	                :company_id,
                    company_department			:company_department,
                    employee_position 	        :employee_position,
                    phone_unit			        :phone_unit,
                    imei_number			        :imei_number,
                    phone_ownership 	        :phone_ownership,
                    laptop_unit			        :laptop_unit,
                    laptop_serial_number		:laptop_serial_number,
                    laptop_ownership 	        :laptop_ownership,
                    laptop_requisition_purpose	:laptop_requisition_purpose,
                    laptop_requisition_purpose_reason: laptop_requisition_purpose_reason
				},
			success : function(data)
			{
                alert("Data Has been Inserted Successfully")
                clear_fields();

				// console.log("Sucessfully inserted the data");
				// $('form').trigger('reset');
				// display_category();
			}	
			})
		}
	})
}

function get_user_gadget_row()
{   
    $(document).on('click','#btn_edit_user_gadget',function()
	{
        var user_id = $(this).attr('data-id');
        //alert(user_id);
        $.ajax(
            {
                url: 'pages/get_data.php',
                method: 'POST',
                data: {user_id:user_id},
                dataType:'JSON',
                success: function(user_data)
                {
                    //  console.log(user_data[8]);
                $("#btn_submit").attr("id", "btn_update");
                $('#user_gadget_hidden_id').val(user_data[0]);
				$('#control_number_input').val(user_data[1]);
                $('#employee_name_input').val(user_data[2]);
                $('#company_id_input').val(user_data[3]);
				$('#company_department_input').val(user_data[4]);
                $('#employee_position_input').val(user_data[5]);
                $('#phone_unit_input').val(user_data[6]);
                $('#imei_number_input').val(user_data[7]);
                $('#phone_ownership_input').val(user_data[8]);
				$('#laptop_unit_input').val(user_data[9]);
                $('#laptop_serial_number_input').val(user_data[10]);
                $('#laptop_ownership_input').val(user_data[11]);

                if(user_data[12] == "First Time" || user_data[12] == "Loss" || user_data[12] == "Additional Gadget" || user_data[12] == "Change of Unit" || user_data[12] == "Checklist Replacement")
                {
                    $('#laptop_requisition_purpose_input').val(user_data[12]);
                    $('#laptop_requisition_purpose_reason_input').val("");
                }
                else
                {
                    $('#laptop_requisition_purpose_input').val("Others");
                    $('#laptop_requisition_purpose_reason_input').val(user_data[12]);
                }
                // reset_table();
               
                }
            })
	});

}

function udpate_user_gadget()
{   
    $(document).on('click','#btn_update',function()
	{
        // console.log('Falling');
        var user_gadget_hidden_id 		            = $('#user_gadget_hidden_id').val();
        var control_no 		            = $('#control_number_input').val();
		var employee_name 		        = $('#employee_name_input').val();
        var company_id	                = $('#company_id_input').val();
        var company_department 		    = $('#company_department_input').val();
        var employee_position	        = $('#employee_position_input').val();
        var phone_unit 		            = $('#phone_unit_input').val();
        var imei_number 		        = $('#imei_number_input').val();
        var phone_ownership	            = $('#phone_ownership_input').val();
        var laptop_unit 		        = $('#laptop_unit_input').val();
        var laptop_serial_number 	    = $('#laptop_serial_number_input').val();
        var laptop_ownership	        = $('#laptop_ownership_input').val();
        var laptop_requisition_purpose  = $('#laptop_requisition_purpose_input').val();
        var laptop_requisition_purpose_reason  = $('#laptop_requisition_purpose_reason_input').val();
        
        if (employee_name == "" || company_id == "") 
		{
			alert("Please Fill in all the fields");
			// console.log("Some input fields are empty!");
		}
		else
		{
			$.ajax(
			{
				url : 'pages/update_user_gadget.php',
				method : 'post',
				data : {
                    user_gadget_hidden_id       :user_gadget_hidden_id,
                    control_no			        :control_no,
					employee_name			    :employee_name,
                    company_id 	                :company_id,
                    company_department			:company_department,
                    employee_position 	        :employee_position,
                    phone_unit			        :phone_unit,
                    imei_number			        :imei_number,
                    phone_ownership 	        :phone_ownership,
                    laptop_unit			        :laptop_unit,
                    laptop_serial_number		:laptop_serial_number,
                    laptop_ownership 	        :laptop_ownership,
                    laptop_requisition_purpose	:laptop_requisition_purpose,
                    laptop_requisition_purpose_reason: laptop_requisition_purpose_reason
				},
			success : function(data)
			{
                alert("Data Has been Updated! Successfully")
                clear_fields();

				// console.log("Sucessfully inserted the data");
				// $('form').trigger('reset');
				// display_category();
			}	
			})
		}
       
	});

}

function display_user_checklist()
{
    $.ajax(
        {
            url : 'pages/view_gadget_list.php',
            method : 'post',
            success : function(data) 
            {
            
                // console.log(data);
                data = $.parseJSON(data);
                if (data.status == 'success') 
                {
                    $('#user_gadget_table').html(data.html);
                }
            }
        })
}



function clear_fields()
{
    $('#control_number_input').val("");
    $('#employee_name_input').val("");
    $('#company_id_input').val("");
    $('#company_department_input').val("");
    $('#employee_position_input').val("");
    $('#phone_unit_input').val("");
    $('#imei_number_input').val("");
    $('#phone_ownership_input').val("");
    $('#laptop_unit_input').val("");
    $('#laptop_serial_number_input').val("");
    $('#laptop_ownership_input').val("");
    $('#laptop_requisition_purpose_input').val("First Time");
    $('#laptop_requisition_purpose_reason_input').val("");
}

function reset_table()
{
    $("#user_gadgets_data").html("");
}
// function reload_table()
// {
//     $("#table_body").html("");
// }
