
	<div id="wrapper">
		
		<?php $this->load->view('templates/Sidebar'); ?>

		<div id="main">
			
			<?php $this->load->view('templates/Navigation'); ?>

			<ul class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?= base_url(); ?>admin/dashboard">Dashboard</a>
				</li>
				<li class="breadcrumb-item">Reservations</li>
				<li class="breadcrumb-item">View</li>
			</ul>

			<div class="content">
				
				<div class="content-header">

					<h1 class="mb-0 display-4">View Reservation</h1>

				</div>

				<section>
					<ul class="list-group">
						<li class="list-group-item">Res. ID. : <?= $reservation->res_id; ?></li>
						<li class="list-group-item">Res. By : <?= $reservation->res_by; ?></li>
						<li class="list-group-item">Organization / Department : <?= $reservation->org_dept; ?></li>
						<li class="list-group-item">Facility : <?= $reservation->facility; ?></li>
						<li class="list-group-item">Purpose : <?= $reservation->purpose; ?></li>
						<li class="list-group-item">No. of Users : <?= $reservation->no_users; ?></li>
						<li class="list-group-item">Date / Time : <?= date('j F, Y @ h:i A', strtotime($reservation->date.' '.$reservation->time_start)); ?></li>
						<li class="list-group-item">Status : <?= res_status($reservation->status); ?></li>
					</ul>

				<?php if ($reservation->status == 0) : ?>
					<div class="mt-3">
						<a href="<?= base_url().'admin/reservations/approve/'.$reservation->res_id; ?>" class="btn btn-primary">Approve</a> 
						<a href="<?= base_url().'admin/reservations/reject/'.$reservation->res_id; ?>" class="btn btn-danger">Reject</a>
					</div>
				<?php endif; ?>
				</section>

			</div>

		</div>

	</div>