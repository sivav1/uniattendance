<?php
	require_once 'connect.php';
	$faculty_id = $_REQUEST['faculty_id'];
	$name = $_POST['faculty_name'];
	$email = $_POST['faculty_email'];
		$conn->query("UPDATE `faculty` SET  `faculty_name` = '$name', `faculty_email` = '$email' where `faculty_id` = '$faculty_id'") or die(mysqli_error());
		echo '
			<script type = "text/javascript">
				alert("Successfully Edited");
				window.location = "faculty.php";
			</script>
		';	