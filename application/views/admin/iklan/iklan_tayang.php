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
                        <h3 class="box-title">Iklan yang sedang tayang</h3>
                    </div>
                    <div class="box-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:2%">No</th>
                                    <th style="width:25%">Nama Iklan</th>
                                    <th style="width:17%">Pengaju</th>
                                    <th style="width:16%">Penanggung Jawab</th>
                                    <th style="width:10%">Tanggal Masuk</th>
                                    <th style="width:10%">Status Tayang</th>
                                    <th style="width:10%">Pengkodean</th>
                                    <th style="width:10%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($iklan_tayang->result() as $result): ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $result->nama_iklan; ?></td>
                                    <td><?= $result->username; ?></td>
                                    <td><?= $result->nama_pj?></td>
                                    <td><?= date('j F Y', strtotime($result->tanggal_masuk))?></td>
                                    <td>
                                        <?php
                                        if (strtotime(date('Y-m-d')) < strtotime($result->tanggal_mulai))
                                        {
                                            echo '<span class="badge btn-warning">Belum Tayang</span>';
                                        }
                                        elseif (strtotime(date('Y-m-d')) > strtotime($result->tanggal_selesai))
                                        {
                                            echo '<span class="badge btn-danger">Sudah Tayang</span>';
                                        }
                                        elseif (strtotime(date('Y-m-d')) > strtotime($result->tanggal_mulai) && strtotime(date('Y-m-d')) < strtotime($result->tanggal_selesai))
                                        
                                        {
                                            echo '<span class="badge btn-success">Sedang Tayang</span>';
                                        }                                        
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($result->kode_iklan != NULL)
                                        {
                                            echo $result->kode_iklan;
                                        }
                                        else
                                        {
                                            echo '<span class="badge btn-danger">Belum Dikodekan</span>';
                                        }
                                        ?>
                                    </td>
                                    <td align="center"><a class="btn btn-primary btn-sm" href="<?= base_url('admin/iklan/show_tayang/'. $result->id_iklan)?>" role="button">Detail Iklan</a></td>
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