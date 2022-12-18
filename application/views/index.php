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

	<nav class="navbar navbar-expand index">
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

	<div class="banner d-flex align-items-center" id="wrapper">
		<div class="container">
			<div class="text-holder">
				<h1 class="display-4">Facility Reservation System</h1>
				<p class="mb-0">St. Paul University Philippines</p>
			</div>
		</div>
	</div>

	<div class="py-5" id="demo">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-header text-center">
							<h6 class="mb-0 text-uppercase">Sign Up</h6>
						</div>
						<div class="card-body text-justify">
							<p class="mb-0">Create your account for free. Enter your account details and category where you're in whether it you're an outside, student, or an employee.</p>
						</div>
					</div>
				</div>

				<div class="col">
					<div class="card">
						<div class="card-header text-center">
							<h6 class="mb-0 text-uppercase">Login</h6>
						</div>
						<div class="card-body">
							<p class="mb-0">Login your account with a tight security. Safeguard your confidential information with peace in mind.</p>
						</div>
					</div>
				</div>

				<div class="col">
					<div class="card">
						<div class="card-header text-center">
							<h6 class="mb-0 text-uppercase">Request</h6>
						</div>
						<div class="card-body text-center">
							<p class="mb-0">Check out the scheduled reservations and pick what is vacant then request for reservation. Wait to approve your request and enjoy.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer>
		<div class="container">
			<p class="mb-0">Copyright &copy; 2019. FRS SPUP. All rights reserved.</p>
		</div>
	</footer>

	<!-- JAVASCRIPTS -->
	<script src="<?= base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
	<script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>assets/datatables/datatables.min.js"></script>
	<script src="<?= base_url(); ?>assets/datatables/datatables/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url(); ?>src/js/app.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(window).scroll(function(){
				if ($(document).scrollTop() > 50) {
					$('.navbar').addClass('scrolling');
				} else {
					$('.navbar').removeClass('scrolling');
				}
			});
		});
	</script>

</body>

</html>