
	<div id="wrapper">
		
		<?php $this->load->view('templates/Sidebar'); ?>

		<div id="main">

			<?php $this->load->view('templates/Navigation'); ?>

			<ul class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?= base_url(); ?>admin/dashboard">Dashboard</a>
				</li>
				<li class="breadcrumb-item">Accounts</li>
				<li class="breadcrumb-item">Admin</li>
			</ul>
			
			<div class="content">
				
				<div class="content-header">
					<h1 class="mb-0 display-4">Admin</h1>
				</div>
				
				<form method="post" enctype="multipart/form-data">
					<div class="section">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control"  autocomplete="off" required>
						</div>
						<div class="form-group">
							<label>Confirm Password</label>
							<input type="password" name="cpassword" class="form-control"  autocomplete="off" required>
						</div>
					</div>
					<button type="submit" name="create" class="btn btn-primary">Save</button>
				</form>

			</div>

		</div>

	</div>