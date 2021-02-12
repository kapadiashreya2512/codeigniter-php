$(document).ready(function()
{

 $('#btn_submit').on('click',function(e){
   
  e.preventDefault();
   
         var studentname = $('#studentname').val();
	       var marksPercentage = $('#marksPercentage').val();
         var standard = $('#standard').val();
         var uel= Namespace.configuration.submit_forms


    if ( studentname != "" && marksPercentage != "" && standard != "" ) {
       $.ajax({  
         url:uel,
        //console:console.log(url),
         type    : 'post',
         dataType: 'json',
         data    :{
                  'studentname' : studentname,
                  'marksPercentage': marksPercentage,
                  'standard' : standard
        },
        success:function(response){
          window.location.href = response.redirect_url;
        }  
    });
    }else
      alert("Please Fill All The Fields");
  });
});

