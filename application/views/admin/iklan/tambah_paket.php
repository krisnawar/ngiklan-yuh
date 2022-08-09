<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?= $pagetitle; ?>
        <?= $breadcrumb; ?>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Tambah Paket Iklan</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="" method="post">
                        <div class="box-body">

                            <?php if (validation_errors() || $message): ?>
                                <div id="infoMessage1" class="alert alert-danger"><?= $message;?></div>
                            <?php endif; ?>
                            <?php if ($berhasil): ?>
                                <div id="infoMessage2" class="alert alert-success"><?= $berhasil;?></div>
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="kategori_paket" class="col-sm-2 control-label">Kategori</label>
                                <div class="col-sm-10">
                                    <input type="text" name="kategori_paket" class="form-control" id="kategori_paket" placeholder="Masukkan Kategori Paket">
                                    <small class="form-text text-danger"><?= form_error('kategori_paket'); ?></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="jenis_paket" class="col-sm-2 control-label">Jenis Paket</label>
                                <div class="col-sm-10">
                                    <input type="text" name="jenis_paket" class="form-control" id="jenis_paket" placeholder="Masukkan Jenis Paket">
                                    <small class="form-text text-danger"><?= form_error('jenis_paket'); ?></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="frekuensi_paket" class="col-sm-2 control-label">Frekuensi Iklan</label>
                                <div class="col-xs-4">
                                    <input type="text" name="frekuensi_paket" class="form-control" id="frekuensi_paket" placeholder="Masukkan Frekuensi Paket" >
                                    <small class="form-text text-danger"><?= form_error('frekuensi_paket'); ?></small>
                                </div>
                                <div class="col-xs-1">
                                    <label for="bonus_paket" class="col-sm-2 control-label">Bonus</label>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" name="bonus_paket" class="form-control" id="bonus_paket" placeholder="Masukkan Frekuensi Bonus">
                                    <small class="form-text text-danger"><?= form_error('bonus_paket'); ?></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="durasi_paket" class="col-sm-2 control-label">Durasi Iklan</label>
                                <div class="col-xs-4">
                                    <input type="text" name="durasi_paket" class="form-control" id="durasi_paket" placeholder="Masukkan Durasi Iklan" >
                                    <small class="form-text text-danger"><?= form_error('durasi_paket'); ?></small>
                                </div>
                                <div class="col-xs-1">
                                    <label for="harga_paket" class="col-sm-2 control-label">Harga</label>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" name="harga_paket" class="form-control" id="harga_paket" placeholder="Masukkan Harga paket">
                                    <small class="form-text text-danger"><?= form_error('harga_paket'); ?></small>
                                </div>
                            </div>

                            <input type="hidden" name="status_paket" value="1">

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right" name="tambah_iklan">Tambah Paket Iklan</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
                <!-- /.box -->
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