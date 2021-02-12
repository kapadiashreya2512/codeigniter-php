$(document).ready( function () {
    //$('#users-list').DataTable();
      $(document).on('click',".delete",function(e)
          { 
            var studentid = $(this).attr('id');
            e.preventDefault();
              alert("are you want to delete??");
              var $ele = $(this).parents('tr');
             
               $.ajax({
                  url:Namespace.configuration.delete,
                  type    :"post",
                  dataType: "json",
                  data    :{
                    'studentid':studentid
                  },
                  success : function(response)
                  {
                       $ele.remove();
                       window.location.href = response.redirect_url ;
                  }
              });
          });
} );