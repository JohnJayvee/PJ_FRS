
	<div id="wrapper">
		
		<?php $this->load->view('templates/Sidebar'); ?>

		<div id="main">

			<?php $this->load->view('templates/Navigation'); ?>

			<ul class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?= base_url(); ?>">Dashboard</a>
				</li>
				<li class="breadcrumb-item">
					Logs
				</li>
			</ul>
			
			<div class="content">
				
				<div class="content-header">
					<h1 class="mb-0 display-4">Logs</h1>
				</div>

				<section>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Info</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
						<?php if ($logs->num_rows() > 0) : ?>
							<?php foreach ($logs->result() as $row) : ?>
							<tr>
								<td><?= $row->username == $this->session->userdata('admin') ? 'You '.$row->action.'.' : $row->role.' '.$row->username.' '.$row->action; ?></td>
								<td><?= date('j F, Y - h:i A', strtotime($row->date)); ?></td>
							</tr>
							<?php endforeach; ?>
						<?php endif; ?>
						</tbody>
					</table>
				</section>

			</div>

		</div>

	</div>