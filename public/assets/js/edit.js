$(document).ready(function()
{
 $('#btn_submit').on('click',function(e){
   e.preventDefault();
       var studentid = $("#studentid").val();
       var studentname = $('#studentname').val();
	  var marksPercentage = $('#marksPercentage').val();
       var standard = $('#standard').val();
       alert("id"+ studentid + "name"+studentname+"marksPercentage"+marksPercentage+ "standard"+ standard);
      console.log(studentid);
      if ( studentname != "" && marksPercentage != "" && standard != "" ) {
      $.ajax({  
      url      : Namespace.configuration.updateforms,
      type     : 'post',
      dataType :'json',
      data:{    
           'studentid' : studentid,
           'studentname' : studentname,
           'marksPercentage': marksPercentage,
           'standard' : standard
     },
          success:function(response){
          window.location.href = response.redirect_url ;
     }  
     });
     }else{
     alert("Please Fill All THE Fields");
}
});
});