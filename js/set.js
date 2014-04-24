$(document).ready(function(){
$("#save").click(function(){
	var r=confirm("您确定您要更改相关设置吗？");
  if(r==true)
   {
   	var way = $('input:radio[name="find"]:checked').val();
      var page1 = $('option:checked').val();
      $.ajax({
      	url:"../php/set.php",
      	type:"post",
      	data:{"way":way,"page1":page1},
      	success:function(data){
      		 var confirm1=parseInt(data);      		 
             if(confirm1==1)
             {
                alert("保存设置成功！");             	
             }  
             else{
             	  alert("保存设置失败！");          
             }               		
      	  }
       });
     }
	});
$("#delete").click(function(){
	var r=confirm("您确定您要删除所有数据库中的数据么？");
   if(r==true)
    {
      $.ajax({
      	url:"../php/clean_db.php",
      	type:"post",
      	success:function(data){
      		 var confirm1=parseInt(data);      		 
             if(confirm1==1)
             {
                alert("删除成功！");             	
             }  
             else{
             	 alert("操作失败！");          
             }               		
      	  }
       });
     }
	});
		
$("#add").click(function(){
 var name=prompt("请输入您要导入的文件名：");
  if(name!="")
    {
      $.ajax({
      	url:"../php/sort.php",
      	type:"post",
      	data:{"name":name},
      	success:function(data){
      		alert(data);
      		 var confirm2=parseInt(data);      		 
             if(confirm2==1)
             {
                alert("添加成功！");             	
             }  
             else{
             	 alert("操作失败！");          
             }               		
      	  }
       });
    }
   else{
   	alert("文件名不能为空！");
   	}    
	});
});