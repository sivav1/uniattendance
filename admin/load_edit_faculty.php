<?php
	require_once 'connect.php';
	$q_edit_faculty = $conn->query("SELECT * FROM `faculty` WHERE `faculty_id` = '$_REQUEST[faculty_id]'") or die(mysqli_error());
	$f_edit_faculty = $q_edit_faculty->fetch_array();
?>
<form method = "POST" action = "edit_faculty_query.php?faculty_id=<?php echo $f_edit_faculty['faculty_id']?>" enctype = "multipart/form-data">
	<div class  = "modal-body">
		<div class = "form-group">
			<label>Faculty ID:</label>
			<input type = "text" readonly="true" name = "faculty_no" value = "<?php echo $f_edit_faculty['faculty_id']?>" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Name:</label>
			<input type = "text" name = "faculty_name" value = "<?php echo $f_edit_faculty['faculty_name']?>" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Email:</label>
			<input type = "text" value = "<?php echo $f_edit_faculty['faculty_email']?>" name = "faculty_email" required = "required" class = "form-control" />
		</div>
	</div>
	<div class = "modal-footer">
		<button  class = "btn btn-warning"  name = "edit_faculty"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
	</div>
</form>	