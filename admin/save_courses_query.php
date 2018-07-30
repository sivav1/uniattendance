<?php
	require_once 'connect.php';
	if(ISSET($_POST['save'])){
		$programme_code = $_POST['programme_code'];

		$q_programme_code = $conn->query("SELECT programme_code,programme_name FROM `programme` WHERE `programme_code` = '$programme_code'") or die(mysqli_error());
		$f_programme_code = $q_programme_code->fetch_array();
		
		$programme_name = $f_programme_code['programme_name'];
		$programme_code = $f_programme_code['programme_code'];

        $course_year = $_POST['course_year'];
		$course_month = $_POST['course_month'];
		$status = 0;
        
        $course_id = $programme_code.$course_year.substr($course_month,0,1);

		$conn->query("INSERT INTO `courses` VALUES(null, '$course_id', '$programme_name','$programme_code', '$course_year','$course_month')") or die(mysqli_error());

		$q_insert = $conn->query("SELECT * FROM `subjects` WHERE `programme_code` = '$programme_code'") or die(mysqli_error());
		while($f_insert = $q_insert->fetch_array())
		{
			$conn->query("INSERT INTO `manage_subject` VALUES(null, '$course_id', '$f_insert[subject_id]','$f_insert[subject_name]', '$status')") or die(mysqli_error());
		}

			echo '
				<script type = "text/javascript">
					alert("Saved Record");
					window.location = "courses.php";
				</script>
			';
	}	