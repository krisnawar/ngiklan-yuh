<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

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
                        <h3 class="box-title">Ubah Password</h3>
                    </div>

                    <?php echo form_open("admin/profil/ubah_password", "class='form-horizontal'");?>

                        <div class="box-body">
                            <?php if (validation_errors() || $message): ?>
                                <div id="infoMessage1" class="alert alert-danger"><?php echo $message;?></div>
                            <?php endif; ?>
                            <?php if ($berhasil): ?>
                                <div id="infoMessage2" class="alert alert-success"><?= $berhasil;?></div>
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="old" class="col-sm-2 control-label">Password Lama</label>
                                <div class="col-sm-10">
                                    <?= form_input($old_password); ?>
                                    <small class="form-text text-danger"><?= form_error('old'); ?></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="new" class="col-sm-2 control-label">Password Baru</label>
                                <div class="col-sm-10">
                                    <?= form_input($new_password); ?>
                                    <div class="progress" style="margin:0">
                                        <div class="pwstrength_viewport_progress"></div>
                                    </div>
                                    <input type="checkbox" onclick="drowssapwohs()">&nbspShow Password
                                    <small class="form-text text-danger"><?= form_error('new'); ?></small>
                                </div>                                
                            </div>

                            <div class="form-group">
                                <label for="new_confirm" class="col-sm-2 control-label">Konfirmasi Password Baru</label>
                                <div class="col-sm-10">
                                    <?= form_input($new_password_confirm); ?>
                                    <small class="form-text text-danger"><?= form_error('new_confirm'); ?></small>
                                </div>
                            </div>

                            <div class="box-footer">
                                <?php echo form_submit('submit', 'Update', "class='btn btn-info pull-right'");?>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </section>
</div>