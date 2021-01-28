$(document).ready(function()
{
    // display_user_checklist();
    //add new user
    add_user();
    get_user_gadget_row();

})

function add_user()
{
    $(document).on('click','#btn_submit',function()
	{
        // console.log('Falling');
		var employee_name 		        = $('#employee_name_input').val();
        var company_id	                = $('#company_id_input').val();
        var company_department 		    = $('#company_department_input').val();
        var employee_position	        = $('#employee_position_input').val();
        var phone_unit 		            = $('#phone_unit_input').val();
        var phone_date_acquired	        = $('#phone_date_acquired_input').val();
        var imei_number 		        = $('#imei_number_input').val();
        var phone_ownership	            = $('#phone_ownership_input').val();
        var laptop_unit 		        = $('#laptop_unit_input').val();
        var laptop_date_acquired	    = $('#laptop_date_acquired_input').val();
        var laptop_serial_number 	    = $('#laptop_serial_number_input').val();
        var laptop_ownership	        = $('#laptop_ownership_input').val();
        var laptop_requisition_purpose  = $('#laptop_requisition_purpose_input').val();

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
					employee_name			    :employee_name,
                    company_id 	                :company_id,
                    company_department			:company_department,
                    employee_position 	        :employee_position,
                    phone_unit			        :phone_unit,
                    phone_date_acquired 	    :phone_date_acquired,
                    imei_number			        :imei_number,
                    phone_ownership 	        :phone_ownership,
                    laptop_unit			        :laptop_unit,
                    laptop_date_acquired 	    :laptop_date_acquired,
                    laptop_serial_number		:laptop_serial_number,
                    laptop_ownership 	        :laptop_ownership,
                    laptop_requisition_purpose	:laptop_requisition_purpose
				},
			success : function(data)
			{
                $('#message').html("Data Has Been Inserted!");
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
                    //  console.log(category_data);
                    // $('#category_hidden_id').val(category_data[0]);
                    // $('#product_company_name_input').val(category_data[1]);
                    // $('#product_description_input').val(category_data[2]);
                    // $("#btn_submit_category").attr("id", "btn_update_category");
                }
            })
	});

}

// function display_user_checklist()
// {
//     $.ajax(
//         {
//             url : 'pages/view_gadget_list.php',
//             type : 'post',
//             success : function(data) 
//             {
//                 data = $.parseJSON(data);
//                 if (data.status == 'success') 
//                 {
//                     $('#user_gadget_table').html(data.html);
//                 }
//             }
//         })
// }



function clear_fields()
{
    $('#employee_name_input').val("");
    $('#company_id_input').val("");
    $('#company_department_input').val("");
    $('#employee_position_input').val("");
    $('#phone_unit_input').val("");
    $('#phone_date_acquired_input').val("");
    $('#imei_number_input').val("");
    $('#phone_ownership_input').val("");
    $('#laptop_unit_input').val("");
    $('#laptop_date_acquired_input').val("");
    $('#laptop_serial_number_input').val("");
    $('#laptop_ownership_input').val("");
    $('#laptop_requisition_purpose_input').val("");


    var employee_name 		        = $('#employee_name_input').val();
        var company_id	                = $('#company_id_input').val();
        var company_department 		    = $('#company_department_input').val();
        var employee_position	        = $('#employee_position_input').val();
        var phone_unit 		            = $('#phone_unit_input').val();
        var phone_date_acquired	        = $('#phone_date_acquired_input').val();
        var imei_number 		        = $('#imei_number_input').val();
        var phone_ownership	            = $('#phone_ownership_input').val();
        var laptop_unit 		        = $('#laptop_unit_input').val();
        var laptop_date_acquired	    = $('#laptop_date_acquired_input').val();
        var laptop_serial_number 	    = $('#laptop_serial_number_input').val();
        var laptop_ownership	        = $('#laptop_ownership_input').val();
        var laptop_requisition_purpose  = $('#laptop_requisition_purpose_input').val();

}

// function reload_table()
// {
//     $("#table_body").html("");
// }
