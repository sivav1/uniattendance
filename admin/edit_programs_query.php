<?php
	require_once 'connect.php';
	$code = $_REQUEST['program_code'];
	$name = $_POST['program_name'];
		$conn->query("UPDATE `programme` SET  `programme_name` = '$name' where `programme_code` = '$code'") or die(mysqli_error());
		echo '
			<script type = "text/javascript">
				alert("Successfully Edited");
				window.location = "programs.php";
			</script>
		';	