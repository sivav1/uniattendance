<?php
	require_once 'connect.php';
	if(ISSET($_POST['save'])){
		$subject_name = $_POST['subject_name'];
		$subject_id = $_POST['subject_id'];
        $programme_code = $_POST['programme_code'];
        

		$conn->query("INSERT INTO `subjects` VALUES('$subject_id', '$subject_name','$programme_code')") or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("Saved Record");
					window.location = "subjects.php";
				</script>
			';
	}	