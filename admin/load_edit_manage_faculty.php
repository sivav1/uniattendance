<?php
    require_once 'connect.php';
    require_once 'load_data.php';
	$q_manage_faculty = $conn->query("SELECT * FROM `manage_faculty` WHERE `manage_faculty_id` = '$_REQUEST[manage_faculty_id]'") or die(mysqli_error());
	$f_manage_faculty = $q_manage_faculty->fetch_array();
?>
<form method = "POST" action = "edit_manage_faculty_query.php?manage_faculty_id=<?php echo $f_manage_faculty['manage_faculty_id']?>" enctype = "multipart/form-data">
    <div class  = "modal-body">
        <div class = "form-group">
                                <label>Course ID</label>
                                <select name="course_id" class = "form-control">
                                    <?php
                                        while($f_courses = $q_courses->fetch_array()){
                                            $selected = "";
                                            $selected =$f_manage_faculty['course_id'] == $f_courses['course_id'] ? "selected" : "";
                                    ?>
                                            <option <?php echo $selected ?> value="<?php echo $f_courses['course_id'] ?>"><?php echo $f_courses['course_id'] ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class = "form-group">
                                <label>Subject ID</label>
                                <select name="subject_id" class = "form-control">
                                    
                                    <?php
                                        while($f_subjects = $q_subjects->fetch_array()){
                                            $selected = "";
                                            $selected = $f_manage_faculty['subject_id'] == $f_subjects['subject_id'] ? "selected" : "";
                                    ?>
                                            <option <?php echo $selected ?> value = "<?php echo $f_subjects['subject_id']; ?>"><?php echo $f_subjects['subject_name'] ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class = "form-group">
                                <label>Faculty</label>
                                <select name="faculty_id" class = "form-control">
                                    <?php
                                        while($f_faculty = $q_faculty->fetch_array()){
                                            $selected = "";
                                            $selected = $f_manage_faculty['faculty_id'] == $f_faculty['faculty_id'] ? "selected" : "";
                                    ?>
                                            <option <?php echo $selected ?> value = "<?php echo $f_faculty['faculty_id']; ?>"><?php echo $f_faculty['faculty_name'] ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class = "form-group">
									<label>Total Classes:</label>
									<input type = "text" name = "class_count" required = "required" class = "form-control" value="<?php echo $f_manage_faculty['class_count'] ?>" />
                                    <input type = "text" name = "manage_faculty_id" style="display: none" required = "required" class = "form-control" value="<?php echo $f_manage_faculty['manage_faculty_id'] ?>" />
							</div>
    </div>
	<div class = "modal-footer">
		<button  class = "btn btn-warning"  name = "manage_faculty"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
	</div>
</form>	
