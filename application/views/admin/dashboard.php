
	<div id="wrapper">
		
		<?php $this->load->view('templates/Sidebar'); ?>

		<div id="main">

			<?php $this->load->view('templates/Navigation'); ?>
			
			<div class="content">

				<div class="jumbotron bg-success text-light">
					<h1 class="display-4">Welcome to Dashboard!</h1>
					<p class="mb-0">This is where it all began. Hi there <?= $admin->username; ?></p>
				</div>
				
			<!-- 	<div class="content-header">
					<h1 class="mb-0 display-4">Dashboard</h1>
				</div> -->

				

			</div>

		</div>

	</div>