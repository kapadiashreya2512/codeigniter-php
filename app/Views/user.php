
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
