<div class="footer">
    <center><h2>Powered By  <a target="_blank"href=""> My Blog</a></h2></center>
</div>

</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            var last_id = $('.container .content div').last().attr('id');
            var searchParams = new URLSearchParams(window.location.search);
            var catId = searchParams.get('catId');
            var url = '';
            if(catId !='' && catId != null){
              url = '/myblog/admin/ajax/loadMoreData.php?last_id='+last_id+'&catId='+catId;
            }else{
              url = '/myblog/admin/ajax/loadMoreData.php?last_id=' + last_id;
            }
            if(last_id != 1){
              loadMoreData(last_id,url);
            }
        }
    });


    function loadMoreData(last_id,url){
      $.ajax(
            {
              url: url,
              type: "get",
              beforeSend: function()
              {
                $('.loader').show();
              }
            })
            .done(function(data)
            {
                $('.loader').hide();
                $(".container .content").append(data);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
              alert('server not responding...');
            });
    }

    // When the user scrolls the page, execute myFunction
    window.onscroll = function() {myFunction()};

    // Get the navbar
    var navbar = document.getElementById("navbar");

    // Get the offset position of the navbar
    var sticky = navbar.offsetTop;

    // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
      if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
      } else {
        navbar.classList.remove("sticky");
      }
    }
</script>