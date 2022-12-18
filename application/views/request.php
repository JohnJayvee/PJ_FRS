<!DOCTYPE html>

<html lang="en">

<head>

	<title><?= $title; ?></title>

	<!-- BOOTSTRAP CORE CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">

	<!-- FONT AWESOME ICONS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/font-awesome/css/all.min.css">

	<!-- CUSTOM CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>src/css/project.frs.spup.css">

	<!-- FAIVCON -->
	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/spuplogo.png">

	<!-- META TAGS -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta name="author" content="PaTZ">

</head>

<body>

	<nav class="navbar navbar-expand">
		<div class="container d-flex">
			<a href="<?= base_url(); ?>" class="navbar-brand">
				<img src="<?= base_url(); ?>assets/img/spuplogo.png" class="brand-logo">
			</a>
			<div class="collapse navbar-collapse justify-content-end" id="navbar-nav">
				<ul class="navbar-nav align-items-center">
					<li class="nav-item">
						<a href="<?= base_url(); ?>" class="nav-link">Home</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url(); ?>schedules/calendar" class="nav-link">Schedules</a>
					</li>
					<?php if ($user_logged_in === TRUE) : ?>
						<li class="nav-item dropdown">
							<a href="<?= base_url(); ?>" class="nav-link dropdown-toggle user" data-toggle="dropdown">
								<img src="<?= base_url().$user->image; ?>" class="avatar"> <?= $user->username; ?>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a href="<?= base_url(); ?>profile" class="dropdown-item">Profile</a>
								<a href="<?= base_url(); ?>my-reservations" class="dropdown-item">My Reservations</a>
								<div class="dropdown-divider"></div>
								<a href="<?= base_url(); ?>logout" class="dropdown-item">Logout</a>
							</div>
						</li>
					<?php else : ?>
						<li class="nav-item">
							<a href="<?= base_url(); ?>login" class="nav-link">Login</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url(); ?>sign-up" class="nav-link">Sign Up</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>

	<div class="page-header">
		<div class="container">
			<h1 class="display-4 mb-0">Request Reservation</h1>
		</div>
	</div>

	<div class="my-5">
		<div class="container">
			<form method="post">
				<input type="hidden" name="name" class="form-control" value="<?= $user->first_name.' '.$user->middle_initial.'. '.$user->last_name; ?>" autocomplete="off">
				<input type="hidden" name="org_dept" class="form-control" value="<?= $user->org_dept; ?>" autocomplete="off">
				<div class="form-group">
					<label>Facility</label>
					<select name="facility" class="form-control" required>
						<option value="" disabled selected>-- Select --</option>

						<?php if ($facilities->num_rows() > 0) : ?>
							<?php foreach ($facilities->result() as $row) : ?>
								<option><?= $row->name; ?></option>
							<?php endforeach; ?>
						<?php endif; ?>

					</select>
				</div>

				<div class="form-group">
					<label>Purpose</label>
					<input type="text" name="purpose" class="form-control" autocomplete="off" required>
				</div>

				<div class="form-group">
					<label>No. Users</label>
					<input type="number" name="no_users" class="form-control" min="1" autocomplete="off" id="myInput" oninput="myFunction()" required>
				</div>

				<div class="form-group">
					<label>Date</label>
					<input type="date" name="date" class="form-control" autocomplete="off" required>
				</div>

				<div class="form-group">
					<label>Time Start</label>
					<input type="time" name="time_start" class="form-control" autocomplete="off" required>
				</div>

				<div class="form-group">
					<label>Time End</label>
					<input type="time" name="time_end" class="form-control" autocomplete="off" required>
				</div>

				<button type="submit" name="request" class="btn btn-primary">Request</button>
			</form>
		</div>
	</div>


	<!-- JAVASCRIPTS -->
	<script src="<?= base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
	<script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>assets/datatables/datatables.min.js"></script>
	<script src="<?= base_url(); ?>assets/datatables/datatables/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url(); ?>src/js/app.js"></script>

</body>

</html>



<script>
	function myFunction() {
		var x = document.getElementById("myInput").value;

		if(x > 300){
			alert('the maximum capacity is 300');
			var x =  document.getElementById('myInput').value = ""; 

		}
	}
</script>
