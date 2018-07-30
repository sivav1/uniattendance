<!DOCTYPE html>
<?php
	require_once 'validator.php';
	require_once 'account.php'; 
?>
<html lang = "eng">
	<head>
		<title>Simple Attendance Record System</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" href = "css/bootstrap.css" />
		<link rel = "stylesheet" href = "css/jquery.dataTables.css" />
	</head>
	<body>
		<nav class = "navbar navbar-inverse navbar-fixed-top">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<img src = "images/logo.png" width = "200px" height = "50px"/>
					<p class = "navbar-text pull-right">Simple Attendance Record System</p>
				</div>
				<ul class = "nav navbar-nav navbar-right">
					<li class = "dropdown">
						<a href = "#" class = "dropdown-toggle" data-toggle = "dropdown"><i class = "glyphicon glyphicon-user"></i> <?php echo htmlentities($admin_name)?> <b class = "caret"></b></a>
						<ul class = "dropdown-menu">
							<li><a href = "logout.php"><i class = "glyphicon glyphicon-off"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<div class = "container-fluid" style = "margin-top:70px;">
			<ul class = "nav nav-pills">
				<li><a href = "home.php"><span class = "glyphicon glyphicon-home"></span> Home</a></li>
				<li class = "dropdown active">
					<a class = "dropdown-toggle" data-toggle = "dropdown" href = "#"><span class = "glyphicon glyphicon-cog"></span> Accounts <span class = "caret"></span></a>
					<ul class = "dropdown-menu">
						<li><a href = "admin.php"><span class = "glyphicon glyphicon-user"></span> Admin</a></li>
						<li><a href = "student.php"><span class = "glyphicon glyphicon-user"></span> Student</a></li>
						<li><a href = "faculty.php"><span class = "glyphicon glyphicon-user"></span> Faculty</a></li>
						<li><a href = "courses.php"><span class = "glyphicon glyphicon-user"></span> Courses</a></li>
						<li><a href = "subjects.php"><span class = "glyphicon glyphicon-user"></span> Subjects</a></li>
						<li><a href = "programs.php"><span class = "glyphicon glyphicon-user"></span> Programs</a></li>
						<li><a href = "manage_faculty.php"><span class = "glyphicon glyphicon-user"></span> Manage Faculty</a></li>
						<li><a href = "manage_subject.php"><span class = "glyphicon glyphicon-user"></span> Manage Subject</a></li>
					</ul>
				</li>
				<li><a href = "record.php"><span class = "glyphicon glyphicon-book"></span> Record</a></li>
			</ul>
			<br />
			<div class = "alert alert-info">Mark Attendance</div>
            <div class = "modal fade" id = "edit_student" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content panel-warning">
						<div class = "modal-header panel-heading">
							<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
							<h4 class = "modal-title" id = "myModallabel">Mark Attendance</h4>
						</div>
						<div id = "edit_query"></div>
					</div>
				</div>
			</div>
			<div class = "well col-lg-12">
				<table id = "table" class = "table table-bordered">
					<thead class = "alert-info">
						<tr>
                            <th>Course ID</th>
							<th>Subject ID</th>
							<th>Subject Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
                            $sql = "SELECT courses.*, manage_subject.* FROM `courses`, `manage_subject` WHERE manage_subject.course_id = courses.course_id and courses.course_id = '" . $_SESSION['course_id'] . "'";
							$q_faculty = $conn->query($sql) or die(mysqli_error());
							while($f_faculty = $q_faculty->fetch_array()){
						?>
						<tr>
                            <td><?php echo $f_faculty['course_id']?></td>
							<td><?php echo $f_faculty['subject_id']?></td>
							<td><?php echo $f_faculty['subject_name']?></td>
							<?php
								$sql_attendance = "SELECT id FROM  `temp_attendance` WHERE  `subject_id` =  '" . $f_faculty['subject_id'] . "' &&  `student_id` =  '" . $_SESSION['student_id'] . "' &&  `attendance` =  '1'";
								$q_sql_attendance = $conn->query($sql_attendance) or die(mysqli_error());
								$att_num = $q_sql_attendance->num_rows;
								
								
								$q_manage_faculty = $conn->query("SELECT * FROM `manage_faculty` WHERE `course_id` = '" . $f_faculty['course_id'] . "' && `subject_id` = '" . $f_faculty['subject_id'] . "'") or die(mysqli_error());
								$f_manage_faculty = $q_manage_faculty->fetch_array();
								$att_perc = 0;
								if($f_manage_faculty['curr_progress'] > 0) {
									$att_perc = ($att_num / $f_manage_faculty['curr_progress']) * 100.0;
								}
								if($att_perc < 80 ){
									$css = "style = color:#ef0000;";
								}
							?>
							<td <?php echo $css;?>><?php echo $att_perc?></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
			<br />
			<br />	
			<br />	
		</div>
		<div class = "navbar navbar-fixed-bottom alert-warning">
			<div class = "container-fluid">
				<label class = "pull-left">&copy; Simple Attendance Record System 2016</label>
				<label class = "pull-right">Developed: <a href = "http://www.sourcecodester.com">www.sourcecodester.com</a></label>
			</div>	
		</div>	
	</body>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/jquery.dataTables.js"></script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('.mark_att').click(function(){
				$subject_id = $(this).attr('name');
				$('#edit_query').load('mark_att.php?subject_id=' + $subject_id);
			});
		});
	</script>
</html>