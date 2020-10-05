<div class="footer">
    <center><h2>Powered By  <a target="_blank"href=""> My Blog</a></h2></center>
</div>

</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    var currentPage = 1;
    var isReqSent = 0;
    var stopAjax = 0;
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            
            var searchParams = new URLSearchParams(window.location.search);
            var catId = searchParams.get('catId');
            var url = '';
            if(catId !='' && catId != null){
              url = '/myblog/admin/ajax/loadMoreData.php?page_no='+(currentPage + 1)+'&catId='+catId;
            }else{
              url = '/myblog/admin/ajax/loadMoreData.php?page_no=' + (currentPage + 1);
            }
            currentPage += 1;
            if(isReqSent != 1 && stopAjax != 1){
              if ($(".no_of_pages").val() != 1) {
                loadMoreData(url);  
              }
            }
        }
    });


    function loadMoreData(url){
      $.ajax(
            {
              url: url,
              type: "get",
              beforeSend: function()
              {
                isReqSent = 1;
                $('.loader').show();
              }
            })
            .done(function(data)
            {
                $('.loader').hide();
                $(".container .content").append(data);
                if (currentPage == $(".no_of_pages").val()) {
                  stopAjax = 1;                  
                }
                isReqSent = 0;
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
              alert('server not responding...');
            });
    }

</script>
