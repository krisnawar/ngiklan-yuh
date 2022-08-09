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
                                <label class="col-sm-2 control-label">Tanggal Masuk&nbsp:</label>
                                <div class="col-sm-10"">
                                    <p style="margin: 7px;"><?= date('j F Y', strtotime($detail_iklan->row()->tanggal_masuk)); ?></p>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pilihan Paket&nbsp:</label>
                                <div class="col-sm-10"">
                                    <p style="margin: 7px;">
                                        <?php
                                        if ($detail_iklan->row()->id_paket == 0 || $detail_iklan->row()->id_paket == NULL)
                                        {
                                            echo 'Nego';
                                        }
                                        else
                                        {
                                            echo $detail_iklan->row()->kategori_paket .' - '. $detail_iklan->row()->jenis_paket;
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <hr>

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
                            <?php if ($detail_iklan->row()->status_iklan == 0): ?>
                                <button style="margin: auto 5px;" type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalTerima">Terima</button>
                                <button style="margin: auto 5px;" type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#modalTolak">Tolak</button>
                            <?php endif; ?>
                            </div>
                            
                        </form>
                    </div>
                </div>
                <div class="modal fade" id="modalTerima" role="dialog">
                    <div class="modal-dialog">
                    
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Konfirmasi</h4>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin menerima iklan <?= $detail_iklan->row()->nama_iklan; ?>?</p>
                            </div>
                            <div class="modal-footer">
                                <a style="margin: auto 5px;" class="btn btn-primary pull-right" href="<?= base_url('/admin/iklan/accept/'.$detail_iklan->row()->id_iklan); ?>" role="button">Terima</a>
                                <button style="margin: auto 5px;" type="button" class="btn btn-default pull-right" data-dismiss="modal">Batal</button>
                            </div>
                        </div>                    
                    </div>
                </div>
                <div class="modal fade" id="modalTolak" role="dialog">
                    <div class="modal-dialog">
                    
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Konfirmasi</h4>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin menolak iklan <?= $detail_iklan->row()->nama_iklan; ?>?</p>
                            </div>
                            <div class="modal-footer">
                                <a style="margin: auto 5px;" class="btn btn-primary pull-right" href="<?= base_url('/admin/iklan/decline/'.$detail_iklan->row()->id_iklan); ?>" role="button">Tolak</a>
                                <button style="margin: auto 5px;" type="button" class="btn btn-default pull-right" data-dismiss="modal">Batal</button>
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>