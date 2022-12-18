
	<div id="wrapper">
		
		<?php $this->load->view('templates/Sidebar'); ?>

		<div id="main">

			<?php $this->load->view('templates/Navigation'); ?>

			<ul class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?= base_url(); ?>admin/dashboard">Dashboard</a>
				</li>
				<li class="breadcrumb-item">Facilities</li>
			</ul>
			
			<div class="content">
				
				<div class="content-header">

					<h1 class="mb-0 display-4">Facilities</h1>

				</div>

				<div class="section">
					<a href="<?= base_url(); ?>admin/facilities/add" class="btn btn-primary">
						<span class="fas fa-plus"></span> Add Facility
					</a>
				</div>

			<?php if ($facilities->num_rows() > 0)	: ?>
				<div class="section">
					
					<div class="row">

						<?php foreach ($facilities->result() as $row) : ?>
						<div class="col-6 col-md-4 col-lg-3">
							<div class="card card-facilities">
								<a href="<?= base_url().'admin/facilities/delete/'.$row->facility_id; ?>" class="delete" title="Delete"><span class="fas fa-times"></span></a>
								<div class="card-header">
									<img src="<?= base_url().$row->image; ?>" class="d-block w-100">
								</div>
								<div class="card-body">
									<a href="<?= base_url().'admin/facilities/edit/'.$row->facility_id; ?>"><?= $row->name; ?></a>
								</div>
							</div>
						</div>
						<?php endforeach; ?>

					</div>

				</div>
			<?php else : ?>
				<div class="alert alert-info mt-3 py-2">
					No facilities available.
				</div>
			<?php endif; ?>

			</div>

		</div>

	</div>