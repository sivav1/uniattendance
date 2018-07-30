<?php
	require_once 'connect.php';
	require_once 'load_data.php';
	$q_edit_student = $conn->query("SELECT * FROM `student` WHERE `student_id` = '$_REQUEST[student_id]'") or die(mysqli_error());
	$f_edit_student = $q_edit_student->fetch_array();
?>
<form method = "POST" action = "edit_student_query.php?student_id=<?php echo $f_edit_student['student_id']?>" enctype = "multipart/form-data">
	<div class  = "modal-body">
	<div class = "form-group">
			<label>Firstname:</label>
			<input type = "text" value = "<?php echo $f_edit_student['firstname']; ?>" name = "firstname" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Middlename:</label>
			<input type = "text" value = "<?php echo $f_edit_student['middlename']; ?>" name = "middlename" placeholder = "(Optional)" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Lastname:</label>
			<input type = "text" value = "<?php echo $f_edit_student['lastname']; ?>" name = "lastname" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Email :</label>
			<input type = "text" value = "<?php echo $f_edit_student['email']; ?>" name = "email" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Course ID :</label>
			<select name="course_id" class = "form-control">
			<option><?php echo $f_edit_student['course_id']; ?></option>
			<?php
				while($f_courses = $q_courses->fetch_array()){
			?>
					<option><?php echo $f_courses['course_id'] ?></option>
			<?php
				}
			?>
			</select>
		</div>
	</div>
	<div class = "modal-footer">
		<button  class = "btn btn-warning"  name = "edit_admin"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
	</div>
</form>	