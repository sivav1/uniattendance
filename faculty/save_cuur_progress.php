<?php
    require_once 'connect.php';
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $progress = $_POST['progress'];

        $sql = "UPDATE  `db_ams`.`manage_faculty` SET  `curr_progress` =  '". $progress . "' WHERE  `manage_faculty_id` = '".$id ."'";
        echo $sql;
        $q_student = $conn->query($sql) or die(mysqli_error());
    }
    ?>