<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<div class="content-wrapper">
	<section class="content-header">
		<h2>Informasi Paket</h2>
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
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Kategori</th>
									<th>Jenis </th>
									<th>Frekuensi</th>
									<th>Bonus</th>
									<th>Durasi</th>
									<th>Harga</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach ($pakets as $paket) : ?>


									<?php if ($paket["status_paket"] == 1)  : ?>

										<tr>
											<td><?= $no ?></td>
											<td><?= $paket["kategori_paket"] ?></td>
											<td><?= $paket["jenis_paket"] ?></td>
											<td><?= $paket["frekuensi_paket"] ?></td>
											<td><?= $paket["bonus_paket"] ?></td>
											<td><?= $paket["durasi_paket"] ?></td>
											<td><?= $paket["harga_paket"] ?></td>
										</tr>
										<?php $no++; ?>
										<?php else : ?>
										<?php endif; ?>
									<?php endforeach; ?>
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
		</section>
	</div>

