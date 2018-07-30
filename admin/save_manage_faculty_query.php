<?php
	require_once 'connect.php';
	if(ISSET($_POST['save'])){
		$course_id = $_POST['course_id'];
		$subject_id = $_POST['subject_id'];
        $faculty_id = $_POST['faculty_id'];
        $class_count = $_POST['class_count'];

		$conn->query("INSERT INTO `manage_faculty` VALUES('','$course_id', '$subject_id','$faculty_id', '$class_count', '0')") or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("Saved Record");
					window.location = "manage_faculty.php";
				</script>
			';
	}	