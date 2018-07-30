<?php
    require_once 'connect.php';
    $date = date('Y-m-d');
    if(isset($_POST['student_id'])) {
        $student_id = $_POST['student_id'];
        $subject_id = $_POST['subject_id'];
        $faculty_id = $_POST['faculty_id'];
        $status = $_POST['status'];

        $sql = "UPDATE  `db_ams`.`temp_attendance` SET  `attendance` =  '". $status . "' WHERE  `student_id` = '".$student_id ."' && `subject_id` = '" . $subject_id . "' && `faculty_id` = '" . $faculty_id . "' && `attedance_date` = '" . $date ."'";
        echo $sql;
        $q_student = $conn->query($sql) or die(mysqli_error());
    }
    ?>