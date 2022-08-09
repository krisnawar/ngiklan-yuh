<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<div class="content-wrapper">
	<section class="content-header">
		<h1>Detail Iklan anda</h1>
		<small>Berikut adalah detail iklan yang anda ajukan</small>
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
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Informasi Iklan</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-4 control-label">Nama Iklan</label>
							<div class="col-sm-8">
								<span class="form-control"><?= $iklan["nama_iklan"] ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">Status Iklan</label>
							<div class="col-sm-8">
								<div class="form-control">
									<?php if ($iklan["status_iklan"] == 0) :?>
										<td><span class="badge btn-success">Diajukan</span></td>
									<?php endif; ?>
									<?php if ($iklan["status_iklan"] == 1) : ?>
										<td><span class="badge btn-success">Diterima</span></td>
									<?php endif; ?>
									<?php if ($iklan["status_iklan"] == 2) : ?>
										<td><span class="badge btn-success">User Setuju</span></td>
									<?php endif; ?>
									<?php if ($iklan["status_iklan"] == 3) : ?>
										<td><span class="badge btn-success">Proses</span></td>
									<?php endif; ?>
									<?php if ($iklan["status_iklan"] == 4) : ?>
										<td><span class="badge btn-success">Tayang</span></td>
									<?php endif; ?>
									<?php if ($iklan["status_iklan"] == 5) : ?>
										<td><span class="badge btn-success">Selesai</span></td>
									<?php endif; ?>
									<?php if ($iklan["status_iklan"] == 6) : ?>
										<td><span class="badge btn-success">Batal</span></td>
									<?php endif; ?>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">Deskripsi Iklan</label>
							<div class="col-sm-8">
								<!-- <span class="form-control"><?//= $iklan["desc_iklan"] ?></span> -->
								<textarea class="form-control" rows="4" readonly><?= $iklan["desc_iklan"] ?></textarea>
							</div>
						</div>
						<!-- <?= var_dump($iklan) ?>
					-->
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">Deskripsi Iklan (File)</label>
							<div class="col-sm-8">
								<div class="form-control">
									<?php if ($iklan["desc_file_iklan"] == ""): ?>
										<p class="text-muted">File Tidak Ditemukan</p>
									<?php else: ?>
										<p class="text-success"><a href="<?= site_url('user/dashboard/download_deskripsi/'); ?><?= $iklan["desc_file_iklan"]  ?>"> Download</a></p>
									<?php endif ?>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">Nama Organisasi</label>
							<div class="col-sm-8">
								<span class="form-control"><?= $pj["nama_organisasi"] ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">Nama Penanggung Jawab</label>
							<div class="col-sm-8">
								<span class="form-control"><?= $pj["nama_pj"] ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">Alamat Penanggung Jawab</label>
							<div class="col-sm-8">
								<span class="form-control"><?= $pj["alamat_pj"] ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">No Telpon Penanggung Jawab</label>
							<div class="col-sm-8">
								<span class="form-control"><?= $pj["no_tlp"] ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">Jabatan</label>
							<div class="col-sm-8">
								<span class="form-control"><?= $pj["jabatan"] ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">Tanggal Masuk</label>
							<div class="col-sm-8">
								<span class="form-control"><?= $iklan["tanggal_masuk"] ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">Tanggal Tayang</label>
							<div class="col-sm-8">
								<?php if ($iklan["status_iklan"] > 3): ?>
									<span class="form-control"><?= $iklan["tanggal_mulai"] ?></span>
								<?php else: ?>
									<span class="form-control">-</span>
								<?php endif ?>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">Tanggal Selesai</label>
							<div class="col-sm-8">
								<?php if ($iklan["status_iklan"] > 3): ?>
									<span class="form-control"><?= $iklan["tanggal_selesai"] ?></span>
								<?php else: ?>
									<span class="form-control">-</span>
								<?php endif ?>
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">Paket</label>
							<div class="col-sm-8">
								<?php if ($jenis_paket == "paket") :?>
									<span class="form-control"><?= "( ". $paket["kategori_paket"] . " ) " . $paket["jenis_paket"] . " / " . $paket["frekuensi_paket"] . " / bonus " . $paket["bonus_paket"] . " / " . $paket["durasi_paket"] . " /Rp. " . $paket["harga_paket"] ?></span> 
								<?php else : ?>
									<?php if ($paket["id_nego"] == 0): ?>
										<span class="form-control">NEGO</span>
									<?php else: ?>
										<span class="form-control"><?= "( NEGO ) " . $paket["frekuensi_nego"] . " / bonus " . $paket["bonus_nego"] . " / " . $paket["durasi_nego"] . " /Rp. " . $paket["harga_nego"] ?></span>
									<?php endif ?>
								<?php endif; ?>
							</div>
						</div>

						<?php if ($iklan["mou"] != null) : ?>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-4 control-label">MOU</label>
								<div class="col-sm-8">
									<span class="form-control"><a href="<?= site_url('user/dashboard/download_mou/'); ?><?= $iklan["mou"]  ?>"> Download</a></span>
								</div>
							</div>

						<?php endif ?>										
					<!-- /.box-body -->
					</div>
						<div class="box-footer">
							<?php if ($iklan["status_iklan"] == 0 ): ?>
								<a href="<?= site_url('user/dashboard/batalkan_iklan/'); ?><?= $iklan["id_iklan"]  ?>" class="btn btn-danger" > Batalkan Iklan&nbsp&nbsp<i class="fa fa-times"></i></a>
							<?php elseif ($iklan["status_iklan"] == 1 ) :?>
								<a href="<?= site_url('user/dashboard/lanjutkan_iklan/'); ?><?= $iklan["id_iklan"]  ?>" class="btn btn-info pull-right" >  Lanjutkan Iklan&nbsp&nbsp<i class="fa fa-check"></i></a>
							<?php endif ?>
						</div>
					</div>

					<?php 
					
					$time_start = strtotime($iklan["tanggal_mulai"]);
					$time_end = strtotime($iklan["tanggal_selesai"]);
					$numTahun = (date("Y",$time_end)- date("Y",$time_start))*12;
					$numBulan = date("m",$time_end)- date("m",$time_start);
					$numHari = date("d",$time_end)- date("d",$time_start);
					$jumlah_bulan = $numTahun+$numBulan;
					if ($numHari<0) {
						$jumlah_bulan-=1;
						$numHari*= -1;
					}

								//echo "bulan = ".$jumlah_bulan;
                                //echo "hari = ".$numHari;
					if($iklan['id_paket'] != 0)
					{
						$paket["harga_paket"];
						$numBayar = ($paket["harga_paket"]*$jumlah_bulan)+ (($paket["harga_paket"]/30)*$numHari);
					}
					else
					{
						$paket["harga_nego"];
						$numBayar = ($paket["harga_nego"]*$jumlah_bulan)+ (($paket["harga_nego"]/30)*$numHari);
					}
								//echo "numbayar = ".$numBayar;
					?>

					<?php if ($iklan["status_iklan"] == 3 | $iklan["status_iklan"] == 4): ?>
						<div class="row">
							<div class="col-sm-12">
								<div class="box box-warning">												
									<div class="box-header with-border">
										<h3 class="box-title">Upload Pembayaran</h3>
										<div class="box-tools pull-right">
											<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
										</div>
									</div>
												<!-- /.box-header -->
												<!-- form start -->
									<form role="form" action="" method="post" enctype="multipart/form-data">
										<div class="box-body">

											<input type="hidden" name="id_iklan" id="id_iklan" value="<?= $iklan["id_iklan"] ?>">
											<input type="hidden" name="tanggal_bayar" id="tanggal_bayar" value="<?= date('Y-m-d'); ?>">


											<div class="form-group">
												<label for="Jumlah_Bayar" > Jumlah Bayar</label>
												<input type="text" name="jumlah_bayar" class="form-control" id="jumlah_bayar" placeholder="Masukkan Jumlah Bayar">
												<small class="form-text text-danger"><?= form_error('jumlah_bayar'); ?></small>
												<p class="help-block">Perhatikan sisa yang harus anda bayarkan. Pembayaran tidak dapat ditarik atau dikembalikan lagi.</p>
											</div>


											<div class="form-group">
												<label for="bukti_pembayaran"> Lampirkan Bukti Pembayaran</label>
												<input type="file" name="bukti_pembayaran" id="bukti_pembayaran">

												<p class="help-block">Hanya menerima file berupa gambar atau dokumen pdf.</p>
											</div>
										</div>
													<!-- /.box-body -->

										<div class="box-footer">
											<button type="submit" class="btn btn-warning pull-right" name="upload_pembayaran">Upload Pembayaran&nbsp&nbsp<i class="fa fa-upload"></i></button>
										</div>
									</form>
								</div>
							</div>
						</div>
					<?php endif ?>

					<div class="row">
						<div class="col-xs-12">
										<!-- /.box -->

							<div class="box box-success">
								<div class="box-header with-border">
									<h3 class="box-title">Pembayaran</h3>
									<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									</div>
								</div>
											<!-- /.box-header -->
								<div class="box-body no-padding">
									<table class="table table-striped">
										<tbody>
											<tr>
												<th >No</th>
												<th>Tanggal Bayar</th>
												<th >Verifikasi</th>
												<th >Bukti Pembayaran</th>
												<th>Jumlah Bayar</th>
											</tr>
											<tr>
												<?php $no = 1; ?>
												<?php $jumlah_bayar = 0; ?>
												<?php foreach ($bayars as $bayar): ?>
													<td><?= $no; ?></td>
													<td><?= $bayar["tanggal_bayar"] ?></td>
													<?php if ($bayar["verifikasi"] == 0): ?>
														<td>Belum diverifikasi</td>
													<?php else: ?>
														<td>Sudah Diverifikasi</td>
													<?php endif ?>
													<td><a href="<?= site_url('user/dashboard/download_bukti_bayar/'); ?><?= $bayar["bukti_bayar"]  ?>"> Download</a></td>
													<?php $angka_format = number_format($bayar["jumlah_bayar"]); ?>
													<td><?= $angka_format ?></td>
													<?php $jumlah_bayar += $bayar["jumlah_bayar"] ;?>
											</tr>
													<?php $no++; ?>
												<?php endforeach ?>
										</tbody>
										<tr>
											<th></th>
											<th></th>
											<th></th>
											<th>Jumlah Pembayaran</th>
											<?php $angka_format = number_format($jumlah_bayar);?>
											<th><?= $angka_format ?></th>
										</tr>
										<tr>
											<th></th>
											<th></th>
											<th></th>
											<th>Total Tagihan</th>
											<?php $angka_format = number_format($numBayar); ?>
											<th><?=  $angka_format?></th>
										</tr>
										<tr>
											<th></th>
											<th></th>
											<th></th>
											<th>Sisa yang Harus Dibayarkan</th>
											<?php $sisaBayar = $numBayar - $jumlah_bayar ;?>
											<?php if ($sisaBayar <0) : 
												$sisaBayar *= -1;
												$angka_format = number_format($sisaBayar);
											?>
											<th>Bayaran Berlebih sejumlah Rp.<?=$angka_format ?></th>
											<?php else :  ?>
												<?php $angka_format = number_format($sisaBayar); ?>
											<th><?= $angka_format ?></th>
											<?php endif ?>
										</tr>
									</table>
								</div>
												<!-- /.box-body -->
							</div>
											<!-- /.box -->
						</div>
										<!-- /.col -->
					</div>

					<div class="row">
						<div class="col-xs-12">
							<!-- /.box -->
							<div class="box box-danger">
								<div class="box-header with-border">
									<h3 class="box-title">Bukti Siar</h3>
									<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									</div>
								</div>
								<!-- /.box-header -->
								<div class="box-body no-padding">
									<table class="table table-striped">
										<tbody>
											<tr>
												<th >No</th>
												<th>Nama Bukti Siar</th>
												<th >Bukti Siar</th>
											</tr>
											<tr>
												<?php $no = 1; ?>
												<?php foreach ($siars as $siar): ?>
													<td>1.</td>
													<td><?= $siar["nama_bukti_siar"] ?></td>
													<td><a href="<?= site_url('user/dashboard/download_bukti_siar/'); ?><?= $siar["bukti_siar"]  ?>"> Download</a></td>
													<?php $no++; ?>
												<?php endforeach ?>
											</tr>
										</tbody>
									</table>
								</div>
								<!-- /.box-body -->
							</div>
							<!-- /.box -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</div>
			</div>
		</div>
	</section>
</div>

