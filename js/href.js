 $(document).ready(function(){
  $(".location").live('click',function(){
      var href=$(this).attr("title");
      window.open(href); 
     });
 });
