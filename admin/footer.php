 <div class="footer">
    <center><h2>Powered By<a target="_blank"href="">My Blog</a></h2></center>
</div>
</body> 
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="assets/js/adminCustom.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- <script type="text/javascript">
$("document").ready(function(){
  $('.subbtn').on('click',function(){
  		console.log('add user');
      var username = $("#username").val();  
      var password = $("#password").val();
      var confirm_pass = $("#confirm_pass").val();
      var email = $("#email").val(); 
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "/myblog/admin/ajax/adduser.php", //Relative or absolute path to response.php file
      data: "username="+username+'&password='+password+'&confirm_pass='+confirm_pass+'&email='+email,
      success: function(data) {
        
      }
    });
    return false;
});
});
</script> -->