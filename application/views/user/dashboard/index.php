<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="content-wrapper">
    <section class="content-header">
        <?php echo $pagetitle; ?>
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
        <?php if ($this->session->flashdata('flash_gagal') ) : ?>
            <div class="row">
                <div class="col-md-12">

                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Gagal!!</h4>
                        <?= $this->session->flashdata('flash_gagal'); ?>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <div class="row">

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?= $jumlah_iklan; ?></h3>
                        <p>Jumlah Iklan</p>
                    </div>
                    <div class="icon" >
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?= $iklan_diajukan; ?></h3>

                        <p>Iklan Diajukan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= $iklan_tayang; ?></h3>

                        <p>Iklan Tayang</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?= $iklan_menunggu_persetujuan; ?></h3>

                        <p>Iklan Menunggu Persetujuan Anda</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="row">                        
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Riwayat Iklan</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Iklan</th>
                                        <th>Tanggal Diajukan</th>
                                        <th>Status</th>
                                    </tr>
                                    <?php $no = 1; ?>
                                    <?php foreach ($iklans as $iklan): ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $iklan["nama_iklan"] ?></td>
                                            <td><?= $iklan["tanggal_masuk"] ?></td>
                                            <?php if ($iklan["status_iklan"] == 0) :?>
                                                <td><span class="badge btn-success">Diajukan</span></td>
                                                <?php elseif ($iklan["status_iklan"] == 1) : ?>
                                                    <td><span class="badge btn-success">Diterima</span></td>
                                                    <?php elseif ($iklan["status_iklan"] == 2) : ?>
                                                        <td><span class="badge btn-success">User Setuju</span></td>
                                                        <?php elseif ($iklan["status_iklan"] == 3) : ?>
                                                            <td><span class="badge btn-success">Proses</span></td>
                                                            <?php elseif ($iklan["status_iklan"] == 4) : ?>
                                                                <td><span class="badge btn-success">Tayang</span></td>
                                                                <?php elseif ($iklan["status_iklan"] == 5) : ?>
                                                                    <td><span class="badge btn-success">Selesai</span></td>
                                                                    <?php elseif ($iklan["status_iklan"] == 6) : ?>
                                                                        <td><span class="badge btn-success">Batal</span></td>
                                                                    <?php endif; ?>
                                                                </tr>
                                                                <?php $no++; ?>
                                                            <?php endforeach ?>

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>

