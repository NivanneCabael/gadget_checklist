$(document).ready(function(){
  //script for consumption
  $('#range_consumption').click(function(){
    var From = $('#From').val();
    var to = $('#to').val();
      if(From != '' && to != '')
      {
        $.ajax({
        url:"consumption_table_range.php",
        method:"POST",
        data:{From:From, to:to},
        success:function(data)
        {
          $('#Consumption_table').html(data);
        }
        });
      }
      else
      {
      alert("Please Select the Date");
      }
    });
  //script for registered users
  $('#range_users').click(function(){
    var From = $('#From').val();
    var to = $('#to').val();
      if(From != '' && to != '')
      {
        $.ajax({
        url:"registered_users_table_range.php",
        method:"POST",
        data:{From:From, to:to},
        success:function(data)
        {
          $('#users_table').html(data);
        }
        });
      }
      else
      {
      alert("Please Select the Date");
      }
    });
  //script for apple pay
  $('#Apple_Topup').click(function(){
    var From = $('#From').val();
    var to = $('#to').val();
      if(From != '' && to != '')
      {
        $.ajax({
        url:"topup_applepay_table_range.php",
        method:"POST",
        data:{From:From, to:to},
        success:function(data)
        {
          $('#Topup_Applepay_table').html(data);
        }
        });
      }
      else
      {
      alert("Please Select the Date");
      }
    });
   //script for apple pay VIP
  $('#Apple_Topup_vip').click(function(){
    var From = $('#From').val();
    var to = $('#to').val();
      if(From != '' && to != '')
      {
        $.ajax({
        url:"topup_applepay_table_vip_range.php",
        method:"POST",
        data:{From:From, to:to},
        success:function(data)
        {
          $('#Topup_Applepay_vip_table').html(data);
        }
        });
      }
      else
      {
      alert("Please Select the Date");
      }
    });
   //script for Google pay
  $('#Google_Topup').click(function(){
    var From = $('#From').val();
    var to = $('#to').val();
      if(From != '' && to != '')
      {
        $.ajax({
        url:"topup_googlepay_table_range.php",
        method:"POST",
        data:{From:From, to:to},
        success:function(data)
        {
          $('#Topup_Googlepay_table').html(data);
        }
        });
      }
      else
      {
      alert("Please Select the Date");
      }
    });
  //script for Google pay VIP
  $('#Google_Topup_vip').click(function(){
    var From = $('#From').val();
    var to = $('#to').val();
      if(From != '' && to != '')
      {
        $.ajax({
        url:"topup_googlepay_vip_table_range.php",
        method:"POST",
        data:{From:From, to:to},
        success:function(data)
        {
          $('#Topup_Googlepay_vip_table').html(data);
        }
        });
      }
      else
      {
      alert("Please Select the Date");
      }
    });

  });