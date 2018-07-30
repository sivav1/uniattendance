<!DOCTYPE html>
<?php
	require_once 'validator.php';
	require_once 'account.php'; 
?>
<html lang = "eng">
	<head>
		<title>Attendance Management System</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" href = "css/bootstrap.css" />
		<link rel = "stylesheet" href = "css/jquery.dataTables.css" />
	</head>
	<body>
		<nav class = "navbar navbar-inverse navbar-fixed-top">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<p class = "navbar-text pull-right">Attendance Management System</p>
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
			<div class = "alert alert-info">Accounts / Programs</div>
			<div class = "modal fade" id = "add_program" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content panel-primary">
						<div class = "modal-header panel-heading">
							<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
							<h4 class = "modal-title" id = "myModallabel">Add New Faaculty</h4>
						</div>
						<form method = "POST" action = "save_program_query.php" enctype = "multipart/form-data">
							<div class  = "modal-body">
								<div class = "form-group">
									<label>Program Code:</label>
									<input type = "text" readonly = "true" name = "program_code" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Program Name:</label>
									<input type = "text" name = "program_name" required = "required" class = "form-control" />
								</div>
							</div>
							<div class = "modal-footer">
								<button  class = "btn btn-primary" name = "save"><span class = "glyphicon glyphicon-save"></span> Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class = "modal fade" id = "delete" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content ">
						<div class = "modal-body">
							<center><label class = "text-danger">Are you sure you want to delete this record?</label></center>
							<br />
							<center><a class = "btn btn-danger remove_id" ><span class = "glyphicon glyphicon-trash"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
						</div>
					</div>
				</div>
			</div>
			<div class = "modal fade" id = "edit_program" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content panel-warning">
						<div class = "modal-header panel-heading">
							<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
							<h4 class = "modal-title" id = "myModallabel">Edit program</h4>
						</div>
						<div id = "edit_query"></div>
					</div>
				</div>
			</div>
			<div class = "well col-lg-12">
				<button class = "btn btn-success" type = "button" href = "#" data-toggle = "modal" data-target = "#add_program"><span class = "glyphicon glyphicon-plus"></span> Add new </button>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead class = "alert-info">
						<tr>
							<th>Program ID</th>
							<th>Program Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$q_program = $conn->query("SELECT * FROM `programme`") or die(mysqli_error());
							while($f_program = $q_program->fetch_array()){
						?>
						<tr>
							<td><?php echo $f_program['programme_code']?></td>
							<td><?php echo $f_program['programme_name']?></td>
							<td><a class = "btn btn-danger rprogram_id" name = "<?php echo $f_program['programme_code']?>" href = "#" data-toggle = "modal" data-target = "#delete"><span class = "glyphicon glyphicon-remove"></span></a> <a class = "btn btn-warning  eprogram_id" name = "<?php echo $f_program['programme_code']?>" href = "#" data-toggle = "modal" data-target = "#edit_program"><span class = "glyphicon glyphicon-edit"></span></a></td>
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
			$('.rprogram_id').click(function(){
				program_id = $(this).attr('name');
				$('.remove_id').click(function(){
					window.location = 'delete_program.php?program_id=' + program_id;
				});
			});
			$('.eprogram_id').click(function(){
				program_id = $(this).attr('name');
				$('#edit_query').load('load_edit_program.php?program_id=' + program_id);
			});
		});
	</script>
</html>