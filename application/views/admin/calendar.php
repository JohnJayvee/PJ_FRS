
	<div id="wrapper">
		
		<?php $this->load->view('templates/Sidebar'); ?>

		<div id="main">
			
			<?php $this->load->view('templates/Navigation'); ?>

			<ul class="breadcrumb"> 
				<li class="breadcrumb-item">
					<a href="<?= base_url(); ?>admin/dashboard">Dashboard</a>
				</li>
				<li class="breadcrumb-item">
					Event Calendar
				</li>
			</ul>

			<div class="content">
				
				<div class="content-header">
					<h1 class="display-4 mb-0">Event Calendar</h1>
				</div>

				<div class="section">
					<?= $calendar; ?>
				</div>

			</div>

		</div>


	</div>