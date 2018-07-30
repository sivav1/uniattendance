<?php
    require_once 'connect.php';
    require_once 'load_data.php';
	$q_edit_subject = $conn->query("SELECT * FROM `subjects` WHERE `subject_id` = '$_REQUEST[subject_id]'") or die(mysqli_error());
    $f_edit_subject = $q_edit_subject->fetch_array();
?>
<form method = "POST" action = "edit_subject_query.php?subject_id=<?php echo $f_edit_subject['subject_id']?>" enctype = "multipart/form-data">
    <div class  = "modal-body">
        <div class = "form-group">
            <label>Subject ID</label>
            <input type = "text" name = "subject_id" value = "<?php echo $f_edit_subject['subject_id']?>" disabled required = "required" class = "form-control" />
        </div>
        <div class = "form-group">
            <label>Subject Name</label>
            <input type = "text" name = "subject_name" value = "<?php echo $f_edit_subject['subject_name']?>" required = "required" class = "form-control" />
        </div>
        <div class = "form-group">
            <label>Proramme Code</label>
            <select name="programme_code" class = "form-control">
                <option><?php echo $f_edit_subject['programme_code']; ?></option>
                <?php
                    while($f_programme_code = $q_programme_code->fetch_array()){
                ?>
                        <option><?php echo $f_programme_code['programme_code'] ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
    </div>
	<div class = "modal-footer">
		<button  class = "btn btn-warning"  name = "edit_subject"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
	</div>
</form>	
