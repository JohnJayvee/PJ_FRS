
	<div id="wrapper">
		
		<?php $this->load->view('templates/Sidebar'); ?>

		<div id="main">
			
			<?php $this->load->view('templates/Navigation'); ?>

			<ul class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?= base_url(); ?>admin/dashboard">Dashboard</a>
				</li>
				<li class="breadcrumb-item">Reservations</li>
			</ul>

			<div class="content">
				
				<div class="content-header">

					<h1 class="mb-0 display-4">Reservations</h1>

				</div>

				<div class="section">
					<table class="table table-bordered" id="resTable">
						<thead>
							<tr>
								<th>Res. No.</th>
								<th>Reservation By</th>
								<th>Facility</th>
								<th>Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

						<?php if ($reservations->num_rows() > 0) : ?>
							<?php foreach ($reservations->result() as $row) : ?>
							<tr>
								<td><?= $row->res_id; ?></td>
								<td><?= $row->res_by; ?></td>
								<td><?= $row->facility; ?></td>
								<td><?= date('j F, Y @ h:i A', strtotime($row->date.' '.$row->time_start)); ?></td>
								<td><?= res_status($row->status); ?></td>
								<td><a href="<?= base_url().'admin/reservations/view/'.$row->res_id; ?>" class="btn btn-info btn-sm">View</a></td>
							</tr>
							<?php endforeach; ?>
						<?php endif; ?>

						</tbody>
					</table>
				</div>

			</div>

		</div>

	</div>