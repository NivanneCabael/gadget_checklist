$(document).ready(function()
{
    // display_user_checklist();
        //add record
        add_employee();
        add_gadget();

        //get record row
        get_employee_row();
        get_gadget_row();

        //update record
        udpate_user();
        udpate_user_gadget();

        //delete record
        delete_user_gadget();
        delete_user();

        //image modal
        modal_img();
    // display_user_checklist();

   
})
function add_gadget()
{
    $(document).on('click','#btn_gadget_submit',function()
	{
        var employee_id 		                = $('#employee_id_input').val();
        var control_number 		                = $('#control_number_input').val();
        var gadget_name	                        = $('#gadget_name_input').val();
        var gadget_identification 		        = $('#gadget_identification_input').val();
        var gadget_acquired_date 		        = $('#gadget_acquired_date').val();
        var ownership_type  	                = $('#ownership_type_input').val();
        var gadget_type 		                = $('#gadget_type_input').val();
        var requisition_type 		            = $('#requisition_type_input').val();
        var requisition_reason 		            = $('#requisition_reason_input').val();
        var employee                            = 'gadget'; 

        if ((gadget_type == '1') && (employee_id == "" || control_number == "" || gadget_name == "" || gadget_identification == "" || ownership_type == "")) 
		{
			alert("Please Fill in all the fields");
			// console.log("Some input fields are empty!");
        }
        else if ((gadget_type == '2' && requisition_type != "6") && (employee_id == "" || control_number == "" || gadget_name == "" || gadget_identification == "" || ownership_type == "" )) 
		{
			alert("Please Fill in all the fields laptop");
			// console.log("Some input fields are empty!");
        }
        else if((gadget_type == '2' && requisition_type == "6" ) && (requisition_reason == "" || employee_id == "" || control_number == "" || gadget_name == "" || gadget_identification == "" || ownership_type == "" ))
        {
            alert("Please Fill in the reason field");
        }
		else
		{
			$.ajax(
			{
				url : 'pages/add_new_record.php',
				method : 'post',
				data : {
                    employee_id                 :employee_id,
                    control_number              :control_number,
                    gadget_name			        :gadget_name,
                    gadget_identification       :gadget_identification,
                    gadget_acquired_date        :gadget_acquired_date,
                    ownership_type 	            :ownership_type,
                    gadget_type			        :gadget_type,
                    requisition_type 	        :requisition_type,
                    requisition_reason 	        :requisition_reason,
                    table_name                    :employee
                },	
                success : function(data)
                {
                    alert(data);
                    location.reload();
                    clear_fields();

                    // console.log("Sucessfully inserted the data");
                    // $('form').trigger('reset');
                    // display_category();
                }
			})
		}  


	})
}

function add_employee()
{
    $(document).on('click','#btn_employee_submit',function()
	{
        
        // console.log('Falling');
        var employee_picture 		    = $('#employee_picture_input')[0].files[0];

        if($("#employee_picture_input")[0].files.length != 0)
         {
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
            
         }
         else
         {
            
            insert_employee();
         }
	})
}

function insert_employee()
{
    var employee_id	                        = $('#employee_id_input').val();
    var employee_name 		                = $('#employee_name_input').val();
    var employee_company		            = $('#employee_company_input').val();
    var employee_department	                = $('#employee_department_input').val();
    var employee_position                   = $('#employee_position_input').val();  
    var employee                            = 'employee_no_picutre'; 
    
    if (employee_id == "" || employee_name == "" || employee_company == "" || employee_department == "" || employee_position == "") 
    {
        alert("Please Fill in all the fields");
        // console.log("Some input fields are empty!");
    }
    else
    {
        $.ajax(
        {
            url : 'pages/add_new_record.php',
            method : 'post',
            data : {
                table_name                  :employee,
                employee_id			        :employee_id,
                employee_name			    :employee_name,
                employee_company 	        :employee_company,
                employee_department			:employee_department,
                employee_position 	        :employee_position
            },	
            success : function(data)
            {
                alert(data);
                location.reload();
                clear_fields();

                // console.log("Sucessfully inserted the data");
                // $('form').trigger('reset');
                // display_category();
            }	
        })
    }   
}

function submit_img(img_string)
{
    	
        var employee_id	                        = $('#employee_id_input').val();
        var employee_name 		                = $('#employee_name_input').val();
        var employee_company		            = $('#employee_company_input').val();
        var employee_department	                = $('#employee_department_input').val();
        var employee_position                   = $('#employee_position_input').val();  
        var employee                            = 'employee'; 
        
        if (employee_id == "" || employee_name == "" || employee_company == "" || employee_department == "" || employee_position == "") 
		{
			alert("Please Fill in all the fields");
			// console.log("Some input fields are empty!");
		}
		else
		{
			$.ajax(
			{
				url : 'pages/add_new_record.php',
				method : 'post',
				data : {
                    employee_picture            :img_string,
                    table_name                  :employee,
                    employee_id			        :employee_id,
					employee_name			    :employee_name,
                    employee_company 	        :employee_company,
                    employee_department			:employee_department,
                    employee_position 	        :employee_position
                },	
                success : function(data)
                {
                    alert(data);
                    location.reload();
                    clear_fields();
                    
                    // alert("Data Has been Added! Successfully");
                    // location.reload();
                    // clear_fields();

                    // console.log("Sucessfully inserted the data");
                    // $('form').trigger('reset');
                    // display_category();
                }	
			})
		}    
}

function get_employee_row()
{   
    $(document).on('click','#btn_edit_user',function()
	{
     
        var user_id = $(this).attr('data-id');
        var table_name = 'employee';
        $.ajax(
            {
                url: 'pages/get_data.php',
                method: 'POST',
                data: { user_id:user_id,
                        table_name:table_name},
                dataType:'JSON',
                success: function(user_data)
                {
                    //  console.log(user_data[8]);
                // $("#btn_submit_edit").attr("id", "btn_update");
                $('#employee_hidden_id').val(user_data[0]);
				$('#employee_id_input_edit').val(user_data[1]);
                $('#employee_name_input_edit').val(user_data[2]);
                $('#employee_company_input_edit').val(user_data[3]);
				$('#employee_department_input_edit').val(user_data[4]);
                $('#employee_position_input_edit').val(user_data[5]);
                // reset_table();
               
                }
            })
	});

}

function get_gadget_row()
{   
    $(document).on('click','#btn_edit_user_gadget',function()
	{

    //    console.log('yo');
        
        var gadget_id = $(this).attr('data-id');
        var table_name = 'gadget';
        $.ajax(
            {
                url: 'pages/get_data.php',
                method: 'POST',
                data: { gadget_id:gadget_id,
                        table_name:table_name},
                dataType:'JSON',
                success: function(gadget_data)
                {
                    //  console.log(user_data[8]);
                // $("#btn_submit_edit").attr("id", "btn_update");
                $('#gadget_hidden_id').val(gadget_data[0]);
                $('#employee_id_input_edit').val(gadget_data[1]);
                $('#employee_id_input_edit').prop( "disabled", true );
                $('#control_number_input_edit').val(gadget_data[2]);
                $('#gadget_name_input_edit').val(gadget_data[3]);
				$('#gadget_identification_input_edit').val(gadget_data[4]);
                $('#ownership_type_input_edit').val(gadget_data[5]);
                $('#gadget_type_input_edit').val(gadget_data[6]);

                if (gadget_data[8] != 6) {
                    $('#requisition_type_input_edit').val(gadget_data[8]);
                }
                else{
                    $('#requisition_type_input_edit').val(gadget_data[8]);
                    $('#requisition_reason_input_edit').val(gadget_data[9]);
                }
                
                // reset_table();
               
                }
            })
	});

}

function udpate_user_gadget()
{
    $(document).on('click','#btn_update_gadget',function()
	{
    
        var update_gadget_id		    = $('#gadget_hidden_id').val();
        var update_employee_id_edit   	= $('#employee_id_input_edit').val();
        var update_control_number  	    = $('#control_number_input_edit').val();
        var update_gadget_name  	    = $('#gadget_name_input_edit').val();
        var update_gadget_identification = $('#gadget_identification_input_edit').val();
        var update_ownership_type  	    = $('#ownership_type_input_edit').val();
        var update_gadget_type  	    = $('#gadget_type_input_edit').val();
        var update_gadget_acquired 	    = $('#gadget_acquired_date_edit').val();
        var update_requisition_type	    = $('#requisition_type_input_edit').val();
        var update_requisition_reason   = $('#requisition_reason_input_edit').val();
        var table_name			        ='gadget';

        if ((update_gadget_type == '1') && (update_employee_id_edit == "" || update_control_number == "" || update_gadget_name == "" || update_gadget_identification == "" || update_ownership_type == "")) 
		{
			alert("Please Fill in all the fields cp");
			// console.log("Some input fields are empty!");
        }
        else if ((update_gadget_type == '2' && update_requisition_type != "6") && (update_employee_id_edit == "" || update_control_number == "" || update_gadget_name == "" || update_gadget_identification == "" || update_ownership_type == "" )) 
		{
			alert("Please Fill in all the fields laptop");
			// console.log("Some input fields are empty!");
        }
        else if((update_gadget_type == '2' && update_requisition_type == "6" ) && (update_requisition_reason == "" || update_employee_id_edit == "" || update_control_number == "" || update_gadget_name == "" || update_gadget_identification == "" || update_ownership_type == "" ))
        {
            alert("Please Fill in the reason field");
        }
        else
        {
            $.ajax(
                {
                    url : 'pages/update_user_gadget.php',
                    method : 'post',
                    data : {
                        update_gadget_id                :update_gadget_id,
                        update_employee_id_edit         :update_employee_id_edit,
                        update_control_number			:update_control_number,
                        update_gadget_name 	            :update_gadget_name,
                        update_gadget_identification	:update_gadget_identification,
                        update_ownership_type 	        :update_ownership_type,
                        update_gadget_type		        :update_gadget_type,
                        update_gadget_acquired		    :update_gadget_acquired,
                        update_requisition_type		    :update_requisition_type,
                        update_requisition_reason		:update_requisition_reason,
                        table_name			            :table_name
                    },
                success : function(data)
                {
                    alert("Gadget information updated");
                    location.reload();
                    clear_fields();
                }	
                })
        }
         
       
	});
}

function udpate_user()
{   
    $(document).on('click','#btn_update',function()
	{
         // console.log('Falling');
         var employee_picture_update = $('#employee_picture_input_edit')[0].files[0];

         if($("#employee_picture_input_edit")[0].files.length === 0)
         {
            update_employee();
         }
         else
         {
            var reader = new FileReader();
            reader.readAsDataURL(employee_picture_update);
    
            var image = "";
            reader.onload = function () {
                // console.log(reader.result);
                updateimg(reader.result);
              };
              reader.onerror = function (error) {
                console.log('Error: ', error);
              };
         }
        // console.log('Falling');
       
	});

}

function updateimg(img_string2)
{
    	
        var employee_hidden_id 		            = $('#employee_hidden_id').val();
        var employee_name 		                = $('#employee_name_input_edit').val();
        var employee_id	                        = $('#employee_id_input_edit').val();
        var employee_company 		            = $('#employee_company_input_edit').val();
        var employee_department	                = $('#employee_department_input_edit').val();
        var employee_position 		            = $('#employee_position_input_edit').val();
        var employee                            = 'employee_img'; 
        
        if (employee_id == "" || employee_name == "" || employee_company == "" || employee_department == "" || employee_position == "") 
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
                    employee_picture_update     :img_string2,
                    employee_hidden_id          :employee_hidden_id,
					employee_name			    :employee_name,
                    employee_id 	            :employee_id,
                    employee_company			:employee_company,
                    employee_department 	    :employee_department,
                    employee_position		    :employee_position,
                    table_name			        :employee
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
}

function update_employee()
{
    	
        var employee_hidden_id 		            = $('#employee_hidden_id').val();
        var employee_name 		                = $('#employee_name_input_edit').val();
        var employee_id	                        = $('#employee_id_input_edit').val();
        var employee_company 		            = $('#employee_company_input_edit').val();
        var employee_department	                = $('#employee_department_input_edit').val();
        var employee_position 		            = $('#employee_position_input_edit').val();
        var employee                            = 'employee'; 
        
        if (employee_id == "" || employee_name == "" || employee_company == "" || employee_department == "" || employee_position == "") 
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
                    employee_hidden_id          :employee_hidden_id,
					employee_name			    :employee_name,
                    employee_id 	            :employee_id,
                    employee_company			:employee_company,
                    employee_department 	    :employee_department,
                    employee_position		    :employee_position,
                    table_name			        :employee
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
}

function delete_user_gadget()
{
    $(document).on('click','#btn_delete_user_gadget',function()
	{
        var DeleteID = $(this).attr('data-id1');
        var table_name = 'gadget';
        console.log(DeleteID);
		var confirmation = confirm("Do you want to remove this data?");
		if (confirmation == false) 
        {
          alert("You did not delete the record");

        }
        else
        {
			// console.log(DeleteID);
          $.ajax({
             url:"pages/delete_record.php",
             method:"POST",
             data:{ delete_id:DeleteID,
                    table_name:table_name
                },
             success:function(data)
             {
				alert("Sucessfully deleted the data");
				location.reload();
                clear_fields();
             }
          });
        }
       
	});
}

function delete_user()
{
    $(document).on('click','#btn_delete_user',function()
	{
        var DeleteID = $(this).attr('data-id1');
        var table_name = 'employee';

        console.log(DeleteID);
		var confirmation = confirm("Do you want to remove this data?");
		if (confirmation == false) 
        {
          alert("You did not delete the record");

        }
        else
        {
			// console.log(DeleteID);
          $.ajax({
             url:"pages/delete_record.php",
             method:"POST",
             data:{ delete_id:DeleteID,
                    table_name:table_name
                },
             success:function(data)
             {
				alert("Sucessfully deleted the data");
				location.reload();
                clear_fields();
             }
          });
        }
       
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

function modal_img(){

    //image modal
    var modal = document.getElementById("PictureModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var ImageModal = document.getElementById("img01");

    $(document).on('click','#img_modal',function()
	{
        modal.style.display = "block";
        ImageModal.src = this.src;
        captionText.innerHTML = this.alt;
	})

 // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    $(document).on('click',span,function()
	{
        modal.style.display = "none";
	})
}
