
	<div id="wrapper">
		
		<?php $this->load->view('templates/Sidebar'); ?>

		<div id="main">
			
			<?php $this->load->view('templates/Navigation'); ?>

			<ul class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="<?= base_url(); ?>admin/dashboard">Dashboard</a>
				</li>
				<li class="breadcrumb-item">Schdules</li>
			</ul>

			<div class="content">
				
				<div class="content-header">

					<h1 class="mb-0 display-4">Schedules</h1>

				</div>

				<div class="section mb-3">
					<a href="<?= base_url(); ?>admin/calendar" class="btn btn-primary"><span class="fas fa-calendar"></span> Event Calendar</a>
				</div>

				<div class="section">
					<table class="table table-bordered">
						<tbody>

						<?php for ($i = 1; $i <= $days; $i++) : ?>
							<tr <?= $i == date('j') ? 'class="today"' : NULL ; ?>>
								<td><?= $i.' '.date('F').', '.date('Y'); ?></td>
								<td></td>
							</tr>
						<?php endfor; ?>

						</tbody>
					</table>
				</div>

			</div>

		</div>

	</div>