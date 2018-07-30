<?php
    require_once 'connect.php';
        $subject_id = $_REQUEST['subject_id'];
        $subject_name = $_POST['subject_name'];
        $programme_code = $_POST['programme_code'];
        
        $course_id = $programme_code.$course_year.substr($course_month,0,1);
		$conn->query("UPDATE `subjects` SET  `subject_name` = '$subject_name', `programme_code` = '$programme_code' WHERE `subject_id` = '$subject_id'") or die(mysqli_error());
		echo '
			<script type = "text/javascript">
				alert("Successfully Edited");
				window.location = "subjects.php";
			</script>
		';	