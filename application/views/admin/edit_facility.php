
	<div id="wrapper">
		
		<?php $this->load->view('templates/Sidebar'); ?>

		<div id="main">

			<?php $this->load->view('templates/Navigation'); ?>

			<ul class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?= base_url(); ?>admin/dashboard">Dashboard</a>
				</li>
				<li class="breadcrumb-item">Facilities</li>
				<li class="breadcrumb-item">Edit</li>
			</ul>
			
			<div class="content">
				
				<div class="content-header">

					<h1 class="mb-0 display-4">Edit Facility</h1>

				</div>

				<form method="post" enctype="multipart/form-data">
					<div class="section">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" value="<?= $facility->name; ?>" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label>Location</label>
							<input type="text" name="location" class="form-control" value="<?= $facility->location; ?>"  autocomplete="off" required>
						</div>
						<div class="form-group">
							<label>Min. Capacity</label>
							<input type="number" name="min_cap" class="form-control" value="<?= $facility->min_cap; ?>" min="1" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label>Max. Capacity</label>
							<input type="number" name="max_cap" class="form-control" value="<?= $facility->max_cap; ?>" min="1" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label>Rate</label>
							<input type="number" name="rate" class="form-control" value="<?= $facility->rate; ?>" min="1" autocomplete="off" required>
						</div>
						<div class="form-group">
							<div class="mb-3">
								<img src="<?= base_url().$facility->image; ?>" class="d-block w-100" style="height: 300px;" id="preview">
							</div>
							<div class="custom-file">
								<input type="file" name="image" class="custom-file-input" id="upload">
								<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
						</div>
					</div>
					<button type="submit" name="update" class="btn btn-primary">Save</button>
				</form>

			</div>

		</div>

	</div>