<body>
	<div class="container">

		<div class="row" id="pwd-container">
			<div class="col-md-4"></div>

			<div class="col-md-4">
				<section class="login-form">
                    <?php echo form_open("auth/login", "role='login'");?>

                        <div class="container-fluid" style="align-text:center">
                            <h2><?php echo lang('login_heading');?></h2>
                            <p><?php echo lang('login_subheading');?></p>
                        </div>                     

                        <?php if (validation_errors() || $message): ?>
                            <div id="infoMessage" class="alert alert-danger"><?php echo $message;?></div>
                        <?php endif; ?>

                        <p>
                            <?php echo form_input($identity);?>
                        </p>

                        <p>
                            <?php echo form_input($password);?>
                        </p>
						
                        <p>
                            <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>&nbsp<?php echo lang('login_remember_label', 'remember');?>
                        </p>

						<div class="container-fluid"><?php echo form_submit('submit', lang('login_submit_btn'), "class='btn btn-primary btn-block'");?></div>
                        <?php anchor('auth/reset_password/', 'HAYOO NGAPAIN'); ?>
						
                        <div>
                            <?= lang('login_not_registered'); ?><a href="<?= base_url('/register');?>"> <?= lang('login_register_here')?></a><br>
                            <?= lang('login_or'); ?><br>
                            <a href='forgot_password'><?php echo lang('login_forgot_password');?></a>
						</div>

                    <?php echo form_close();?>
				</section>  
            <div class="col-md-4"></div>
        </div>
    </div>
</body>