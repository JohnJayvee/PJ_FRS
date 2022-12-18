
	<div class="d-flex justify-content-center align-items-center" id="wrapper">
		
		<div class="login-panel">
			<img src="<?= base_url(); ?>assets/img/spuplogo.png" class="brand-logo">

			<h4 class="mb-3 text-center text-uppercase">Admin Panel</h3>

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
