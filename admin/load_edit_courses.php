<?php
	require_once 'connect.php';
	require_once 'load_data.php'; 
	$q_edit_courses = $conn->query("SELECT * FROM `courses` WHERE `course_no` = '$_REQUEST[course_no]'") or die(mysqli_error());
	$f_edit_courses = $q_edit_courses->fetch_array();
?>
<form method = "POST" action = "edit_courses_query.php?courses_no=<?php echo $f_edit_courses['course_no']?>" enctype = "multipart/form-data">
	<div class  = "modal-body">
		
		<div class = "form-group">
			<label>Course Code</label>
            <select name="programme_code" class = "form-control">
                <option><?php echo $f_edit_courses['programme_code']; ?></option>
                <?php
                    while($f_programme_code = $q_programme_code->fetch_array()){
                ?>
                        <option><?php echo $f_programme_code['programme_code'] ?></option>
                <?php
                    }
                ?>
            </select>	
		</div>
		<div class = "form-group">
			<label>Course Year</label>
			<select name = "course_year"  class = "form-control">
				<option><?php echo $f_edit_courses['course_year']?></option>
				<option>2017</option>
				<option>2018</option>
				<option>2019</option>
				<option>2020</option>
				<option>2021</option>
				<option>2022</option>
			</select>
		</div>
		<div class = "form-group">
			<label>Course Month</label>
			<select name = "course_month"  class = "form-control">
				<option><?php echo $f_edit_courses['course_month']?></option>
				<option>February</option>
				<option>July</option>
			</select>
		</div>
	</div>
	<div class = "modal-footer">
		<button  class = "btn btn-warning"  name = "edit_courses"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
	</div>
</form>	