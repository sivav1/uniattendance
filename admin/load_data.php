<?php
    require_once 'connect.php';
    $q_courses = $conn->query("SELECT DISTINCT course_id FROM `courses`") or die(mysqli_error());
    $q_programme_code = $conn->query("SELECT DISTINCT programme_code FROM `programme`") or die(mysqli_error());
    $q_subjects = $conn -> query("SELECT subject_id, subject_name FROM `subjects`") or die(mysqli_error());
    $q_faculty = $conn -> query("SELECT faculty_id,faculty_name FROM `faculty`") or die(mysqli_error());
    $q_courses_name = $conn->query("SELECT programme_code FROM `programme`") or die(mysqli_error());


