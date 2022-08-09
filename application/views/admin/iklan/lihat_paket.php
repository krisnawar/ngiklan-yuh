<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<div class="content-wrapper">
	<section class="content-header">
		<?= $pagetitle; ?>
        <?= $breadcrumb; ?>
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
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach ($iklans as $iklan) : ?>
									<tr>
										<td><?= $no ?></td>
										<td><?= $iklan["kategori_paket"] ?></td>
										<td><?= $iklan["jenis_paket"] ?></td>
										<td><?= $iklan["frekuensi_paket"] ?></td>
										<td><?= $iklan["bonus_paket"] ?></td>
										<td><?= $iklan["durasi_paket"] ?></td>
										<td><?= $iklan["harga_paket"] ?></td>
										<td> 
											<a href="<?= base_url('admin/iklan/ubah_Paket_Iklan/'.$iklan["id_paket"]); ?>"  class="btn btn-info"><i class="fa fa-edit"></i> Ubah</a> &nbsp;
											<a href="<?= base_url('admin/iklan/hapus_Paket_Iklan/'.$iklan["id_paket"]); ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus <?= $iklan['kategori_paket'] . ' ' . $iklan['jenis_paket'] ?>?')"><i class="fa fa-trash" ></i> Hapus</a>
										</td>
									</tr>
									<?php $no++; ?>

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

