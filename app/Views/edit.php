<html>
<head>
  <title>Codeigniter 4 CRUD - Edit User Demo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <div class="container mt-5">
    <form method="post" id="update_user" name="update_user" 
    action="<?= site_url('/Crud/update') ?>"> 
      <input type="hidden" name="studentid" id="studentid" value="<?php echo $student['studentid']; ?>">

      <div class="form-group">
        <label>StudentName</label>
        <input type="text" name="studentname" id="studentname" class="form-control" value="<?php echo $student['studentname']; ?>">
      </div>

      <div class="form-group">
        <label>MarksPercentage</label>
        <input type="text" name="marksPercentage" id="marksPercentage" class="form-control" value="<?php echo $student['marksPercentage']; ?>">
      </div>
      <div class="form-group">
        <label>Standard</label>
        <input type="text" name="standard"  id="standard" class="form-control" value="<?php echo $student['standard']; ?>">
      </div>
      <div class="form-group">
        <button type="submit" id="btn_submit" class="btn btn-danger btn-block">Save Data</button>
      </div>
    </form>
  </div>
<script>
  $(document).ready(function()
{
 $('#btn_submit').on('click',function(e){
   e.preventDefault();
   alert ("in call");

       var studentid = $("#studentid").val();
       var studentname = $('#studentname').val();
	     var marksPercentage = $('#marksPercentage').val();
       var standard = $('#standard').val();
       alert("id"+ studentid + "name"+studentname+"marksPercentage"+marksPercentage+ "standard"+ standard);
      //alert(studentid);
      console.log(studentid);
        
      $.ajax({  
      url:"<?php echo site_url().'/Crud/update';?>",
      type: 'post',
      dataType:'json',
      data:{    'studentid' : studentid,
                'studentname' : studentname,
                'marksPercentage': marksPercentage,
                'standard' : standard
    },
         success:function(response){
         console.log("hello");
         //if(response == "success")
         alert(response);
         window.location.href = "<?php echo site_url().'/Crud/index'; ?>" ;
    }  
 });
});
});
</script>
</body>
</html>