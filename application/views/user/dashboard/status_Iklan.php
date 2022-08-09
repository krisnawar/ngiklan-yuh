<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<div class="content-wrapper" );
background-repeat: repeat;">
<section class="content-header">
	<h2>Status Iklan</h2>
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
<!-- 					<?php var_dump($user_login) ; ?>
<?php var_dump($iklans); ?> -->
<!-- /.box-header -->
<div class="box-body">
	<table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Iklan</th>
				<th>Status </th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			<?php foreach ($iklans as $iklan) : ?>
				<tr>
					<td><?= $no ?></td>
					<td><?= $iklan["nama_iklan"]; ?></td>
					<?php if ($iklan["status_iklan"] == 0) :?>
						<td><span class="badge btn-warning">Diajukan</span></td>
					<?php endif; ?>
					<?php if ($iklan["status_iklan"] == 1) : ?>
						<td><span class="badge btn-secondary">Diterima</span></td>
					<?php endif; ?>
					<?php if ($iklan["status_iklan"] == 2) : ?>
						<td><span class="badge btn-dark">User Setuju</span></td>
					<?php endif; ?>
					<?php if ($iklan["status_iklan"] == 3) : ?>
						<td><span class="badge btn-info">Proses</span></td>
					<?php endif; ?>
					<?php if ($iklan["status_iklan"] == 4) : ?>
						<td><span class="badge btn-primary">Tayang</span></td>
					<?php endif; ?>
					<?php if ($iklan["status_iklan"] == 5) : ?>
						<td><span class="badge btn-success">Selesai</span></td>
					<?php endif; ?>
					<?php if ($iklan["status_iklan"] == 6) : ?>
						<td><span class="badge btn-danger">Batal</span></td>
					<?php endif; ?>

					<td>
						<a href="<?= site_url('user/dashboard/lihat_status_iklan/'); ?><?= $iklan["id_iklan"]  ?>" class="btn btn-primary btn-sm">Buka</a>
<!-- 						<a href="<?= site_url('user/dashboard/mou/'); ?><?= $iklan["id_iklan"]  ?>">upload mou</a>
						<a href="<?= site_url('user/dashboard/bukti_siar/'); ?><?= $iklan["id_iklan"]  ?>">upload bukti siar</a> -->
					</td>
				</tr>
				<?php $no++; ?>
			<?php endforeach; ?>
		</tbody>
		<tfoot>
			<tr>
				<th>No</th>
				<th>Nama Iklan</th>
				<th>Status </th>
				<th>Aksi</th>
			</tr>
		</tfoot>
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

