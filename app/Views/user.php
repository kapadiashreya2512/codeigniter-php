<html>
<head>
<meta charset = "htf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a align="center" href="<?php echo site_url('crud/user_form') ?>" class="btn btn-success mb-2">Add User</a>
	</div>

    <div class="mt-3">
     <table class="table table-bordered"  align="center" border="1" id="users-list" cellpadding="2">
       <thead>
          <tr>
             <th align="left">Studnt Id</th>
             <th align="left">Name</th>
             <th align="left">Marks</th>
             <th align="left">Standard</th>
             <th align="left" callspan="2">Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($student): 
            ?>
          <?php foreach($student as $stud): ?>
          <tr>
             <td><?php echo $stud['studentid']; ?></td>
             <td><?php echo $stud['studentname']; ?></td>
             <td><?php echo $stud['marksPercentage']; ?></td>
             <td><?php echo $stud['standard'];?></td>
             <td>
              <a class="update" href="<?php echo base_url('crud/updatefn/'.$stud['studentid']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a class="delete" href="#" studentid='<?php echo $stud['studentid'];?>' class="btn btn-danger btn-sm">Delete</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
      //$('#users-list').DataTable();
        $(document).on('click',".delete",function(e)
            { 

              e.preventDefault();
              alert("are you want to delete??");
                var $ele = $(this).parents('tr');
                alert($ele);
                var studentid   = $(this).attr('studentid');
                alert(studentid);
                 $.ajax({
                    url:"<?php echo site_url().'/Crud/delete';?>",
                    type:"post",
                    dataType: "json",
                    data:{
                      'studentid':studentid
                    },
                    success: function(response)
                    {
                         $ele.remove();
                         alert("response");
                         window.location.href = "<?php echo site_url().'/Crud/index'; ?>" ;
                    }
                });
            });
  } );
</script>

<?php $session = session();
?>

</body>
</html>