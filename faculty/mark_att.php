<?php
require_once 'connect.php';
require_once 'validator.php';
$date = date('Y-m-d');
$attendance = array();
if(isset($_GET['subject_id'])){
    $ret_id = explode("_", $_GET['subject_id']);
    $subject_id = $ret_id[0];
    $course_id = $ret_id[1];
?>
<div class = "well col-lg-12">
    <?php
    $q_manage_faculty = $conn->query("SELECT * FROM `manage_faculty` WHERE `faculty_id` = '$_SESSION[faculty_id]' && `course_id` = '" . $course_id . "' && `subject_id` = '" . $subject_id . "'") or die(mysqli_error());
    $f_manage_faculty = $q_manage_faculty->fetch_array();
    ?>
        
        <div class = "form-group">
                <label>Current Class Count:</label>
                <input type = "text" id="curr_progress" name = "curr_progress" value = "<?php echo $f_manage_faculty['curr_progress']?>" required = "required" class = "form-control" />
        </div>
				<table id = "table" class = "table table-bordered">
					<thead class = "alert-info">
						<tr>
							<th>Student ID</th>
							<th>Student Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
                            $sql = "SELECT * FROM `student` WHERE `course_id` = '" . $course_id ."'";
							$q_student = $conn->query($sql) or die(mysqli_error());
							while($f_student = $q_student->fetch_array()){
						?>
						<tr>
                            <?php 
                            $att->subject_id = $subject_id;
                            $att->faculty_id = $_SESSION['faculty_id'];
                            $att->student_id = $f_student['student_id'];
                            $att->status = 0;
                            $ex_attendance_query = "Select attendance from `temp_attendance` WHERE  `student_id` = '".$att->student_id ."' && `subject_id` = '" .  $att->subject_id . "' && `faculty_id` = '" .  $att->faculty_id . "' && `attedance_date` = '" . $date ."'";
                            $q_ex_attendance = $conn->query($ex_attendance_query) or die(mysqli_error());
                            $count = 0;
							while($f_ex_attendance = $q_ex_attendance->fetch_array()){
                                $att->status = $f_ex_attendance['attendance'];
                                $count = 1;
                            }
                            $json_str = json_encode($att);
                            if($count == 0) {
                                $ins_query = "INSERT INTO `db_ams`.`temp_attendance` (`subject_id`, `faculty_id`, `student_id`, `attedance_date`, `attendance`) VALUES ('".$subject_id."', '".$_SESSION['faculty_id']."', '".$att->student_id."', now(), '". $att->status . "')";
                                $conn->query($ins_query) or die(mysqli_error());
                            }
                            ?>
                            <td><?php echo $f_student['student_id']?></td>
							<td><?php echo $f_student['firstname'] . " " . $f_student['lastname']?></td>
                            <td><input type = 'checkbox' name=<?php echo $json_str ?> onclick = "addAttendance(this)" <?php echo $att->status == 1 ? "checked":"" ?> > </td>
						</tr>
						<?php
                            }
						?>
					</tbody>
				</table>
        <div class = "modal-footer">
            <button  class = "btn btn-warning" onclick="saveCurrProgress(<?php echo $f_manage_faculty['manage_faculty_id']?>)"  name = "edit_admin"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
        </div>
</div>
<?php
}
?>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>
<script src = "js/jquery.dataTables.js"></script>
<script type="text/javascript">
    addAttendance = function(cb) {
        var data = JSON.parse(cb.name);
        data["status"] = (cb.checked) ? 1:0;
        $.post("add_attendance.php", 
		data,
		function(response, status){ 
			if (status == "success") {
				console.log("RESULT", response);
				
			} else {
				
			}
		})
    }
    saveCurrProgress = function(id) {
        var progress = $('#curr_progress').val();
        $.post("save_cuur_progress.php", 
		{'id': id, 'progress': progress},
		function(response, status){ 
			if (status == "success") {
				alert('Successfully Saved..!!');				
			} else {
				
			}
		})
    }
</script>