<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- <?php var_dump($user_login) ; ?> -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Profil
			<small>Control panel</small>
			<!-- kurang breadcrumb -->
		</h1>
		<?= $breadcrumb ?>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<!-- /.col -->
			<div class="col-md-12">

				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">About Me</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<strong><i class="fa fa-book margin-r-5"></i> Nama</strong>
						<p class="text-muted">

							<?= $user_login["firstname"] . "&nbsp" . $user_login["lastname"] ?>
						</p>
						<hr>

						<strong><i class="fa fa-user margin-r-5"></i> Username</strong>
						<p class="text-muted">
							<?= $user_login["username"] ?>
						</p>
						<hr>

						<strong><i class="fa fa-envelope margin-r-5"></i> E-Mail</strong>
						<p class="text-muted">
							<?= $user_login["email"] ?>
						</p>
						<hr>

					</div>
					<!-- /.box-body -->
				</div>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>