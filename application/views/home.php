<!DOCTYPE html>
<html>
<head>
    <title>Selamat Datang</title>
    <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/bootstrap/css/bootstrap.min.css'); ?>">
</head>
<body>
    <div class="container">
        <h2>Selamat Datang Wahai <?= $user_name; ?></h2>
        <?php //var_dump($milik_user); ?>
    </div>
</body>
</html>