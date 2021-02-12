$(document).ready(function()
{
 $('#btn_submit').on('submit',function(e){
   e.preventDefault();
   alert("in click");
   var file = $('#profile')[0].files[0]
   var formData = new  FormData(this);
   formData.append('file',file);
   alert(formData);
   if($('#profile').val() == " ")
   {
       alert("please select the file");
   }
   else{
    $.ajax({  
        url      : Namespace.configuration.adminforms,
        type     : 'post',
        dataType : 'json',
        data    : formData,
        cache     :false,
        contentType: false,
        processData: false,
            success:function(response){
                alert("in response");
            window.location.href = response.redirect_url;
       }  
       });
       
   }

   

    //    var userid   = $("#userid").val();
    //    var username = $('#username').val();
	//    var  password = $('#password').val();
    //    var profile  = $('#profile').val();

       //alert("id"+ userid + "name"+username + "password"+password + "profile"+ profile);
      //console.log(userid);
      //if ( username != "" && password != "" && profile != "" ) {
    //   $.ajax({  
    //   url      : Namespace.configuration.adminforms,
    //   type     : 'post',
    //   dataType : 'json',
    //   data    : formData,
    //       success:function(response){
    //           alert("in response");
    //       window.location.href = response.redirect_url;
    //  }  
    //  });
//      }else{
//      alert("Please Fill All THE Fields");
// }
});
});