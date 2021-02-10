$(document).ready(function()
{
    // display_user_checklist();
    //add new user
    add_employee();
    get_user_gadget_row();
    udpate_user_gadget();
    cancel_form();
    // display_user_checklist();

   
})

function add_employee()
{
    $(document).on('click','#btn_employee_submit',function()
	{
        

        // console.log('Falling');
        var employee_picture 		    = $('#employee_picture_input')[0].files[0];
        var reader = new FileReader();
        reader.readAsDataURL(employee_picture);

        var image = "";
        reader.onload = function () {
            // console.log(reader.result);
            
            submit_img(reader.result);

            
          };
          reader.onerror = function (error) {
            console.log('Error: ', error);
          };

	})
}

function submit_img(img_string)
{
    	
        var employee_id	                        = $('#employee_id_input').val();
        var employee_name 		                = $('#employee_name_input').val();
        var employee_company		            = $('#employee_company_input').val();
        var employee_department	                = $('#employee_department_input').val();
        var employee_position                   = $('#employee_position_input').val();

        console.log(employee_id);
        console.log(employee_name);
        console.log(employee_company);
        console.log(employee_department);
        console.log(employee_position);
        
        // if (employee_id == "") 
		// {
		// 	alert("Please Fill in all the fields");
		// 	// console.log("Some input fields are empty!");
		// }
		// else
		// {
		// 	$.ajax(
		// 	{
		// 		url : 'pages/add_new_user_gadget.php',
		// 		method : 'post',
		// 		data : {
        //             employee_picture            :img_string,
        //             employee_id			        :employee_id,
		// 			employee_name			    :employee_name,
        //             employee_company 	        :employee_company,
        //             employee_department			:employee_department,
        //             employee_position 	        :employee_position
		// 		},
		// 	// success : function(data)
		// 	// {
        //     //     alert("Data Has been Inserted Successfully")
        //     //     // location.reload();
        //     //     // clear_fields();

		// 	// 	// console.log("Sucessfully inserted the data");
		// 	// 	// $('form').trigger('reset');
		// 	// 	// display_category();
		// 	// }	
		// 	})
		// }
}

function get_user_gadget_row()
{   
    $(document).on('click','#btn_edit_user_gadget',function()
	{

    //    console.log('yo');
        
        var user_id = $(this).attr('data-id');
        $.ajax(
            {
                url: 'pages/get_data.php',
                method: 'POST',
                data: {user_id:user_id},
                dataType:'JSON',
                success: function(user_data)
                {
                    //  console.log(user_data[8]);
                // $("#btn_submit_edit").attr("id", "btn_update");
                $('#user_gadget_hidden_id').val(user_data[0]);
				$('#control_number_input_edit').val(user_data[1]);
                $('#employee_name_input_edit').val(user_data[2]);
                $('#company_id_input_edit').val(user_data[3]);
				$('#company_department_input_edit').val(user_data[4]);
                $('#employee_position_input_edit').val(user_data[5]);
                $('#phone_unit_input_edit').val(user_data[6]);
                $('#imei_number_input_edit').val(user_data[7]);
                $('#phone_ownership_input_edit').val(user_data[8]);
				$('#laptop_unit_input_edit').val(user_data[9]);
                $('#laptop_serial_number_input_edit').val(user_data[10]);
                $('#laptop_ownership_input_edit').val(user_data[11]);

                if(user_data[12] == "First Time" || user_data[12] == "Loss" || user_data[12] == "Additional Gadget" || user_data[12] == "Change of Unit" || user_data[12] == "Checklist Replacement")
                {
                    $('#laptop_requisition_purpose_input_edit').val(user_data[12]);
                    $('#laptop_requisition_purpose_reason_input_edit').val("");
                }
                else
                {
                    $('#laptop_requisition_purpose_input_edit').val("Others");
                    $('#laptop_requisition_purpose_reason_input_edit').val(user_data[12]);
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
       var user_gadget_hidden_id 		        = $('#user_gadget_hidden_id').val();
       var control_no 		                    = $('#control_number_input_edit').val();
       var employee_name 		                = $('#employee_name_input_edit').val();
       var company_id	                        = $('#company_id_input_edit').val();
       var company_department 		            = $('#company_department_input_edit').val();
       var employee_position	                = $('#employee_position_input_edit').val();
       var phone_unit 		                    = $('#phone_unit_input_edit').val();
       var imei_number 		                    = $('#imei_number_input_edit').val();
       var phone_ownership	                    = $('#phone_ownership_input_edit').val();
       var laptop_unit 		                    = $('#laptop_unit_input_edit').val();
       var laptop_serial_number 	            = $('#laptop_serial_number_input_edit').val();
       var laptop_ownership	                    = $('#laptop_ownership_input_edit').val();
       var laptop_requisition_purpose           = $('#laptop_requisition_purpose_input').val();
       var laptop_requisition_purpose_reason    = $('#laptop_requisition_purpose_input_edit').val();
        
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
                alert("Data Has been Updated! Successfully");
                location.reload();
                clear_fields();

				// console.log("Sucessfully inserted the data");
				// $('form').trigger('reset');
				// display_category();
			}	
			})
		}
       
	});

}

function cancel_form()
{
    $(document).on('click','#btn_cancel',function()
	{
        clear_fields();
	});
   
}

// function display_user_checklist()
// {
//     $.ajax(
//         {
//             url : 'pages/view_gadget_list.php',
//             type : 'post',
//             dataType: 'html',
//             success : function(data) 
//             {
//                 // console.log(data);
//                     $('#user_gadgets_data').append(data);
//                     $('#user_gadget_checklist_data').DataTable();
//                     // $('#user_gadgets_data').html(data);

//             }
//         })
// }



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

    $('#control_number_input_edit').val("");
    $('#employee_name_input_edit').val("");
    $('#company_id_input_edit').val("");
    $('#company_department_input_edit').val("");
    $('#employee_position_input_edit').val("");
    $('#phone_unit_input_edit').val("");
    $('#imei_number_input_edit').val("");
    $('#phone_ownership_input_edit').val("");
    $('#laptop_unit_input_edit').val("");
    $('#laptop_serial_number_input_edit').val("");
    $('#laptop_ownership_input_edit').val("");
    $('#laptop_requisition_purpose_input_edit').val("First Time");
    $('#laptop_requisition_purpose_reason_input_edit').val("");
}

function reset_table()
{
    $("#user_gadgets_data").html("");
}
// function reload_table()
// {
//     $("#table_body").html("");
// }
