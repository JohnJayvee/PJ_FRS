
<div class="side-bar" id="side-bar">
	<img src="<?= base_url(); ?>assets/img/spuplogo.png" class="brand-logo">
	<ul class="nav flex-column">
		<li class="nav-item">
			<a href="<?= base_url(); ?>admin/dashboard" class="nav-link">
				Dashboard
			</a>
		</li>
		<?php if ($admin->role === 'Administrator') : ?>
			<li class="nav-item">
				<a href="<?= base_url(); ?>admin/admin" class="nav-link">
					Admin
				</a>
			</li>
			<li class="nav-item">
				<a href="<?= base_url(); ?>admin/users" class="nav-link">
					Users
				</a>
			</li>
		<?php endif; ?>
		<li class="nav-item">
			<a href="<?= base_url(); ?>admin/facilities" class="nav-link">
				Facilities
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= base_url(); ?>admin/reservations" class="nav-link">
				Reservations
			</a>
		</li>
		<li class="nav-item">
			<a href="<?= base_url(); ?>admin/calendar" class="nav-link">
				Schedules
			</a>
		</li>
		<?php if ($admin->role === 'Administrator') : ?>
			<li class="nav-item">
				<a href="<?= base_url(); ?>admin/logs" class="nav-link">
					Logs
				</a>
			</li>
		<?php endif; ?>

		<?php if ($admin->role === 'Administrator') : ?>
			<li class="nav-item">
				<a href="<?= base_url(); ?>admin/logs" class="nav-link">
					Records
				</a>
			</li>
		<?php endif; ?>
	</ul>
</div>