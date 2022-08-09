<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<script type="text/javascript" src="<?= base_url($frameworks_dir . '/googlechart/loader.js') ?>"></script>

            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">                        

                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3><?= $iklan_non_approve ?></h3>
                                    <p>Iklan Masuk</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-airplane"></i>
                                </div>
                                <a href="#" class="small-box-footer">Buka <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3><?= $iklan_proceed ?></h3>
                                    <p>Iklan Diproses</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-airplane"></i>
                                </div>
                                <a href="#" class="small-box-footer">Buka <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-teal">
                                <div class="inner">
                                    <h3><?= $iklan_live ?></h3>
                                    <p>Iklan Tayang</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-airplane"></i>
                                </div>
                                <a href="#" class="small-box-footer">Buka <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3>4</h3>
                                    <p>Iklan Tayang</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-airplane"></i>
                                </div>
                                <a href="#" class="small-box-footer">Buka <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </section>

                        <!-- <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <a href="<?php //echo base_url('admin/license') ?>">
                                    <span class="info-box-icon bg-maroon"><i class="fa fa-hourglass-1"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Iklan Belum Disetujui</span>
                                        <span class="info-box-number"><?//= $iklan_non_approve ?></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Iklan Disetujui</span>
                                    <span class="info-box-number"><?//= $iklan_approved ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix visible-sm-block"></div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Users</span>
                                    <span class="info-box-number"><?php //echo $count_users; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Login As</span>
                                    <span class="info-box-number"><?//= $login_as; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Login As</span>
                                    <span class="info-box-number"><?//= $login_as; ?></span>
                                </div>
                            </div>
                        </div>
                    </div> -->
                <section class="content">
                    <div class="row">                        
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Statistik</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="box box-solid bg-teal-gradient">
                                        <div class="box-header">
                                            <i class="fa fa-th"></i>

                                            <h3 class="box-title">Iklan Masuk</h3>

                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="box-body border-radius-none">
                                            <div class="chart" id="chart_div" style="height: 250px;"></div>                                            
                                        </div>
                                        <!-- /.box-body -->
                                        
                                        <!-- /.box-footer -->
                                    </div>
                                    <!-- /.box -->
                                </div>
                                <div class="box-body">
                                    <div class="box box-solid bg-teal-gradient">
                                        <div class="box-header">
                                            <i class="fa fa-th"></i>

                                            <h3 class="box-title">Iklan Tayang</h3>

                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="box-body border-radius-none">
                                            <div class="chart" id="chart_dov" style="height: 250px;"></div>                                            
                                        </div>
                                        <!-- /.box-body -->
                                        
                                        <!-- /.box-footer -->
                                    </div>
                                    <!-- /.box -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <script type="text/javascript">
                var iklanMasuk = <?php echo json_encode($stat_iklan); ?>;
                var iklanTayang = <?php echo json_encode($stat_tayang); ?>;
            </script>
            <script type="text/javascript" src="<?php echo base_url($non_frameworks_dir . '/dashboard/dashboard.js')?>"></script>
