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
			<h1 class="display-4 mb-0">My Reservations</h1>
		</div>
	</div>

	<div class="my-5">
		<div class="container">
		<?php if ($user->last_name !== '' && $user->first_name !== '' && $user->middle_initial !== '') : ?>
			<div class="mb-3">
				<a href="<?= base_url(); ?>my-reservations/request" class="btn btn-primary">Request</a>
			</div>

			<table class="table table-bordered" id="myResTable">
				<thead>
					<tr>
						<th>Res. No.</th>
						<th>Number of Users</th>
						<th>Facility</th>
						<th>Purpose</th>
						<th>Schedule</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php if ($reservations->num_rows() > 0) : ?>
					<?php foreach ($reservations->result() as $row) : ?>
					<tr>
						<td><?= $row->res_id; ?></td>
						<td><?= $row->no_users ?></td>
						<td><?= $row->facility; ?></td>
						<td><?= $row->purpose; ?></td>
						<td><?= date('j F, Y @ h:i A', strtotime($row->date.' '.$row->time_start)); ?></td>
						<td><?= res_status($row->status); ?></td>
						<td><a href="<?= base_url().'my-reservations/cancel/'.$row->res_id; ?>" class="btn btn-warning btn-sm <?= $row->status == 2 ? NULL : 'disabled'; ?>">Cancel</a></td>
					</tr>
					<?php endforeach; ?>
				<?php endif; ?>
				</tbody>
			</table>
		<?php else : ?>
			<div class="alert alert-info">
				Go to <a href="<?= base_url(); ?>profile" class="text-uppercase"><strong>profile</strong></a> and update your personal info to complete your sign-up request.
			</div>
		<?php endif; ?>
		</div>
	</div>


	<!-- JAVASCRIPTS -->
	<script src="<?= base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
	<script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>assets/datatables/datatables.min.js"></script>
	<script src="<?= base_url(); ?>assets/datatables/datatables/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url(); ?>src/js/app.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#myResTable').DataTable({
				dom : 'tp'
			});
		});
	</script>

</body>

</html>