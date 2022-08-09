<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Ajukan Iklan
		</h1>
		<?= $breadcrumb ?>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<!-- /.col -->
			<div class="col-md-12">
				<!-- Horizontal Form -->


				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Form Pengajuan Iklan</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" action="" method="post" enctype="multipart/form-data">
						<div class="box-body">
							<input type="hidden" name="id_user" id="id_user" value="<?= $user_login["id"] ?>">
							<input type="hidden" name="tanggal_masuk" id="tanggal_masuk" value="<?= date('Y-m-d'); ?>">
							<div class="form-group">
								<label for="nama_iklan" >Nama Iklan</label>
								<input type="text" name="nama_iklan" class="form-control" id="nama_iklan" placeholder="Masukkan Nama Iklan">
								<small class="form-text text-danger"><?= form_error('nama_iklan'); ?></small>
							</div>
							<div class="form-group">
								<label for="desc_iklan" >Deskripsi Iklan</label>
								<textarea type="text" name="desc_iklan" class="form-control" id="desc_iklan" rows="4" placeholder="Tuliskan Deskripsi Iklan"></textarea>
								<p class="help-block">deskripsikan iklan dengan jelas dan singkat.</p>
								<small class="form-text text-danger"><?= form_error('desc_iklan'); ?></small>
							</div>
							<div class="form-group">
								<label for="desc_file_iklan" >Upload File Deskripsi Iklan</label>
								<input type="file" name="desc_file_iklan" id="desc_file_iklan" >
								<p class="help-block">Jenis file yang didukung : jpg, png, jpeg, doc, docx, pdf, txt.</p>
								<small class="form-text text-danger"><?= form_error('desc_file_iklan'); ?></small>
							</div>
							<div class="form-group">
								<label for="nama_organisasi" >Nama Organisasi</label>
								<input type="text" name="nama_organisasi" class="form-control" id="nama_organisasi" placeholder="Tuliskan Nama Organisasi Anda">
								<small class="form-text text-danger"><?= form_error('nama_organisasi'); ?></small>
							</div>
							<div class="form-group">
								<label for="nama_pj" >Nama Penanggung jawab</label>
								<input type="text" name="nama_pj" class="form-control" id="nama_pj" placeholder="Tuliskan Nama Penanggung Jawab Iklan">
								<small class="form-text text-danger"><?= form_error('nama_pj'); ?></small>
							</div>
							<div class="form-group">
								<label for="jabatan" >jabatan Penanggung Jawab</label>
								<input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Tuliskan Jabatan Penanggung Jawab Iklan">
								<small class="form-text text-danger"><?= form_error('jabatan'); ?></small>
							</div>
							<div class="form-group">
								<label for="alamat_pj" >Alamat Penanggung Jawab</label>
								<input type="text" name="alamat_pj" class="form-control" id="alamat_pj" placeholder="Tuliskan Alamat Penanggung Jawab Iklan">
								<small class="form-text text-danger"><?= form_error('alamat_pj'); ?></small>
							</div>
							<div class="form-group">
								<label for="no_tlp" >Nomor Telpon</label>
								<input type="text" name="no_tlp" class="form-control" id="no_tlp" placeholder="Tuliskan Nomor Telpon Penanggung Jawab Iklan">
								<small class="form-text text-danger"><?= form_error('no_tlp'); ?></small>
							</div>
							<div class="form-group">
								<label for="pilih_paket" >Pilih Paket</label>
								<select class="form-control" id="pilih_paket" name="pilih_paket">
									<?php foreach ($iklans as $iklan) : ?>

										<?php if ($iklan["status_paket"] == 1)  : ?>
											<option value="<?= $iklan["id_paket"] ?>"><?= "( ". $iklan["kategori_paket"] . " ) " . $iklan["jenis_paket"] . " / " . $iklan["frekuensi_paket"] . " / bonus " . $iklan["bonus_paket"] . " / " . $iklan["durasi_paket"] . " /Rp. " . $iklan["harga_paket"] ?> </option>
											<?php else : ?>
											<?php endif; ?>

										<?php endforeach; ?>

										
										<option value="00">Nego</option>
									</select>
								</div>
							</div>
							<!-- /.box-body -->
							<div class="box-footer">
								<button type="submit" class="btn btn-info pull-right" name="update" onclick="return confirm('Anda Setuju dengan Semua Kebijakan Yang Berlaku ?')">Ajukan Iklan&nbsp&nbsp<i class="fa fa-paper-plane"></i>     </button>
							</div>
						</form>
					</div>
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>