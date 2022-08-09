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
                        <h3 class="box-title">Detail Iklan : <?= $detail_iklan->row()->nama_iklan; ?></h3>
                    </div>
                    <div class="box-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Id Iklan&nbsp:</label>
                                <div class="col-sm-10"">
                                    <p style="margin: 7px;"><?= $detail_iklan->row()->id_iklan; ?></p>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Iklan&nbsp:</label>
                                <div class="col-sm-10"">
                                    <p style="margin: 7px;"><?= $detail_iklan->row()->nama_iklan; ?></p>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Deskripsi Iklan&nbsp:</label>
                                <div class="col-sm-10"">
                                    <p style="margin: 7px;"><?= $detail_iklan->row()->desc_iklan; ?></p>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Lampiran Deskripsi&nbsp:</label>
                                <div class="col-sm-10"">
                                    <?php if ($detail_iklan->row()->desc_file_iklan != NULL): ?>
                                        <a style="margin: 7px;" class="btn btn-info" href="<?= base_url('admin/iklan/download/desc_iklan/') . $detail_iklan->row()->desc_file_iklan ?>"><i class="fa fa-download"></i>&nbspDownload</a>
                                    <?php endif; ?>  
                                </div>
                            </div>
                            <hr>                            

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pilihan Paket&nbsp:</label>
                                <div class="col-sm-10"">
                                    <?php if ($detail_iklan->row()->id_paket != 0): ?>
                                        <p style="margin: 7px;"><?= $detail_iklan->row()->kategori_paket .' - '. $detail_iklan->row()->jenis_paket; ?></p>
                                    <?php else: ?>
                                        <p style="margin: 7px;">NEGO (Masukkan Hasil Nego)</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kode Iklan&nbsp:</label>
                                <div class="col-sm-10"">
                                    <p style="margin: 7px;"><?= $detail_iklan->row()->kode_iklan; ?></p>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal Masuk&nbsp:</label>
                                <div class="col-sm-10"">
                                    <p style="margin: 7px;"><?= date('j F Y', strtotime($detail_iklan->row()->tanggal_masuk)); ?></p>
                                </div>
                            </div>
                            <hr>

                            <?php if ($detail_iklan->row()->status_iklan == 3): ?>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Periode Iklan&nbsp:</label>
                                    <div class="col-sm-10">
                                        <p style="margin: 7px"><?= date('j F Y', strtotime($detail_iklan->row()->tanggal_mulai)) . ' s/d ' . date('j F Y', strtotime($detail_iklan->row()->tanggal_selesai)); ?></p>
                                    </div>
                                </div>
                                <hr>
                            <?php endif; ?>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Penanggung Jawab&nbsp:</label>
                                <div class="col-sm-10"">
                                    <p style="margin: 7px;"><?= $detail_iklan->row()->nama_pj; ?></p>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jabatan Penanggung Jawab&nbsp:</label>
                                <div class="col-sm-10"">
                                    <p style="margin: 7px;"><?= $detail_iklan->row()->jabatan .' '. $detail_iklan->row()->nama_organisasi; ?></p>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Alamat Penanggung Jawab&nbsp:</label>
                                <div class="col-sm-10"">
                                    <p style="margin: 7px;"><?= $detail_iklan->row()->alamat_pj; ?></p>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">No Telp Penanggung Jawab&nbsp:</label>
                                <div class="col-sm-10"">
                                    <p style="margin: 7px;"><?= $detail_iklan->row()->no_tlp; ?></p>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Akun Pengaju&nbsp:</label>
                                <div class="col-sm-10"">
                                    <p style="margin: 7px;"><?= $detail_iklan->row()->username; ?></p>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">No Telp Pengaju&nbsp:</label>
                                <div class="col-sm-10"">
                                    <p style="margin: 7px;"><?= $detail_iklan->row()->phone; ?></p>
                                </div>
                            </div>

                            <div class="box-footer">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($detail_iklan->row()->mou == NULL): ?>
        <div class="row" id="pwd-container">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Iklan</h3>
                    </div>
                    <div class="box-body">
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="Jumlah_Bayar" class="col-sm-2 control-label">Periode iklan</label>
                                <div class="col-sm-4">
                                    <input type="text" name="periode_iklan_bulan" class="form-control" id="periode_iklan_bulan" placeholder="Bulan">
                                    <small class="form-text text-danger"><?= form_error('periode_iklan_bulan'); ?></small>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="periode_iklan_hari" class="form-control" id="periode_iklan_hari" placeholder="Hari">
                                    <small class="form-text text-danger"><?= form_error('periode_iklan_hari'); ?></small>
                                </div>
                                <br>
                            </div>
                            <div class="form-group">
                                <label for="Jumlah_Bayar" class="col-sm-2 control-label">Tanggal Mulai Tayang</label>
                                <div class="col-sm-4">
                                    <input type="date" name="tanggal_mulai" class="form-control" id="tanggal_mulai">
                                    <small class="form-text text-danger"><?= form_error('tanggal_mulai'); ?></small>
                                </div>
                            </div>


                            <?php if ($detail_iklan->row()->id_paket == 0): ?>

                            <div class="form-group">
                                <label for="Jumlah_Bayar" class="col-sm-2 control-label">Detail Nego</label>
                                <div class="col-sm-2">
                                    <input type="text" name="frekuensi_nego" class="form-control" id="frekuensi_nego" placeholder="Frekuensi Nego">
                                    <small class="form-text text-danger"><?= form_error('frekuensi_nego'); ?></small>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="bonus_nego" class="form-control" id="bonus_nego" placeholder="Bonus Nego">
                                    <small class="form-text text-danger"><?= form_error('bonus_nego'); ?></small>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="durasi_nego" class="form-control" id="durasi_nego" placeholder="Durasi Iklan (detik)">
                                    <small class="form-text text-danger"><?= form_error('durasi_nego'); ?></small>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="harga_nego" class="form-control" id="harga_nego" placeholder="Harga">
                                    <small class="form-text text-danger"><?= form_error('harga_nego'); ?></small>
                                </div>

                            </div>

                            <?php endif; ?>                            

                            <div class="form-group">
                                <label for="upload_mou" class="col-sm-2 control-label">Upload MOU</label>
                                <div class="col-sm-4">
                                    <input type="file" name="upload_mou" id="upload_mou" placeholder="Upload MOU">
                                    <small class="form-text text-danger"><?= form_error('upload_mou'); ?></small>
                                </div>
                            </div>
                            <div class="box-footer">
								<button type="submit" class="btn btn-info pull-right" name="update">Update Iklan</button>
							</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($detail_iklan->row()->mou != NULL && $detail_iklan->row()->kode_iklan == NULL && $detail_iklan->row()->status_iklan == 4): ?>
        <div class="row" id="pwd-container">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Iklan</h3>
                    </div>
                    <div class="box-body">
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="Kode_iklan" class="col-sm-2 control-label">Kode Iklan</label>
                                <div class="col-sm-2">
                                    <input type="text" name="kode_iklan" class="form-control" id="kode_iklan" placeholder="Masukkan Kode Iklan">
                                    <small class="form-text text-danger"><?= form_error('frekuensi_nego'); ?></small>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right" name="update_kode">Update Kode</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($detail_iklan->row()->mou != NULL && $detail_iklan->row()->status_iklan == 3 && $cek_bayar > 0): ?>
        <?php					
        $time_start = strtotime($detail_iklan->row()->tanggal_mulai);
        $time_end = strtotime($detail_iklan->row()->tanggal_selesai);
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
        if($detail_iklan->row()->id_paket != 0)
        {
            $detail_iklan->row()->harga_paket;
            $numBayar = ($detail_iklan->row()->harga_paket*$jumlah_bulan)+ (($detail_iklan->row()->harga_paket/30)*$numHari);
        }
        else
        {
            $detail_iklan->row()->harga_nego;
            $numBayar = ($detail_iklan->row()->harga_nego*$jumlah_bulan)+ (($detail_iklan->row()->harga_nego/30)*$numHari);
        }
                    //echo "numbayar = ".$numBayar;
        ?>
        <div class="row" id="pwd-container">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pembayaran Iklan</h3>
                    </div>
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
                    <div class="box-footer">
                        <a href="<?= base_url('admin/iklan/lanjut_proses/'.$detail_iklan->row()->id_iklan) ?>" class="btn btn-info pull-right">Lanjutkan Proses</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>



    </section>
</div>