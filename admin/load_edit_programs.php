<?php
	require_once 'connect.php';
	$q_edit_program = $conn->query("SELECT * FROM `programme` WHERE `programme_code` = '$_REQUEST[program_id]'") or die(mysqli_error());
	$f_edit_program = $q_edit_program->fetch_array();
?>
<form method = "POST" action = "edit_programs_query.php?program_id=<?php echo $f_edit_program['programme_code']?>" enctype = "multipart/form-data">
	<div class  = "modal-body">
		<div class = "form-group">
			<label>Programme Code:</label>
			<input type = "text" readonly="true" name = "program_code" value = "<?php echo $f_edit_program['programme_code']?>" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Name:</label>
			<input type = "text" name = "program_name" value = "<?php echo $f_edit_program['programme_name']?>" required = "required" class = "form-control" />
		</div>
	</div>
	<div class = "modal-footer">
		<button  class = "btn btn-warning"  name = "edit_program"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
	</div>
</form>	