<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <?= $pagetitle; ?>
        <?= $breadcrumb; ?>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
						<h3 class="box-title">Form Ubah Data Profil</h3>
					</div>

                    <?php echo form_open("admin/profil/ubah_profil", "class='form-horizontal'");?>

                        <div class="box-body">

                            <?php if (validation_errors() || $message): ?>
                                <div id="infoMessage1" class="alert alert-danger"><?= $message;?></div>
                            <?php endif; ?>
                            <?php if ($berhasil): ?>
                                <div id="infoMessage2" class="alert alert-success"><?= $berhasil;?></div>
                            <?php endif; ?>

                            <div class="form-group">
								<label for="namadepan" class="col-sm-2 control-label">Nama Depan</label>
								<div class="col-sm-10">
									<?= form_input($namadepan); ?>
									<small class="form-text text-danger"><?= form_error('namadepan'); ?></small>
								</div>
							</div>

                            <div class="form-group">
								<label for="namadepan" class="col-sm-2 control-label">Nama Belakang</label>
								<div class="col-sm-10">
									<?= form_input($namabelakang); ?>
									<small class="form-text text-danger"><?= form_error('namabelakang'); ?></small>
								</div>
							</div>

                            <div class="form-group">
								<label for="no_hp" class="col-sm-2 control-label">No HP/Whatsapp</label>
								<div class="col-sm-10">
									<?= form_input($no_hp); ?>
									<small class="form-text text-danger"><?= form_error('no_hp'); ?></small>
								</div>
							</div>

                            <div class="form-group">
								<label for="namadepan" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10">
									<?= form_input($email); ?>
									<small class="form-text text-danger"><?= form_error('email'); ?></small>
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