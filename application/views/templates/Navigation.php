
			<nav class="navbar justify-content-md-end">
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown"><?= $admin->username; ?></a>
						<div class="dropdown-menu dropdown-menu-right position-absolute">
							<a href="<?= base_url(); ?>admin/logout" class="dropdown-item">Logout</a>
						</div>
					</li>
				</ul>
			</nav>