<?php
	require_once 'connect.php';
	if(ISSET($_POST['save'])){
		$code = $_POST['program_code'];
		$name = $_POST['program_name'];
		$conn->query("INSERT INTO `programme` VALUES('$code','$name')") or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("Saved Record");
					window.location = "programs.php";
				</script>
			';
	}	