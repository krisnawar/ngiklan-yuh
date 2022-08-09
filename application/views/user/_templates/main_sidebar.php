<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url($img_dir . '/m_001.png'); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $user_login['firstname'].$user_login['lastname']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> <?php echo 'Online'; ?></a>
            </div>
        </div>

        <!-- Sidebar menu -->
        <ul class="sidebar-menu">

            <li>
                <a href="<?php echo site_url('/'); ?>">
                    <i class="fa fa-home text-primary"></i> <span><?php echo lang('menu_access_website'); ?></span>

                </a>
            </li>

            <li class="header text-uppercase"><?php echo lang('menu_main_navigation'); ?></li>
            <li class="<?=active_link_function('index')?>">
                <a href="<?= site_url('userdashboard') ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>


            <li class="header text-uppercase"><?php echo lang('menu_administration'); ?></li>
            <?php $link = '';
            if (!is_null(active_link_function('profil'))) {
                $link = 'active';
            }
            elseif (!is_null(active_link_function('ubah_profil'))) {
               $link = 'active';
            } ?>
            <li class="treeview <?=$link?> ">

                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Info Profil</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?=active_link_function('profil')?>"><a href="<?= site_url('profil'); ?>">Profil</a></li>
                    <li class="<?=active_link_function('ubah_profil')?>"><a href="<?= site_url('ubahprofil'); ?>">Ubah Profil</a></li>
                </ul>
            </li>



            <li class="<?=active_link_function('ajukan_iklan')?>">
                <a href="<?= site_url('ajukaniklan'); ?>"><!-- diisi -->
                    <i class="fa fa-pencil"></i> <span>Ajukan Iklan</span>
                </a>
            </li>
            
            <?php $link = '';
            if (!is_null(active_link_function('informasi_paket'))) {
                $link = 'active';
            }
            elseif (!is_null(active_link_function('status_iklan'))) {
               $link = 'active';
            } ?>
            <li class="treeview <?=$link?> ">
                <a href="#">
                    <i class="fa fa-info-circle"></i>
                    <span>Tentang Iklan</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?=active_link_function('informasi_paket')?>"><a href="<?= site_url('informasipaket'); ?>">Informasi Paket</a></li>
                    <li class="<?=active_link_function('status_iklan')?>"><a href="<?= site_url('statusiklan'); ?>">Status Iklan</a></li>
                </ul>
            </li>
            <li class="">
                <a href="<?= site_url('auth/logout'); ?>"><!-- diisi -->
                    <i class="fa fa-sign-out"></i> <span>Keluar</span>
                </a>
            </li>
        

            <li class="header text-uppercase"><?php echo $title; ?></li>
            <li class="">
                <a href="<?= site_url('caramengajukaniklan'); ?>">
                    <i class="fa fa-question-circle"></i> <span>Cara Mengajukan Iklan</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
