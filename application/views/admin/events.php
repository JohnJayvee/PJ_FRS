 
	<div id="wrapper">
		
		<?php $this->load->view('templates/Sidebar'); ?>

		<div id="main">

			<?php $this->load->view('templates/Navigation'); ?>

			<ul class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?= base_url(); ?>admin/dashboard">Dashboard</a>
				</li>
				<li class="breadcrumb-item">
					<a href="<?= base_url(); ?>admin/calendar">Schedules</a>
				</li>
				<li class="breadcrumb-item">
					Events
				</li>
			</ul>
			
			<div class="content">
				
				<div class="content-header">
					<h1 class="mb-0 display-4">Scheduled Events</h1>
				</div>

				<div class="section">
					<ul class="list-group">
						<li class="list-group-item"><h3 class="mb-0"><?= $date; ?></h3></li>
					<?php foreach ($events->result() as $row) : ?>
						<li class="list-group-item"><?= $row->facility.' - '.$row->purpose.' @ '.date('h:i A', strtotime($row->time_start)); ?></li>
					<?php endforeach; ?>
					</ul>
				</div>

			</div>

		</div>

	</div>