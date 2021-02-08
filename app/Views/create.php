<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
 .container {
      max-width: 500px;
    }
    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
</style>
</head>
<body>
<div class="container mt-5">
    <form method="post" id="add_create" name="add_create" >
      <div class="form-group">  
        <label>StudentName</label>
        <input type="text" name="studentname" id="studentname" class="form-control">
      </div>

      <div class="form-group">
        <label>MarksPercentage</label>
        <input type="text" name="marksPercentage" id="marksPercentage" class="form-control">
      </div>

      <div class="form-group">
        <label>Standard</label>
        <input type="text" name="standard" id="standard" class="form-control">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" id="btn_submit" name="btn_submit">Update Data</button>
      </div>
    </form>
  </div>

<script>
$(document).ready(function()
{
 $('#btn_submit').on('click',function(e){
   e.preventDefault();
   alert("in call");
      var studentname = $('#studentname').val();
	    var marksPercentage = $('#marksPercentage').val();
       var standard = $('#standard').val();
        alert(standard);
        console.log(studentname);
        
      $.ajax({  
      url:"<?php echo site_url().'/Crud/submit_form';?>",
      type: 'post',
      dataType:'json',
      data:{
                'studentname' : studentname,
                'marksPercentage': marksPercentage,
                'standard' : standard
    },
         success:function(response){
         console.log("hello");
         window.location.href = "<?php echo site_url().'/Crud/index'; ?>" ;
    }  
 });
  });
});

</script>
</body>

</html>