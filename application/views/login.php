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

	<div class="d-flex justify-content-center align-items-center" id="wrapper">
		
		<div class="login-panel">
			<img src="<?= base_url(); ?>assets/img/spuplogo.png" class="brand-logo">

		<!-- PHP SCRIPTS -->
        <?php if (!empty($error) || $error !== NULL) : ?>
            <div class="alert alert-danger mb-3 py-2 text-center"><?= $error; ?></div>
        <?php endif; ?>

			<form method="post">
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" autocomplete="off" required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" autocomplete="off" required>
				</div>
				<div class="d-flex justify-content-between align-items-center mb-3">
					<a href="<?= base_url(); ?>" class="link"><span class="fas fa-arrow-left"></span> Back</a>
					<button type="submit" name="login" class="btn btn-primary">Login</button>
				</div>
			</form>
		</div>

	</div>

</body>

</html>