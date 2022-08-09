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
						<h3 class="box-title">Form Tambah Admin</h3>
					</div>

                    <?php echo form_open("admin/tambah_admin", "class='form-horizontal'");?>

                        <div class="box-body">

                            <?php if (validation_errors() || $message): ?>
                                <div id="infoMessage" class="alert alert-danger"><?php echo $message;?></div>
                            <?php endif; ?>

                            <div class="form-group">
								<label for="username" class="col-sm-2 control-label">Username</label>
								<div class="col-sm-10">
									<?= form_input($username); ?>
									<small class="form-text text-danger"><?= form_error('username'); ?></small>
								</div>
							</div>

                            <div class="form-group">
								<label for="first_name" class="col-sm-2 control-label">Nama Depan</label>
								<div class="col-sm-10">
									<?= form_input($first_name); ?>
									<small class="form-text text-danger"><?= form_error('first_name'); ?></small>
								</div>
							</div> 

                            <div class="form-group">
								<label for="last_name" class="col-sm-2 control-label">Nama Belakang</label>
								<div class="col-sm-10">
									<?= form_input($last_name); ?>
									<small class="form-text text-danger"><?= form_error('last_name'); ?></small>
								</div>
							</div> 

                            <div class="form-group">
								<label for="email" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10">
									<?= form_input($email); ?>
									<small class="form-text text-danger"><?= form_error('email'); ?></small>
								</div>
							</div> 

                            <div class="form-group">
								<label for="phone" class="col-sm-2 control-label">No HP/Whatsapp</label>
								<div class="col-sm-10">
									<?= form_input($phone); ?>
									<small class="form-text text-danger"><?= form_error('phone'); ?></small>
								</div>
							</div> 

                            <div class="form-group">
								<label for="password" class="col-sm-2 control-label">Password</label>
								<div class="col-sm-10">
									<?= form_input($password); ?>
                                    <div class="progress" style="margin:0">
                                        <div class="pwstrength_viewport_progress"></div>
                                    </div>
                                    <input type="checkbox" onclick="drowssapwohs()">&nbspShow Password
									<small class="form-text text-danger"><?= form_error('password'); ?></small>
								</div>
							</div> 

                            <div class="form-group">
								<label for="password_confirm" class="col-sm-2 control-label">Konfirmasi Password</label>
								<div class="col-sm-10">
									<?= form_input($password_confirm); ?>
									<small class="form-text text-danger"><?= form_error('password_confirm'); ?></small>
								</div>
							</div>

                            <div class="box-footer">
                                <?php echo form_submit('submit', 'Tambahkan', "class='btn btn-info pull-right'");?>
                            </div>                             

                        </div>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </section>
</div>