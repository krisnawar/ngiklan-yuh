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
						<h3 class="box-title">Upload Pembayaran</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body no-padding">
						<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
							<div class="box-body">

								<input type="hidden" name="id_iklan" id="id_iklan" value="<?= $iklan["id_iklan"] ?>">
								<input type="hidden" name="tanggal_bayar" id="tanggal_bayar" value="<?= date('Y-m-d'); ?>">

								<div class="form-group">
									<label for="Jumlah_Bayar" class="col-sm-2 control-label">Periode iklan</label>
									<div class="col-sm-4">
										<input type="text" name="periode_iklan_bulan" class="form-control" id="periode_iklan_bulan" placeholder="Masukkan Jumlah Bayar">
										<small class="form-text text-danger"><?= form_error('periode_iklan_bulan'); ?></small>
									</div>
									<div class="col-sm-4">
										<input type="text" name="periode_iklan_hari" class="form-control" id="periode_iklan_hari" placeholder="Masukkan Jumlah Bayar">
										<small class="form-text text-danger"><?= form_error('periode_iklan_hari'); ?></small>
									</div>
								</div>


								<?php if ($iklan["id_paket"] == 0): ?>

								<div class="form-group">
									<label for="Jumlah_Bayar" class="col-sm-2 control-label">Detail Nego</label>
									<div class="col-sm-2">
										<input type="text" name="frekuensi_nego" class="form-control" id="frekuensi_nego" placeholder="frekuensi_nego">
										<small class="form-text text-danger"><?= form_error('frekuensi_nego'); ?></small>
									</div>
									<div class="col-sm-2">
										<input type="text" name="bonus_nego" class="form-control" id="bonus_nego" placeholder="bonus_nego">
										<small class="form-text text-danger"><?= form_error('bonus_nego'); ?></small>
									</div>
									<div class="col-sm-2">
										<input type="text" name="durasi_nego" class="form-control" id="durasi_nego" placeholder="Masukkan Jumlah Bayar">
										<small class="form-text text-danger"><?= form_error('durasi_nego'); ?></small>
									</div>
									<div class="col-sm-2">
										<input type="text" name="harga_nego" class="form-control" id="harga_nego" placeholder="Masukkan Jumlah Bayar">
										<small class="form-text text-danger"><?= form_error('harga_nego'); ?></small>
									</div>

								</div>

								<?php endif ?>

								<div class="form-group">
									<label for="upload_mou" class="col-sm-2 control-label">Upload MOU</label>
									<div class="col-sm-10">
										<input type="text" name="harga_nego" class="form-control" id="harga_nego" placeholder="Masukkan Jumlah Bayar">
										<small class="form-text text-danger"><?= form_error('harga_nego'); ?></small>
									</div>
									<div class="col-sm-2">
										<input type="file" name="upload_mou" class="form-control" id="upload_mou" placeholder="Tuliskan Deskripsi Iklan">
										<small class="form-text text-danger"><?= form_error('upload_mou'); ?></small>
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

