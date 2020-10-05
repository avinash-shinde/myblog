$("document").ready(function(){

  //add user
  $('#myModal .subbtn').on('click',function(){
  		var username = $("#username").val();  
      var password = $("#password").val();
      var confirm_pass = $("#confirm_pass").val();
      var stop = 1;
      if(username !=''){
        stop = 0;
      }else{
        alert('enter username');
        return false;
      }
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
      if (username == '' && username == null){
        alert('please enter username');
        return false;
      }
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

});
