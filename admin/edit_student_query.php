<?php
	require_once 'connect.php';
	$firstname = $_POST['firstname'];
	$middlename = $_POST['middlename'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];

	$course_id = $_POST['course_id'];

	

	$q_courses = $conn->query("SELECT * FROM `courses` WHERE `course_id`='" . $course_id . "'") or die(mysqli_error());
	$f_courses = $q_courses->fetch_array();

	$course = $f_courses['programme_name'];
	$course_year = $f_courses['course_year'];
	$course_month = $f_courses['course_month'];

		$conn->query("UPDATE `student` SET `firstname` = '$firstname', `middlename` = '$middlename', `lastname` = '$lastname', `course_id` = '$course_id', `course` = '$course', `course_year` = '$course_year', `course_month` = '$course_month' WHERE `student_id` = '$_REQUEST[student_id]'") or die(mysqli_error());
		echo '
			<script type = "text/javascript">
				alert("Successfully Edited");
				window.location = "student.php";
			</script>
		';	