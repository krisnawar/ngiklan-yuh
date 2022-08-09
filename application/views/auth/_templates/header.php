<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="<?php echo $charset; ?>">
	<title><?= $title ?></title>

<?php if ($mobile === FALSE): ?>
        <!--[if IE 8]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
<?php endif; ?>

    <link rel="icon" href="<?= $favicon; ?>">
	<link rel="stylesheet" href="<?php echo base_url($non_frameworks_dir . '/css/login.css');?>">
    <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url($frameworks_dir . '/adminlte/css/adminlte.min.css'); ?>">

<?php if ($mobile === FALSE): ?>
        <!-- [if lt IE 9]> -->
            <script src="<?php echo base_url($plugins_dir . '/html5shiv/html5shiv.min.js'); ?>"></script>
            <script src="<?php echo base_url($plugins_dir . '/respond/respond.min.js'); ?>"></script>
        <!-- <![endif] -->
<?php endif; ?>

</head>
