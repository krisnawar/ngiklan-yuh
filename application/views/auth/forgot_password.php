<body>
    <div class="container" style="margin-bottom:50px" >
        <div class="row" id="pwd-container">
            <div class="col-md-3"></div>

            <div class="col-md-6">
                <section class="login-form">
                    <?php echo form_open("auth/forgot_password", "role='login'");?>

                    <div class="container-fluid" style="align-text:center">
                        <h2><?php echo lang('forgot_password_heading');?></h2>
                        <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
                    </div>
                    <br>

                    <?php if (validation_errors() || $message): ?>
                        <div id="infoMessage" class="alert alert-danger"><?php echo $message;?></div>
                    <?php endif; ?>

                    <?php echo form_input($identity);?>
                      
                    <div class="container-fluid"><?php echo form_submit('submit', 'Submit', "class='btn btn-primary btn-block'");?></div>

                    <?php echo form_close();?>
                </section>
            </div>

            <div class="col-md-3"></div>
        </div>
    </div>
</body>
