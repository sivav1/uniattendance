<?php
	session_start();
	if(!ISSET($_SESSION['faculty_id'])){
		header('location: index.php');
	}