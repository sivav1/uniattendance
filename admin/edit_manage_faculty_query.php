<?php
    require_once 'connect.php';
    $course_id = $_POST['course_id'];
    $subject_id = $_POST['subject_id'];
	$faculty_id = $_POST['faculty_id'];
	$class_count = $_POST['class_count'];
	$manage_faculty_id = $_POST['manage_faculty_id'];
        
        //$course_id = $programme_code.$course_year.substr($course_month,0,1);
		$conn->query("UPDATE `manage_faculty` SET  `course_id` = '$course_id', `subject_id` = '$subject_id', `faculty_id` = '$faculty_id', `class_count` = '$class_count' WHERE `manage_faculty_id` = '$manage_faculty_id'") or die(mysqli_error());
		echo '
			<script type = "text/javascript">
				alert("Successfully Edited");
				window.location = "manage_faculty.php";
			</script>
		';	