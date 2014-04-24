
$(document).ready(function(){
var str=decodeURI(window.location.href);
var es=/pw=/;
es.exec(str);
var value=RegExp.rightContext;
   $.ajax({
      url:"../php/show_page.php",
      type:"post",
      data:{"value":value},
      success:function(data){
      var array=data.split("|");
      var count=parseInt(array[0]);
      var page1=parseInt(array[1]);
         if(count!=0)
         {
           if(count%page1==0)
           {
              page_num=count/page1;
           }
   	    else{
              page_num=Math.floor(count/page1)+1;
           }
          $("#result_page").append(
             "<span style='color:blue;font-size:16px;'>页数：</span>"   
            );  
         for(i=0; i<page_num; i++)
         {
           if(i==0)
           {
           $("#result_page").append(
             "<span class='page point' id="+(i+1)+">"+(i+1)+"&nbsp;&nbsp;&nbsp;</span>"
           );  
           }
           else{
           $("#result_page").append(
             "<span class='page' id="+(i+1)+">"+(i+1)+"&nbsp;&nbsp;&nbsp;</span>"
           );  
           }
         }
        }
      }
   });
});
