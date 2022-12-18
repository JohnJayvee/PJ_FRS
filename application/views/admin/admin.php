
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

				<div class="section">
					<a href="<?= base_url(); ?>admin/admin/new" class="btn btn-primary">
						<span class="fas fa-user-plus"></span> Add Admin
					</a>
				</div>
				
				<div class="section">
					<table class="table table-bordered" id="adminTable">
						<thead>
							<tr>
								<th>Admin ID</th>
								<th>username</th>
								<th>role</th>
							</tr>
						</thead>
						<tbody>

						<?php if ($admins->num_rows() > 0) : ?>
							<?php foreach ($admins->result() as $row) : ?>
							<tr>
								<td><?= $row->admin_id; ?></td>
								<td><?= $row->username; ?></td>
								<td><?= $row->role; ?></td>
							</tr>
							<?php endforeach; ?>
						<?php endif; ?>

						</tbody>
					</table>
				</div>

			</div>

		</div>

	</div>