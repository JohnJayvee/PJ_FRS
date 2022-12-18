
	<div id="wrapper">
		
		<?php $this->load->view('templates/Sidebar'); ?>

		<div id="main">

			<?php $this->load->view('templates/Navigation'); ?>

			<ul class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?= base_url(); ?>admin/dashboard">Dashboard</a>
				</li>
				<li class="breadcrumb-item">Accounts</li>
				<li class="breadcrumb-item">Users</li>
			</ul>
			
			<div class="content">
				
				<div class="content-header">
					<h1 class="mb-0 display-4">Users</h1>
				</div>
				
				<div class="section">
					<table class="table table-bordered" id="usersTable">
						<thead>
							<tr>
								<th>User ID</th>
								<th>username</th>
							</tr>
						</thead>
						<tbody>

						<?php if ($users->num_rows() > 0) : ?>
							<?php foreach ($users->result() as $row) : ?>
							<tr>
								<td><?= $row->user_id; ?></td>
								<td><?= $row->username; ?></td>
							</tr>
							<?php endforeach; ?>
						<?php endif; ?>

						</tbody>
					</table>
				</div>

			</div>

		</div>

	</div>