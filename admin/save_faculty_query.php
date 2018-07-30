<?php
	require_once 'connect.php';
	if(ISSET($_POST['save'])){
		$name = $_POST['faculty_name'];
		$email = $_POST['faculty_email'];
		$password = $_POST['faculty_password'];
		$conn->query("INSERT INTO `faculty` VALUES(null, '$name','$email', '$password')") or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("Saved Record");
					window.location = "faculty.php";
				</script>
			';
	}	