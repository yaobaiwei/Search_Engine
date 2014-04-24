 $(document).ready(function(){
  $("#but").click(function(){
    var know = document.getElementById("kw").value;
    if(know.length==0)
    {
      alert("请输入您要搜索的内容！");
    }
    else{
       window.location.href="http://localhost/HUSTonline/HTML/search_index.html?pw="+know;
    }   
   });
 });
