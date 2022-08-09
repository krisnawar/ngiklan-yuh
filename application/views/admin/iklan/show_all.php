<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="content-wrapper">
    <section class="content-header">
        <?= $pagetitle; ?>
        <?= $breadcrumb; ?>
    </section>

    <section class="content">
        <div class="row" id="pwd-container">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Semua Iklan</h3>
                    </div>
                    <div class="box-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:10%">No</th>
                                    <th style="width:25%">Nama Iklan</th>
                                    <th style="width:25%">Pengaju</th>
                                    <th style="width:25%">Penanggung Jawab</th>
                                    <th style="width:25%">Status</th>
                                    <th style="width:20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($iklan_all->result() as $result): ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $result->nama_iklan; ?></td>
                                    <td><?= $result->username; ?></td>
                                    <td><?= $result->nama_pj?></td>
                                    <td>
                                        <?php
                                        if ($result->status_iklan == 0)
                                        {
                                            echo '<span class="badge btn-warning">Menunggu Ditinjau</span>';
                                        }
                                        elseif ($result->status_iklan == 1)
                                        {
                                            echo '<span class="badge btn-secondary">Disetujui</span>';
                                        }
                                        elseif ($result->status_iklan == 2)
                                        {
                                            echo '<span class="badge btn-dark">Dikonfirmasi User</span>';
                                        }
                                        elseif ($result->status_iklan == 3)
                                        {
                                            echo '<span class="badge btn-info">Menunggu Pembayaran</span>';
                                        }
                                        elseif ($result->status_iklan == 4)
                                        {
                                            echo '<span class="badge btn-primary">Tayang</span>';
                                        }
                                        elseif ($result->status_iklan == 5)
                                        {
                                            echo '<span class="badge btn-success">Selesai</span>';
                                        }
                                        elseif ($result->status_iklan == 6)
                                        {
                                            echo '<span class="badge btn-danger">Batal</span>';
                                        }
                                        ?>
                                    </td>
                                    <td align="center"><a class="btn btn-primary btn-sm" href="<?= base_url('admin/iklan/show_iklan/'. $result->id_iklan)?>" role="button">Detail Iklan</a></td>
                                    <?php $i++ ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>