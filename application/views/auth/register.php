<body>
    <div class="container" style="margin-bottom:50px" >
        <div class="row" id="pwd-container">
            <div class="col-md-3"></div>

            <div class="col-md-6">
                <section class="login-form">
                    <?php echo form_open("auth/register", "role='login'");?>

                    <div class="container-fluid" style="align-text:center">
                            <h2><?php echo lang('register_heading');?></h2>
                            <h4><?php echo lang('create_user_subheading');?></h4>
                    </div>
                    <br>

                    <?php if (validation_errors() || $message): ?>
                        <div id="infoMessage" class="alert alert-danger"><?php echo $message;?></div>
                    <?php endif; ?>

                    <?php
                                        
                    echo lang('users_username') . form_input($username);
                    echo lang('users_firstname') . form_input($first_name);
                    echo lang('users_lastname') . form_input($last_name);
                    echo lang('users_email') . form_input($email);
                    echo lang('users_phone') . form_input($phone);
                    echo lang('users_password') . form_input($password);

                    ?>
                    <div class="progress" style="margin:0">
                        <div class="pwstrength_viewport_progress"></div>
                    </div>
                    <?php
                    echo lang('users_password_confirm') . form_input($password_confirm);
                    echo '<br>';

                    ?>

                    <div class="container-fluid"><?php echo form_submit('submit', 'Daftar', "class='btn btn-primary btn-block'");?></div>

                    <div>Sudah Punya akun? <a href="<?= base_url('/login');?>">Masuk di Sini</a></div>

                    <?php echo form_close();?>
                </section>
            </div>

            <div class="col-md-3"></div>
        </div>
    </div>
</body>