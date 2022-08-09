<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Ubah Profil
			<small>Control panel</small>
		</h1>		
		<?= $breadcrumb ?>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<!-- /.col -->
			<div class="col-md-12">
				<!-- Horizontal Form -->
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Form Ubah Data Profil</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form class="form-horizontal" action="" method="post">
						<div class="box-body">
							
							<input type="hidden" name="id" value="<?= $user_login["id"] ?>">
							
							<div class="form-group">
								<label for="namadepan" class="col-sm-2 control-label">Nama Depan</label>
								<div class="col-sm-10">
									<input type="text" name="namadepan" class="form-control" id="namadepan" placeholder="Masukkan Nama" value="<?= $user_login["firstname"] ?>">
									<small class="form-text text-danger"><?= form_error('namadepan'); ?></small>
								</div>
							</div>

							<div class="form-group">
								<label for="namabelakang" class="col-sm-2 control-label">Nama belakang</label>
								<div class="col-sm-10">
									<input type="text" name="namabelakang" class="form-control" id="namabelakang" placeholder="Masukkan Nama" value="<?= $user_login["lastname"] ?>">
									<small class="form-text text-danger"><?= form_error('namabelakang'); ?></small>
								</div>
							</div>

							<div class="form-group">
								<label for="username" class="col-sm-2 control-label">Username</label>
								<div class="col-sm-10">
									<input type="text" name="username" class="form-control" id="username" placeholder="Masukkan Username" value="<?= $user_login["username"] ?>">
									<small class="form-text text-danger"><?= form_error('username'); ?></small>
								</div>
							</div>

							<div class="form-group">
								<label for="email" class="col-sm-2 control-label">No Telpon</label>
								<div class="col-sm-10">
									<input type="text" name="notelpon" class="form-control" id="notelpon" placeholder="No telpon" value="<?= $user_login["phone"] ?>">
									<small class="form-text text-danger"><?= form_error('phone'); ?></small>
								</div>
							</div>

							<div class="form-group">
								<label for="email" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10">
									<input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?= $user_login["email"] ?>">
									<small class="form-text text-danger"><?= form_error('email'); ?></small>
								</div>
							</div>

						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<button type="submit" class="btn btn-info pull-right" name="update">Update Profil</button>
						</div>
						<!-- /.box-footer -->
					</form>
				</div>
				<!-- /.box -->

				<!-- Horizontal Form -->
<!-- 				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Form Ubah Password</h3>
					</div>
					<form class="form-horizontal" action="" method="post">
						<div class="box-body">
							<div class="form-group">
								<label for="password" class="col-sm-2 control-label">Password</label>
								<div class="col-sm-10">
									<input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password Lama">
									<small class="form-text text-danger"><?= form_error('Password'); ?></small>
								</div>
							</div>

							<div class="form-group">
								<label for="passwordbaru" class="col-sm-2 control-label">Password Baru</label>
								<div class="col-sm-10">
									<input type="password" name="passwordbaru" class="form-control" id="passwordbaru" placeholder="Masukkan Password baru">
									<small class="form-text text-danger"><?= form_error('passwordbaru'); ?></small>
								</div>
							</div>

							<div class="form-group">
								<label for="passwordbaru2" class="col-sm-2 control-label">Tulis Ulang Password Baru</label>
								<div class="col-sm-10">
									<input type="password" name="passwordbaru2" class="form-control" id="passwordbaru2" placeholder="Tulis Ulang Password baru">
									<small class="form-text text-danger"><?= form_error('passwordbaru2'); ?></small>
								</div>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-info pull-right" name="update">Ganti Password</button>
						</div> -->
						<!-- /.box-footer -->
					</form>
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>