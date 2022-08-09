<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<div class="content-wrapper">
	<section class="content-header">
		<?php echo $breadcrumb; ?>
	</section>
	<section class="content">

		<?php if ($this->session->flashdata('flash_berhasil') ) : ?>
			<div class="row">
				<div class="col-md-12">


					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Berhasil!!</h4>
						<?= $this->session->flashdata('flash_berhasil'); ?>
					</div>
				</div>
			</div>
		<?php endif ?>


		<div class="row">
			<div class="col-xs-12">
				<!-- /.box -->

				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Upload bukti siar</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body no-padding">
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
							<div class="box-body">

								<div class="form-group">
									<label for="nama_bukti_siar" class="col-sm-2 control-label">Nama Bukti Siar</label>
									<div class="col-sm-6">
										<input type="text" name="nama_bukti_siar" class="form-control" id="nama_bukti_siar" placeholder="Masukkan nama bukti siar">
										<small class="form-text text-danger"><?= form_error('nama_bukti_siar'); ?></small>
									</div>
									
								</div>
								<div class="form-group">
									<label for="upload_bukti" class="col-sm-2 control-label">Upload Bukti Siar</label>
									<div class="col-sm-2">
										<input type="file" name="upload_bukti" class="form-control" id="upload_bukti" >
										<small class="form-text text-danger"><?= form_error('upload_bukti'); ?></small>
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
					<!-- /.box-body -->
				</div>

				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>





	</section>
</div>

