$("document").ready(function(){

  //add user
  $('#myModal .subbtn').on('click',function(){
  		console.log('add user');
      var username = $("#username").val();  
      var password = $("#password").val();
      var confirm_pass = $("#confirm_pass").val();
      if(password != confirm_pass){
        alert('confirm password does not matched');
        return false;
      }
      var email = $("#email").val(); 
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "/myblog/admin/ajax/adduser.php",
      data: "username="+username+'&password='+password+'&email='+email+'&isAjax=1',
      success: function(data) {
        if(data.error == 0){
          setTimeout(function(){ location.reload(); }, 100);
        }else{
          alert(data.msg);
        }
        
      }
    });
    return false;
  });

  //for edit append username and email 
  $('.editbtn').on('click',function(){
    var userId = $(this).attr('userId');
    var username = $(this).parents('.main').find('.username').text();
    var email = $(this).parents('.main').find('.email').text();
    $('#edituserId').val(userId);
    $('#editusername').val(username);
    $('#editemail').val(email);

  });

  $('#editmyModal .subbtn').on('click',function(){
      console.log('edit user');
      var userId = $("#edituserId").val();  
      var username = $("#editusername").val();  
      var password = $("#editpassword").val();
      var confirm_pass = $("#editconfirm_pass").val();
      if(password != confirm_pass){
        alert('confirm password does not matched');
        return false;
      }
      var email = $("#editemail").val(); 
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "/myblog/admin/ajax/edituser.php",
      data: "userId="+userId+'&username='+username+'&password='+password+'&email='+email+'&isAjax=1',
      success: function(data) {
        if(data.error == 0){
          setTimeout(function(){ location.reload(); }, 100);
        }else{
          alert(data.msg);
        }
        
      }
    });
    return false;
  });

    $('.dropdown-select').on( 'click', '.dropdown-menu li a', function() { 
     var target = $(this).html();

     //Adds active class to selected item
     $(this).parents('.dropdown-menu').find('li').removeClass('active');
     $(this).parent('li').addClass('active');

     //Displays selected text on dropdown-toggle button
     $(this).parents('.dropdown-select').find('.dropdown-toggle').html(target + ' <span class="caret"></span>');
  });


});
