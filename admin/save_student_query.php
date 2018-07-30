<?php
	require_once 'connect.php';
	
	if(ISSET($_POST['save'])){
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];

		$course_id = $_POST['course_id'];

		

		$q_courses = $conn->query("SELECT * FROM `courses` WHERE `course_id`='" . $course_id . "'") or die(mysqli_error());
		$f_courses = $q_courses->fetch_array();
		var_dump($f_courses);

		$course = $f_courses['programme_name'];
		$course_year = $f_courses['course_year'];
		$course_month = $f_courses['course_month'];
	
		$student_username = $email;
		$student_password = $lastname.$course_month;

		$sql = "INSERT INTO `student` VALUES(null,'" . $firstname . "', '". $middlename ."', '" . $lastname . "', '". $email . "', '" . $course . "', '" . $course_year ."', '" . $course_month ."', '" . $course_id . "')";
		$conn->query($sql) or die(mysqli_error($conn));

		$q_student = $conn->query("SELECT * FROM `student` WHERE `email` = '$email'") or die(mysqli_error());
		$f_student = $q_student->fetch_array();
		$student_id = $f_student['student_id'];
		$conn->query("INSERT INTO `student_login` VALUES('$student_id', '$student_username', '$student_password', '$course_id')") or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("Saved Record");
					window.location = "student.php";
				</script>
			';
	}	