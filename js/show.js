$(document).ready(function(){	

function show(page){
$("#search_result").empty();
$("#search_relative").empty();
$("#search_all").empty();
$("#search_suggest").empty();


var str=decodeURI(window.location.href);
var es=/pw=/;
es.exec(str);
var value=RegExp.rightContext;
var page_num=page;

 $.ajax({
    url:"../php/search_show.php",
    type:"post",
    data:{"value":value,"page_num":page_num},

    success:function(data){
      var array=data.split("^|^");
      var arr=array[0].split("^;^");

      var relative_arr=array[1].split("^;^");
      var relative_arr_num=parseInt(relative_arr[0]);
      var relative_result=relative_arr[1];

      var suggest_arr=array[2].split("^;^");
      var suggest_arr_num=parseInt(suggest_arr[0]);
      var suggest_result=suggest_arr[1];

      var number=arr[0].split("^,^");
      var num=parseInt(number[0]);
      var total=parseInt(number[1]);
      var page2=parseInt(number[2]);

      if(num==0)
      {
         $("#search_all").append(
            "<div id='res-neck'>"+
		      "大约有 <strong>"+num+"</strong> 项符合查询结果，库内数据总量为 <strong>"+total+"</strong> 项。"+
		      "</div>"        
         ); 

         if(suggest_arr_num==0)
         {
            $("#search_suggest").append(
            "<span style='color:red;'>您是不是要找："+suggest_arr[1]+"</span>"
           );
         }

         else{
            var suggest_arr_show=suggest_result.split("^,^");
             $("#search_suggest").append(
               "<span style='color:red;'>您是不是要找：</span>"+"<br/>"
            );
            for(i=0;i<suggest_arr_num;i++)
            {
               $("#search_suggest").append(
                "<a href='http://localhost/HUSTonline/HTML/search_index.html?pw="+suggest_arr_show[i]+"'>"+suggest_arr_show[i]+"&nbsp;&nbsp;&nbsp;</a>"
              );
            }
         }


         $("#search_result").append(
           "<div id='res-empty' style='text-align: left;' class='adding'>"+
		     "<p>找不到和 <strong>"+value+"</strong> 相符的内容或信息。建议您：</p>"+
		     "<ul>"+
			  "<li>请检查输入字词有无错误。</li>"+
			  "<li>请换用另外的查询字词。</li>"+
			  "<li>请改用较短、较为常见的字词。</li>"+
		     "</ul>"+
	        "</div>"
         );
      }


      else{
        $("#search_all").append(
            "<div id='res-neck'>"+
		      "大约有 <strong>"+num+"</strong> 项符合查询结果，库内数据总量为 <strong>"+total+"</strong> 项。"+
		      "</div>"        
         );
        if(page_num==Math.ceil(num/page2))
        {
        var mod=num%page2;
        for(i=0;i<mod;i++)
        {
         var pr=arr[i+1].split("^,^");
         $("#search_result").append(
           "<table class='adding'style='text-align: left;'><tbody><tr><td>"+
                   "<div><span style='font-size:18px;'><span class='location' title="+pr[2]+" >"+pr[0]+"</span>&nbsp;&nbsp;&nbsp;</span><span style='font-size:9px;'>"+pr[4]+"</span></div>"+
                   "<div style='font-size:15px;'>"+pr[1]+"</div>"+
                   "<div'><p><span class='re1'>&nbsp;</span><span style='color:green;font-size:11px;'>"+pr[2]+"</span>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red;font-size:11px;'>"+pr[3]+"</span></p></div>"+
           "</td></tr></tbody></table>"
            )  
          }     
        }
        else{
          for(i=0;i<page2;i++)
         {
           var pr=arr[i+1].split("^,^");
           $("#search_result").append(
             "<table class='adding'style='text-align: left;'><tbody><tr><td>"+
                   "<div><span style='font-size:18px;'><span class='location' title="+pr[2]+" >"+pr[0]+"</span>&nbsp;&nbsp;&nbsp;</span><span style='font-size:9px;'>"+pr[4]+"</span></div>"+
                   "<div style='font-size:15px;'>"+pr[1]+"</div>"+
                   "<div'><p><span class='re1'>&nbsp;</span><span style='color:green;font-size:11px;'>"+pr[2]+"</span>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red;font-size:11px;'>"+pr[3]+"</span></p></div>"+
           "</td></tr></tbody></table>"
             )  
           }
         }
         if(relative_arr_num==0)
         {
            $("#search_relative").append(
            "<span style='color:red;'>相关搜索： "+relative_arr[1]+"</span>"
           );
         }
         else{
            var relative_arr_show=relative_result.split("^,^");
             $("#search_relative").append(
             "<span style='color:red;'>相关搜索： </span>"+"<br/>"
            );
            for(i=0; i<relative_arr_num ;i++)
            {
               $("#search_relative").append(
                "<a href='http://localhost/HUSTonline/HTML/search_index.html?pw="+relative_arr_show[i]+"'>"+relative_arr_show[i]+"&nbsp;&nbsp;&nbsp;</a>"
              );
            }
          }
       }
    }   
 });
}

 show(1);
 $(".page").live('click',function(){
   $(this).siblings().removeClass("point");
   $(this).addClass("point");
   var page_value=$(this).attr('id');
   show(page_value);
});

});  
