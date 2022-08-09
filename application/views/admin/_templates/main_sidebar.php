<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <aside class="main-sidebar">
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
                        <li class="<?=active_link_controller('dashboard')?>">
                            <a href="<?php echo site_url('admin/dashboard'); ?>">
                                <i class="fa fa-dashboard"></i> <span><?php echo lang('menu_dashboard'); ?></span>
                            </a>
                        </li>


                        <li class="header text-uppercase"><?php echo lang('menu_administration'); ?></li>
<?php if($superadmin_link): ?>
                        <li class="<?=active_link_controller('tambah_admin')?>">
                            <a href="<?php echo site_url('admin/tambah_admin'); ?>">
                                <i class="fa fa-user-plus"></i> <span><?php echo lang('menu_add_admin'); ?></span>
                            </a>
                        </li>
<?php endif; ?>
                        <li class="treeview <?=active_link_controller('profil')?>">
                            <a href="#">
                                <i class="fa fa-info-circle"></i>
                                <span><?php echo lang('menu_profile'); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?=active_link_function('info_profil')?>"><a href="<?php echo site_url('admin/profil/info_profil'); ?>"><?php echo lang('menu_profile_info'); ?></a></li>
                                <li class="<?=active_link_function('ubah_profil')?>"><a href="<?php echo site_url('admin/profil/ubah_profil'); ?>"><?php echo lang('menu_profile_change_profile'); ?></a></li>
                                <li class="<?=active_link_function('ubah_password')?>"><a href="<?php echo site_url('admin/profil/ubah_password'); ?>"><?php echo lang('menu_profile_change_password'); ?></a></li>
                            </ul>
                        </li>
                        <li class="<?=active_link_controller('user')?>">
                            <a href="<?php echo site_url('admin/user'); ?>">
                                <i class="fa fa-users"></i> <span><?php echo lang('menu_user'); ?></span>
                            </a>
                        </li>
                        <li class="treeview <?=active_link_controller('iklan')?>">
                            <a href="#">
                                <i class="fa fa-rss-square"></i>
                                <span><?php echo lang('menu_iklan'); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?=active_link_function('pengajuan_iklan')?>"><a href="<?php echo site_url('admin/iklan/pengajuan_iklan'); ?>"><?php echo lang('menu_iklan_pengajuan'); ?></a></li>
                                <li class="<?=active_link_function('proses_iklan')?>"><a href="<?php echo site_url('admin/iklan/proses_iklan'); ?>"><?php echo lang('menu_iklan_diproses'); ?></a></li>
                                <li class="<?=active_link_function('iklan_tayang')?>"><a href="<?php echo site_url('admin/iklan/iklan_tayang'); ?>"><?php echo lang('menu_iklan_tayang'); ?></a></li>
                                <li class="<?=active_link_function('semua_iklan')?>"><a href="<?php echo site_url('admin/iklan/semua_iklan'); ?>"><?php echo lang('menu_iklan_semua'); ?></a></li>
                                <li class="<?=active_link_function('tambah_paket')?>"><a href="<?php echo site_url('admin/iklan/tambah_paket'); ?>"><?php echo lang('menu_iklan_tambah'); ?></a></li>
                                <li class="<?=active_link_function('lihat_paket')?>"><a href="<?php echo site_url('admin/iklan/lihat_paket'); ?>"><?php echo lang('menu_iklan_lihat_paket'); ?></a></li>
                            </ul>
                        </li>

                        <li class="header text-uppercase"><?php echo $title; ?></li>
                        <li class="<?=active_link_controller('logout')?>">
                            <a href="<?php echo site_url('auth/logout'); ?>">
                                <i class="fa fa-sign-out"></i> <span><?php echo lang('menu_logout'); ?></span>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>
