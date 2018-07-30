<?php
    require_once 'connect.php';
	$course_no = $_REQUEST['courses_no'];
	
	$programme_code = $_POST['programme_code'];

	$q_programme_code = $conn->query("SELECT programme_code,programme_name FROM `programme` WHERE `programme_code` = '$programme_code'") or die(mysqli_error());
	$f_programme_code = $q_programme_code->fetch_array();
	
	$programme_name = $f_programme_code['programme_name'];
	$programme_code = $f_programme_code['programme_code'];

	$course_year = $_POST['course_year'];
	$course_month = $_POST['course_month'];
	
	$course_id = $programme_code.$course_year.substr($course_month,0,1);
        
		$conn->query("UPDATE `courses` SET  `programme_name` = '$programme_name', `programme_code` = '$programme_code', `course_year` = '$course_year', `course_month` = '$course_month' where `course_no` = '$course_no'") or die(mysqli_error());
		echo '
			<script type = "text/javascript">
				alert("Successfully Edited");
				window.location = "courses.php";
			</script>
		';	